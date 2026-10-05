<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AppSetting;
use App\Models\VisiMisi;
use App\Models\Strukturor;
use App\Models\Program;
use App\Models\Bidang;
use App\Models\LandasanHukum;

use Illuminate\Support\Facades\Cache;

class LandingpageProfileController extends Controller
{
    public function tampilVisiMisi(): View
    {
        $visimisis = Cache::remember('profile_visimisis', 3600, fn() => VisiMisi::all());
        return view('landingpage.profile.visimisi', compact('visimisis'));
    }

    public function tampilTugasFungsi(): View
    {
        $visimisis = Cache::remember('profile_tupoksi', 3600, fn() => VisiMisi::first());

        return view('landingpage.profile.tugasfungsi', compact('visimisis'));
    }

    public function tampilStruktur(): View
    {
        Strukturor::checkAndInitializePositions();
        $strukturors = Strukturor::all();

        // Load connector data (waypoints, colors, styles, ports) from database
        $raw = AppSetting::getValue('struktur_connector_data', null);
        $connectorData = $raw ? json_decode($raw, true) : [];

        return view('landingpage.profile.strukturorganisasi', compact('strukturors', 'connectorData'));
    }

    public function tampilDasarHukum(): View
    {
        $groupedHukums = Cache::remember('profile_dasarhukum', 3600, function () {
            return LandasanHukum::with('bidang')->get()->groupBy(function ($hukum) {
                return $hukum->bidang->nama_bidang ?? 'Tanpa Bidang';
            });
        });
    
        return view('landingpage.profile.dasarhukum', compact('groupedHukums'));
    }

    public function tampilProgram(): View
    {
        $groupedPrograms = Cache::remember('profile_programs', 3600, function () {
            return Program::with('bidang')->get()->groupBy(function ($program) {
                return $program->bidang->nama_bidang ?? 'Tanpa Bidang';
            });
        });
    
        return view('landingpage.profile.program', compact('groupedPrograms'));
    }
    

    public function tampilSejarah(): View
    {
        $visimisis = Cache::remember('profile_sejarah', 3600, fn() => VisiMisi::all());
        return view('landingpage.profile.sejarah', compact('visimisis'));
    }

    public function tampilMenuProfile(): View
    {
        return view('landingpage.profile.menu');
    }
}
