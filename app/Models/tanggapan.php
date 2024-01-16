<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = ['id_tanggapan', 'id_petugas', 'id_pengaduan', 'tanggapan', 'tgl_tanggapan', 'id_petugas', 'id_masyarakat'];
}