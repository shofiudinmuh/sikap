<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPuskesmasOnDetailJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_jabatan', function (Blueprint $table) {
            $table->unsignedInteger('id_puskesmas')
                ->foreign('id_puskesmas')->references('id_puskesmas')->on('puskesmas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_jabatan', function (Blueprint $table) {
            $table->dropColumn('id_puskesmas');
        });
    }
}
