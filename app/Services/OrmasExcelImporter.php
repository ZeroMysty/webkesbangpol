<?php

namespace App\Services;

use App\Models\Ormas;
use App\Models\PengurusOrmas;
use App\Models\DokumenOrmas;
use App\Models\ImportBatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OrmasExcelImporter
{
    /**
     * Import all sheets from an Excel file into Ormas database.
     * Creates an ImportBatch record so data can be rolled back later.
     */
    public function import(string $filePath, string $filename = '', string $importedBy = ''): array
    {
        $spreadsheet = IOFactory::load($filePath);
        $totalImported = 0;
        $allSkippedNames = [];

        // Create import batch record BEFORE processing
        $batch = ImportBatch::create([
            'filename'       => $filename ?: basename($filePath),
            'imported_count' => 0,
            'skipped_count'  => 0,
            'imported_by'    => $importedBy,
        ]);

        foreach ($spreadsheet->getAllSheets() as $sheet) {
            $sheetName = $sheet->getTitle();
            $rows = $sheet->toArray(null, true, true, false);

            if (empty($rows)) {
                continue;
            }

            $sheetResult = $this->processSheetRows($rows, $sheetName, $batch->id);
            $totalImported += $sheetResult['imported'];
            $allSkippedNames = array_merge($allSkippedNames, $sheetResult['skipped']);
        }

        // Deduplicate skipped names while preserving case
        $uniqueSkipped = [];
        $lowerSeen = [];
        foreach ($allSkippedNames as $name) {
            $lower = strtolower(trim($name));
            if (!isset($lowerSeen[$lower])) {
                $lowerSeen[$lower] = true;
                $uniqueSkipped[] = trim($name);
            }
        }

        // Update batch with final counts
        $batch->update([
            'imported_count' => $totalImported,
            'skipped_count'  => count($uniqueSkipped),
        ]);

        // If nothing was imported, delete the empty batch record
        if ($totalImported === 0) {
            $batch->delete();
            $batchId = null;
        } else {
            $batchId = $batch->id;
        }

        return [
            'imported_count' => $totalImported,
            'skipped_count'  => count($uniqueSkipped),
            'skipped_names'  => $uniqueSkipped,
            'batch_id'       => $batchId,
        ];
    }

    protected function processSheetRows(array $rows, string $sheetName, int $batchId = 0): array
    {
        // 1. Find Header Row & Map Columns
        $headerIndex = null;
        $colMap = [
            'nama' => null,
            'alamat' => null,
            'pengurus' => null,
            'akta' => null,
            'ahu' => null,
            'bidang' => null,
            'telepon' => null,
            'npwp' => null,
            'pengurus_lama' => null,
            'alamat_baru' => null,
        ];

        foreach ($rows as $rIdx => $row) {
            $rowStr = implode(' ', array_filter(array_map('strval', $row)));
            if (preg_match('/NAMA\s*(ORGANISASI|ORMAS)|ORGANISASI/i', $rowStr)) {
                $headerIndex = $rIdx;
                foreach ($row as $cIdx => $cellVal) {
                    $val = trim((string)$cellVal);
                    if (empty($val)) continue;

                    if (preg_match('/NAMA\s*(ORGANISASI|ORMAS)/i', $val) || preg_match('/^NAMA\s+ORGANISASI$/i', $val)) {
                        $colMap['nama'] = $cIdx;
                    } elseif (preg_match('/ALAMAT\s*BARU/i', $val)) {
                        $colMap['alamat_baru'] = $cIdx;
                    } elseif (preg_match('/^ALAMAT$/i', $val) || preg_match('/ALAMAT\s*SEKRETARIAT/i', $val)) {
                        if ($colMap['alamat'] === null) $colMap['alamat'] = $cIdx;
                    } elseif (preg_match('/PENGURUS\s*LAMA/i', $val)) {
                        $colMap['pengurus_lama'] = $cIdx;
                    } elseif (preg_match('/PENGURUS/i', $val) || preg_match('/NAMA\s*PENGURUS/i', $val)) {
                        if ($colMap['pengurus'] === null) $colMap['pengurus'] = $cIdx;
                    } elseif (preg_match('/AKTA/i', $val)) {
                        $colMap['akta'] = $cIdx;
                    } elseif (preg_match('/AHU|SKT/i', $val)) {
                        $colMap['ahu'] = $cIdx;
                    } elseif (preg_match('/BIDANG/i', $val)) {
                        $colMap['bidang'] = $cIdx;
                    } elseif (preg_match('/HP|WA|TELEPON|TELP/i', $val)) {
                        $colMap['telepon'] = $cIdx;
                    } elseif (preg_match('/NPWP/i', $val)) {
                        $colMap['npwp'] = $cIdx;
                    }
                }
                break;
            }
        }

        // Fallback column positions if header row wasn't explicitly matched
        if ($colMap['nama'] === null) {
            $colMap['nama'] = 2;
            $colMap['alamat'] = 3;
            $colMap['pengurus'] = 4;
            $colMap['akta'] = 5;
            $colMap['ahu'] = 6;
            $colMap['bidang'] = 7;
            $colMap['telepon'] = 8;
        }

        // Map source enum/name
        $lowerSheet = strtolower($sheetName);
        $sumberData = 'verif';
        if (str_contains($lowerSheet, 'lsm')) {
            $sumberData = 'lsm';
        } elseif (str_contains($lowerSheet, 'yayasan')) {
            $sumberData = 'yayasan';
        } elseif (!empty($sheetName) && !str_contains($lowerSheet, 'sheet')) {
            $sumberData = $sheetName;
        }

        $startIndex = ($headerIndex !== null) ? $headerIndex + 1 : 0;
        $countImported = 0;
        $skippedNames = [];
        $currentOrmas = null;

        for ($i = $startIndex; $i < count($rows); $i++) {
            $row = $rows[$i];

            // Strict empty row check: skip rows where ALL cells are blank/whitespace/null
            $nonEmptyCells = array_filter($row, function($cell) {
                $v = trim((string)$cell);
                return $v !== '' && $v !== '0';
            });
            if (empty($nonEmptyCells)) {
                continue;
            }

            $col0 = trim((string)($row[0] ?? ''));
            $col1 = trim((string)($row[1] ?? ''));
            $colNama = trim((string)($row[$colMap['nama']] ?? ''));
            $colAlamat = trim((string)($row[$colMap['alamat']] ?? ''));
            if (empty($colAlamat) && isset($colMap['alamat_baru']) && $colMap['alamat_baru'] !== null) {
                $colAlamat = trim((string)($row[$colMap['alamat_baru']] ?? ''));
            }

            // Skip repeat header/title rows
            $rowContent = strtoupper(implode(' ', array_map('strval', $nonEmptyCells)));
            if (preg_match('/DAFTAR\s+ORGANISASI|BADAN\s+KESATUAN|NAMA\s+ORGANISASI/i', $rowContent) && preg_match('/ALAMAT|PENGURUS|BIDANG/i', $rowContent)) {
                continue;
            }
            if (preg_match('/^TAHUN\s+\d{4}$/i', trim($rowContent))) {
                continue;
            }

            // If the ONLY non-empty cell is just a row number (col0/col1), and colNama is empty,
            // this row has no meaningful data — skip entirely without touching current context
            $meaningfulCells = array_filter($nonEmptyCells, function($cell) {
                return !preg_match('/^\d{1,4}\.?$/', trim((string)$cell));
            });
            if (empty($meaningfulCells) && empty($colNama)) {
                continue;
            }

            $isNumericCol0 = preg_match('/^\d+\.?$/', $col0) || preg_match('/^\d+$/', $col1);

            if ($isNumericCol0 || !empty($colNama)) {
                if ($currentOrmas) {
                    $saved = $this->saveOrmasRecord($currentOrmas, $sumberData, $batchId);
                    if ($saved) {
                        $countImported++;
                    } else {
                        $skippedNames[] = $currentOrmas['nama_organisasi'];
                    }
                    $currentOrmas = null;
                }

                if (empty($colNama)) {
                    continue;
                }

                $colPengurus = trim((string)($row[$colMap['pengurus']] ?? ''));
                $colAkta = trim((string)($row[$colMap['akta']] ?? ''));
                $colAhu = trim((string)($row[$colMap['ahu']] ?? ''));
                $colBidang = trim((string)($row[$colMap['bidang']] ?? ''));
                $colTelepon = trim((string)($row[$colMap['telepon']] ?? ''));
                $colNpwp = isset($colMap['npwp']) && $colMap['npwp'] !== null ? trim((string)($row[$colMap['npwp']] ?? '')) : '';

                $currentOrmas = [
                    'nama_organisasi' => $colNama,
                    'alamat'          => $colAlamat !== '' ? $colAlamat : null,
                    'bidang'          => $colBidang !== '' ? $colBidang : null,
                    'akta'            => $colAkta !== '' ? $colAkta : null,
                    'ahu_skt'         => $colAhu !== '' ? $colAhu : null,
                    'npwp'            => $colNpwp !== '' ? $colNpwp : null,
                    'pengurus_lines'  => [],
                    'telepon_lines'   => [],
                ];

                if (!empty($colPengurus)) {
                    $currentOrmas['pengurus_lines'][] = $colPengurus;
                }
                if (!empty($colTelepon)) {
                    $currentOrmas['telepon_lines'][] = $colTelepon;
                }
            } else {
                if ($currentOrmas) {
                    $colPengurus = trim((string)($row[$colMap['pengurus']] ?? ''));
                    $colTelepon = trim((string)($row[$colMap['telepon']] ?? ''));

                    if (!empty($colPengurus)) {
                        $currentOrmas['pengurus_lines'][] = $colPengurus;
                    }
                    if (!empty($colTelepon)) {
                        $currentOrmas['telepon_lines'][] = $colTelepon;
                    }
                }
            }
        }

        if ($currentOrmas) {
            $saved = $this->saveOrmasRecord($currentOrmas, $sumberData, $batchId);
            if ($saved) {
                $countImported++;
            } else {
                $skippedNames[] = $currentOrmas['nama_organisasi'];
            }
        }

        return [
            'imported' => $countImported,
            'skipped'  => $skippedNames,
        ];
    }

    /**
     * Saves Ormas record ONLY if it does not exist in DB (by case-insensitive nama_organisasi).
     * Tags the record with the given import batch ID.
     * Returns true if created, false if skipped.
     */
    protected function saveOrmasRecord(array $data, string $sumberData, int $batchId = 0): bool
    {
        $namaClean = trim($data['nama_organisasi']);
        if (empty($namaClean)) {
            return false;
        }

        // Reject garbage values: Excel errors, number-only, single characters
        if (preg_match('/^#(REF|N\/A|VALUE|DIV\/0|NAME|NULL|NUM)[\!\?]?$/i', $namaClean)) {
            Log::info("Skip import: nama_organisasi adalah Excel error '{$namaClean}'.");
            return false;
        }
        if (preg_match('/^\d+\.?$/', $namaClean)) {
            Log::info("Skip import: nama_organisasi hanya angka '{$namaClean}'.");
            return false;
        }
        if (mb_strlen($namaClean) < 2) {
            Log::info("Skip import: nama_organisasi terlalu pendek '{$namaClean}'.");
            return false;
        }

        // Check if Ormas already exists in DB by nama_organisasi
        $exists = Ormas::whereRaw('LOWER(nama_organisasi) = ?', [strtolower($namaClean)])->exists();
        if ($exists) {
            Log::info("Skip import: Ormas '{$namaClean}' sudah ada di database.");
            return false; // Skip existing record
        }

        DB::transaction(function () use ($data, $sumberData, $namaClean, $batchId) {
            $ormas = Ormas::create([
                'nama_organisasi'  => $namaClean,
                'alamat'           => $data['alamat'],
                'bidang'           => $data['bidang'],
                'sumber_data'      => $sumberData,
                'import_batch_id'  => $batchId ?: null,
            ]);

            // Save Dokumen
            if (!empty($data['akta']) || !empty($data['ahu_skt']) || !empty($data['npwp'])) {
                DokumenOrmas::create([
                    'ormas_id'     => $ormas->id,
                    'akta_notaris' => $data['akta'] ?? null,
                    'ahu_skt'      => $data['ahu_skt'] ?? null,
                    'npwp'         => $data['npwp'] ?? null,
                ]);
            }

            // Parse & Save Pengurus
            $pengurusList = $this->parsePengurusLines($data['pengurus_lines'], $data['telepon_lines']);
            if (!empty($pengurusList)) {
                foreach ($pengurusList as $p) {
                    PengurusOrmas::create([
                        'ormas_id'   => $ormas->id,
                        'jabatan'    => $p['jabatan'],
                        'nama'       => $p['nama'],
                        'no_telepon' => $p['no_telepon'],
                    ]);
                }
            }
        });

        return true;
    }

    protected function parsePengurusLines(array $pengurusLines, array $teleponLines): array
    {
        $fullPengurusText = implode("\n", $pengurusLines);
        $fullTeleponText = implode("\n", $teleponLines);

        $phones = array_values(array_filter(array_map('trim', explode("\n", $fullTeleponText))));

        $result = [];

        $roles = [
            'Ketua'      => ['/(?:^|[\n\r,;])\s*(?:K|Ketua)\s*[:\.]\s*([^,\n\r;]+)/i'],
            'Sekretaris' => ['/(?:^|[\n\r,;])\s*(?:S|Sekretaris|Sekertaris)\s*[:\.]\s*([^,\n\r;]+)/i'],
            'Bendahara'  => ['/(?:^|[\n\r,;])\s*(?:B|Bendahara)\s*[:\.]\s*([^,\n\r;]+)/i'],
        ];

        $foundAnyPrefix = false;
        $phoneIdx = 0;

        foreach ($roles as $jabatan => $patterns) {
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $fullPengurusText, $m)) {
                    $nama = trim($m[1]);
                    if (!empty($nama)) {
                        $foundAnyPrefix = true;
                        $result[] = [
                            'jabatan'    => $jabatan,
                            'nama'       => $nama,
                            'no_telepon' => $phones[$phoneIdx] ?? ($phones[0] ?? null),
                        ];
                        $phoneIdx++;
                    }
                    break;
                }
            }
        }

        if (!$foundAnyPrefix && !empty($fullPengurusText)) {
            $lines = array_values(array_filter(array_map('trim', explode("\n", $fullPengurusText))));
            $jabatans = ['Ketua', 'Sekretaris', 'Bendahara'];

            foreach ($lines as $idx => $line) {
                if ($idx >= 3) break;
                $result[] = [
                    'jabatan'    => $jabatans[$idx],
                    'nama'       => $line,
                    'no_telepon' => $phones[$idx] ?? null,
                ];
            }
        }

        return $result;
    }
}
