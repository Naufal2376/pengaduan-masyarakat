<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = petugas::all();

        return view('admin.petugas.index', ['petugas' => $petugas]);
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => ['required'],
            'username' => ['required', 'unique:petugas'],
            'password' => ['required'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ],[
            'nama_petugas.required' => 'Nama harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'telp.required' => 'Telp harus diisi',
            'level.required' => 'Level harus diisi',
            'level.in' => 'Level harus admin atau petugas',
        ]);

        petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Berhasil menambahkan data petugas');
    }

    public function edit($id_petugas)
    {
        $petugas = petugas::where('id_petugas', $id_petugas)->first();

        return view('admin.petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();

        $petugas = petugas::where('id_petugas', $id_petugas)->first();

        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect()->route('petugas.index')->with('success', 'Berhasil update data petugas');
    }

    public function destroy($id_petugas)
    {
        $petugas = petugas::where('id_petugas', $id_petugas)->first();
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Berhasil menghapus data petugas');
    }
}