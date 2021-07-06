<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// added
use Illuminate\Support\Facades\Session;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'alamat', 'tgl_lahir', 'jenis_kelamin', 'kode_prodi'];
    
    public function prodis()
    {
        return $this->hasMany('App\Prodi');
    }
}
