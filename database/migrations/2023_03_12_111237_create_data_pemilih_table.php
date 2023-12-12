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
        Schema::create('data_pemilih', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('nama_pemilih');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('usia');
            $table->string('whatsapp');
            $table->string('ktp', 100);
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
        Schema::dropIfExists('data_pemilih');
    }
};
