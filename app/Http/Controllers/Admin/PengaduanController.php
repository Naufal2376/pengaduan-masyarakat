<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pengaduan;
use App\Models\tanggapan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        return view('admin.pengaduan.index', ['pengaduan' => $pengaduan]);
    }

    public function show($id_pengaduan)
    {
        $pengaduan = pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        return view('admin.pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan]);
    }
}
