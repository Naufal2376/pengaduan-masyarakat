<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = masyarakat::all();
        return view('admin.masyarakat.index', ['masyarakat' => $masyarakat]);
    }

    public function show($nik)
    {
        $masyarakat = masyarakat::where('nik', $nik)->first();
        return view('admin.masyarakat.show', ['masyarakat' => $masyarakat]);
    }
}