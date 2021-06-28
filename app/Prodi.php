<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public function mahasiswas(){
        return $this->belongsTo('App\Mahasiswa');
    }
}
