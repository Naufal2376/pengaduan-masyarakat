<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\tanggapan;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $pengaduan = pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $tanggapan = tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan){
            $pengaduan->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d H:i:s'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => auth('admin')->user()->id_petugas
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with('status', 'Tanggapan berhasil dikirim');
        } else {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d H:i:s'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => auth('admin')->user()->id_petugas
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with('status', 'Tanggapan berhasil dikirim');
        }
    }
}