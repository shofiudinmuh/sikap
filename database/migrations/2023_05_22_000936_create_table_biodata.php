<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->increments('id_biodata');
            $table->string('nik')->unique();
            $table->string('nama_kader');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('nohp');
            $table->string('norek');
            $table->string('foto');
            $table->string('ktp');
            $table->unsignedBigInteger('id_kota')
                ->foreign('id_kota')->references('id_kota')->on('kota')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_kecamatan')
                ->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_desa')
                ->foreign('id_desa')->references('id_desa')->on('desa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_bank')
                ->foreign('id_bank')->references('id_bank')->on('bank')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('biodata');
    }
}
