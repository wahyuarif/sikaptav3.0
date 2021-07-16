<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_kps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pengajuan');
            $table->string('judul_pengajuan');
            $table->string('kerangka_pikir');
            $table->string('nm_instansi');
            $table->string('no_telp');
            $table->string('lokasi');
            $table->string('jumlah_pegawai');
            $table->string('desc_pekerjaan');
            // $table->string('dosen_pembimbing');
            $table->string('status');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengajuan_kps');
    }
}
