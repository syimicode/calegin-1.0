<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemilih extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = "data_pemilih";
    protected $primaryKey = "id";
    protected $fillable = [
        'nik',
        'nama_pemilih',
        'jenis_kelamin',
        'usia',
        'whatsapp',
        'ktp',
        'kecamatan',
        'desa',
        'kabupaten',
        'provinsi',
    ];

    // CARA AGAR VALUE "id" PADA INDOREGION BERELASI DENGAN COLOUMN PADA DATABASE data_pemilih
    public function kecamatanpemilih(){
        // Buatkan saya relasi one to one ke data model district indoregion
        return $this->hasOne(District::class, 'id', 'kecamatan');
    }

    public function desapemilih(){
        // Buatkan saya relasi one to one ke data model village indoregion
        return $this->hasOne(Village::class, 'id', 'desa');
    }
}
