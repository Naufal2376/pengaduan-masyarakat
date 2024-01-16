<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'telp' => '085123456789',
            'level' => 'admin'
        ]);
    }
}
