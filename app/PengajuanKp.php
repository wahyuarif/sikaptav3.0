<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKp extends Model
{
    protected $fillable = ['no_pengajuan', 'judul_pengajuan', 'kerangka_pikir', 'no_telp', 'jumlah_pegawai', 'dosen_pembimbing', 'status'];
}
