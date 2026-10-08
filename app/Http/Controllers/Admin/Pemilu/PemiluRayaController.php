<?php

namespace App\Http\Controllers\Admin\Pemilu;

use App\Http\Controllers\Controller;

use App\Models\Paslon;
use App\Models\Legislatif;
use Illuminate\Http\Request;

class PemiluRayaController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama untuk Pemilu Raya.
     */
    public function index()
    {
        $title = "Dashboard Pemilu Raya";

        $pilpresCount = Paslon::where('jenis_pemilu', 'pilpres')->count();
        $walikotaCount = Paslon::where('jenis_pemilu', 'walikota')->count();
        $legislatifCount = Legislatif::count();

        $pilpresSuara = Paslon::where('jenis_pemilu', 'pilpres')->sum('total_suara');
        $walikotaSuara = Paslon::where('jenis_pemilu', 'walikota')->sum('total_suara');
        $legislatifSuara = Legislatif::sum('suara_sah');
        $dapilCount = Legislatif::distinct('dapil')->count('dapil');

        return view('dashboard.pemilu_raya.dashboard', compact(
            'title',
            'pilpresCount',
            'walikotaCount',
            'legislatifCount',
            'pilpresSuara',
            'walikotaSuara',
            'legislatifSuara',
            'dapilCount'
        ));
    }
}