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
            $table->string('no_telp');
            $table->string('jumlah_pegawai');
            $table->string('dosen_pembimbing');
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
