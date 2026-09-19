@extends('dashboard.layouts.app')

@section('title', 'Riwayat Import Excel - Ormas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">

            {{-- Header --}}
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold mb-0" style="color:#b71c1c;">
                        <i class="fas fa-history me-2"></i>Riwayat Import Excel
                    </h4>
                    <small class="text-muted">Kelola dan kembalikan data yang diimport dari file Excel</small>
                </div>
                <a href="{{ route('ormass.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Ormas
                </a>
            </div>

            {{-- Alert Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Info Banner --}}
            <div class="alert alert-warning border-0 shadow-sm d-flex align-items-start gap-2 mb-4" role="alert">
                <i class="fas fa-exclamation-triangle mt-1 text-warning fs-5"></i>
                <div>
                    <strong>Perhatian!</strong> Tombol <strong>Rollback</strong> akan menghapus <em>permanen</em> semua data organisasi yang masuk dari sesi import tersebut.
                    Data yang diinput manual <strong>tidak akan terpengaruh</strong>.
                </div>
            </div>

            {{-- Tabel Riwayat --}}
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-0">
                    @if($batches->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background: linear-gradient(135deg, #b71c1c, #e53935); color: white;">
                                    <tr>
                                        <th class="px-4 py-3" style="width:50px">#</th>
                                        <th class="py-3"><i class="fas fa-file-excel me-1"></i> Nama File</th>
                                        <th class="py-3 text-center"><i class="fas fa-check me-1"></i> Berhasil Diimport</th>
                                        <th class="py-3 text-center"><i class="fas fa-forward me-1"></i> Dilewati</th>
                                        <th class="py-3"><i class="fas fa-user me-1"></i> Diimport Oleh</th>
                                        <th class="py-3"><i class="fas fa-calendar me-1"></i> Waktu Import</th>
                                        <th class="py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batches as $i => $batch)
                                    <tr class="batch-row" id="batch-row-{{ $batch->id }}">
                                        <td class="px-4 text-muted">{{ $batches->firstItem() + $i }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div style="width:36px;height:36px;background:#e8f5e9;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                                    <i class="fas fa-file-excel" style="color:#2e7d32;font-size:16px;"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-dark" style="font-size:0.9rem;">{{ $batch->filename }}</div>
                                                    <small class="text-muted">ID Sesi: #{{ $batch->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill px-3 py-2" style="background:#e8f5e9;color:#2e7d32;font-size:0.85rem;">
                                                <i class="fas fa-check-circle me-1"></i>{{ $batch->ormass_count }} data
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill px-3 py-2" style="background:#fff3e0;color:#e65100;font-size:0.85rem;">
                                                <i class="fas fa-minus-circle me-1"></i>{{ $batch->skipped_count }} data
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark" style="font-size:0.88rem;">
                                                <i class="fas fa-user-circle me-1 text-muted"></i>
                                                {{ $batch->imported_by ?? '-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span style="font-size:0.88rem;" class="text-dark">
                                                <i class="fas fa-clock me-1 text-muted"></i>
                                                {{ $batch->created_at->format('d M Y, H:i') }}
                                            </span>
                                            <br>
                                            <small class="text-muted">{{ $batch->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td class="text-center">
                                            @if($batch->ormass_count > 0)
                                                <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    style="border-radius:8px;font-size:0.8rem;"
                                                    onclick="confirmRollback({{ $batch->id }}, '{{ addslashes($batch->filename) }}', {{ $batch->ormass_count }})">
                                                    <i class="fas fa-undo me-1"></i> Rollback
                                                </button>
                                            @else
                                                <span class="text-muted" style="font-size:0.8rem;"><i class="fas fa-check me-1"></i>Sudah kosong</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        @if($batches->hasPages())
                            <div class="d-flex justify-content-center py-3">
                                {{ $batches->links() }}
                            </div>
                        @endif
                    @else
                        {{-- Empty State --}}
                        <div class="text-center py-5">
                            <div style="width:80px;height:80px;background:#f5f5f5;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                                <i class="fas fa-inbox" style="font-size:32px;color:#bdbdbd;"></i>
                            </div>
                            <h6 class="text-muted mb-1">Belum Ada Riwayat Import</h6>
                            <p class="text-muted small mb-3">Data akan muncul setelah kamu mengupload file Excel.</p>
                            <a href="{{ route('ormass.create') }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-upload me-1"></i> Upload Excel Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Modal Konfirmasi Rollback --}}
<div class="modal fade" id="rollbackModal" tabindex="-1" aria-labelledby="rollbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0" style="background:linear-gradient(135deg,#b71c1c,#e53935);">
                <h5 class="modal-title text-white fw-bold" id="rollbackModalLabel">
                    <i class="fas fa-undo me-2"></i>Konfirmasi Rollback
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div style="width:48px;height:48px;background:#ffebee;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-exclamation-triangle" style="color:#b71c1c;font-size:22px;"></i>
                    </div>
                    <div>
                        <p class="mb-1 fw-semibold text-dark">Yakin ingin rollback import ini?</p>
                        <p class="text-muted small mb-0">
                            File: <strong id="modal-filename" class="text-dark"></strong><br>
                            Sebanyak <strong id="modal-count" class="text-danger"></strong> data organisasi akan <strong>dihapus permanen</strong>.
                        </p>
                    </div>
                </div>
                <div class="alert alert-danger border-0 py-2 mb-0" style="background:#ffebee;font-size:0.85rem;">
                    <i class="fas fa-info-circle me-1"></i>
                    Aksi ini tidak bisa dibatalkan. Data manual tidak akan terpengaruh.
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Batal
                </button>
                <form id="rollbackForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-undo me-1"></i> Ya, Rollback Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.batch-row { transition: background 0.15s; }
.batch-row:hover { background: #fafafa; }
</style>

<script>
function confirmRollback(batchId, filename, count) {
    document.getElementById('modal-filename').textContent = filename;
    document.getElementById('modal-count').textContent = count;
    document.getElementById('rollbackForm').action =
        "{{ url('/dashboard/ormass-import-history') }}/" + batchId + "/rollback";
    new bootstrap.Modal(document.getElementById('rollbackModal')).show();
}
</script>
@endsection
