<?php

namespace App\Http\Controllers\Admin\Pemilu;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PemiluRayaController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama untuk Pemilu Raya.
     */
    public function index()
    {
        // BENAR: Variabel dibuat di dalam method
        $title = "Dashboard Pemilu Raya";

        return view('dashboard.pemilu_raya.dashboard', compact('title'));

    }
}