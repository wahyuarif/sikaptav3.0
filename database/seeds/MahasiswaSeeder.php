<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;
use App\Prodi;
class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mahasiswa::truncate();clear
        Mahasiswa::create([
            'nama'=> 'Ahmad Rifai', 
            'alamat' => 'Rejosari, Bawaang , Batang' , 
            'tgl_lahir' => '2001-07-16',
            'jenis_kelamin' => 'L',
            'kode_prodi' =>'55201'
        ]);

    }
}
