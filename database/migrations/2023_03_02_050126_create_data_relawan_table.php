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
        Schema::create('data_relawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_relawan');
            $table->enum('jenis_kelamin_relawan', ['Laki-Laki', 'Perempuan']);
            $table->string('usia_relawan');
            $table->string('whatsapp');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('kabupaten');
            $table->string('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_relawan');
    }
};
