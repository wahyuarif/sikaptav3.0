<?php

use Illuminate\Database\Seeder;
use App\Prodi;
class ProdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $informatika = new Prodi;
        $informatika->kode_prodi = '55201';
        $informatika->prodi = 'Teknik Informatika';
        $informatika->dosen_id = 1;
        $informatika->save();
        
        $sipil = new Prodi;
        $sipil->kode_prodi = '22201';
        $sipil->prodi = 'Teknik Sipil';
        $sipil->dosen_id = 1;
        $sipil->save();
        
        $mesin = new Prodi;
        $mesin->kode_prodi = '21201';
        $mesin->prodi = 'Teknik Mesin';
        $mesin->dosen_id = 1;
        $mesin->save();
        
        $managementInformatika = new Prodi;
        $managementInformatika->kode_prodi = '57401';
        $managementInformatika->prodi = 'Management Infromatika';
        $managementInformatika->dosen_id = 1;
        $managementInformatika->save();
        
        $arsitektur = new Prodi;
        $arsitektur->kode_prodi = '23201';
        $arsitektur->prodi = 'Arsitektur';
        $arsitektur->dosen_id = 1;
        $arsitektur->save();


        $elektronika = new Prodi;
        $elektronika->kode_prodi = '20401';
        $elektronika->prodi = 'Teknik Elektronika';
        $elektronika->dosen_id = 1;
        $elektronika->save();
    }
}
