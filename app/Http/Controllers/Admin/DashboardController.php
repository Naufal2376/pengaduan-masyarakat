<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use App\Models\masyarakat;
use App\Models\pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = petugas::all()->count();
        $masyarakat = masyarakat::all()->count();
        $proses = pengaduan::where('status', 'proses')->count();
        $selesai = pengaduan::where('status', 'selesai')->count();

        return view('admin.dashboard.index', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'proses' => $proses, 'selesai' => $selesai]);
    }


}