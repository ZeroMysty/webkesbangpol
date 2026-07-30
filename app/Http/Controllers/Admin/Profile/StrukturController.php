<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\Strukturor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class StrukturController extends Controller
{
    /**
     * Display the visual org chart builder canvas.
     */
    public function index(): View
    {
        $allStrukturors = Strukturor::all();
        $raw = AppSetting::getValue('struktur_connector_data', null);
        $connectorData = $raw ? json_decode($raw, true) : [];

        return view('dashboard.strukturors.index', compact('allStrukturors', 'connectorData'));
    }

    /**
     * Save layout (positions) of all nodes via AJAX.
     * Also persists connector data (waypoints, colors, styles, ports) to the database.
     */
    public function saveLayout(Request $request)
    {
        $data = $request->validate([
            'nodes'             => 'required|array',
            'nodes.*.id'        => 'required|integer|exists:strukturors,id',
            'nodes.*.x'         => 'required|numeric',
            'nodes.*.y'         => 'required|numeric',
            'nodes.*.parent_id' => 'nullable|integer|exists:strukturors,id',
        ]);

        foreach ($data['nodes'] as $nodeData) {
            Strukturor::where('id', $nodeData['id'])->update([
                'x'         => $nodeData['x'],
                'y'         => $nodeData['y'],
                'parent_id' => $nodeData['parent_id'] ?? null,
            ]);
        }

        // Save connector data (waypoints, colors, styles, ports) to app_settings
        $connectorData = [
            'waypoints' => $request->input('waypoints', []),
            'colors'    => $request->input('connector_colors', []),
            'styles'    => $request->input('connector_styles', []),
            'ports'     => $request->input('connector_ports', []),
        ];
        AppSetting::setValue('struktur_connector_data', json_encode($connectorData));

        return response()->json(['success' => true, 'message' => 'Tata letak berhasil disimpan!']);
    }

    /**
     * Quick-add a new box/node from the builder.
     */
    public function storeBox(Request $request)
    {
        $request->validate([
            'jabatan'   => 'required|string|max:255',
            'nama'      => 'nullable|string|max:255',
            'nip'       => 'nullable|string|max:50',
            'golongan'  => 'nullable|string|max:50',
            'pangkat'   => 'nullable|string|max:50',
            'x'         => 'required|numeric',
            'y'         => 'required|numeric',
            'parent_id' => 'nullable|integer|exists:strukturors,id',
            'color'     => 'nullable|string|max:50',
            'image'     => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filenameBase = time() . '_' . Str::random(8);
            $imageName = $filenameBase . '.' . $extension;
            $image->move(public_path('images/struktur-organisasi'), $imageName);
        }

        $nip = null;
        if ($request->filled('nip') && trim($request->nip) !== '-') {
            $nip = trim($request->nip);
        }

        $node = Strukturor::create([
            'nama'         => $request->nama ?? '-',
            'jabatan'      => $request->jabatan,
            'nip'          => $nip,
            'golongan'     => $request->golongan ?? '-',
            'pangkat'      => $request->pangkat ?? '-',
            'foto_profile' => $imageName,
            'parent_id'    => $request->parent_id ?: null,
            'x'            => $request->x,
            'y'            => $request->y,
            'color'        => $request->color ?? 'blue',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kotak berhasil ditambahkan!',
            'node'    => $node->fresh(),
        ]);
    }

    /**
     * Quick-update a node from the builder.
     */
    public function updateBox(Request $request, $id)
    {
        $request->validate([
            'jabatan'   => 'required|string|max:255',
            'nama'      => 'nullable|string|max:255',
            'nip'       => 'nullable|string|max:50',
            'golongan'  => 'nullable|string|max:50',
            'pangkat'   => 'nullable|string|max:50',
            'parent_id' => 'nullable|integer|exists:strukturors,id',
            'color'     => 'nullable|string|max:50',
            'image'     => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $node = Strukturor::findOrFail($id);

        $nip = $node->nip;
        if ($request->has('nip')) {
            $val = trim($request->nip);
            $nip = ($val === '' || $val === '-') ? null : $val;
        }

        $updateData = [
            'jabatan'  => $request->jabatan,
            'nama'     => $request->nama ?? '-',
            'nip'      => $nip,
            'golongan' => $request->golongan ?? $node->golongan,
            'pangkat'  => $request->pangkat ?? $node->pangkat,
            'color'    => $request->color ?? $node->color,
        ];

        if ($request->has('parent_id')) {
            $updateData['parent_id'] = $request->parent_id ?: null;
        }

        if ($request->hasFile('image')) {
            if (!empty($node->foto_profile)) {
                $oldPath = public_path('images/struktur-organisasi/' . $node->foto_profile);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    unlink($oldPath);
                }
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filenameBase = time() . '_' . Str::random(8);
            $imageName = $filenameBase . '.' . $extension;
            $image->move(public_path('images/struktur-organisasi'), $imageName);
            $updateData['foto_profile'] = $imageName;
        }

        $node->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Kotak berhasil diperbarui!',
            'node'    => $node->fresh(),
        ]);
    }

    /**
     * Delete a node from the builder.
     */
    public function deleteBox($id)
    {
        $node = Strukturor::findOrFail($id);

        // Orphan children
        Strukturor::where('parent_id', $id)->update(['parent_id' => null]);

        if (!empty($node->foto_profile)) {
            $path = public_path('images/struktur-organisasi/' . $node->foto_profile);
            if (file_exists($path) && is_file($path)) {
                unlink($path);
            }
        }

        $node->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kotak berhasil dihapus!',
        ]);
    }
}
