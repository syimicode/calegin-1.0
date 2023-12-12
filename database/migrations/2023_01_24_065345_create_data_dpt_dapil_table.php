<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dpt_dapil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kecamatan');
            $table->string('nama_desa');
            $table->string('jumlah_tps');
            $table->string('laki');
            $table->string('perempuan');
            $table->string('jumlah_dpt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_dpt_dapil');
    }
};
