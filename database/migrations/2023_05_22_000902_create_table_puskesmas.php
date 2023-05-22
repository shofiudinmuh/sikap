<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePuskesmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->increments('id_puskesmas');
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
            $table->string('nama_puskesmas');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
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
        Schema::dropIfExists('puskesmas');
    }
}
