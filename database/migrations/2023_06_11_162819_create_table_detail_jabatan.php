<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jabatan', function (Blueprint $table) {
            $table->increments('id_detail_jabatan');
            $table->unsignedBigInteger('id_biodata')
                ->foreign('id_biodata')->references('id_biodata')->on('biodata')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_jabatan')
                ->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_sk')
                ->foreign('id_sk')->references('id_sk')->on('sk')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_desa')
                ->foreign('id_desa')->references('id_desa')->on('desa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_kecamatan')
                ->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('tahun');
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
        Schema::dropIfExists('detail_jabatan');
    }
}
