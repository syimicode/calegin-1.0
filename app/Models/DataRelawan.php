<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRelawan extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = "data_relawan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_relawan', 'jenis_kelamin_relawan', 'usia_relawan', 'whatsapp', 'kecamatan', 'desa', 'kabupaten', 'provinsi',
    ];

    // CARA AGAR VALUE "id" PADA INDOREGION BERELASI DENGAN COLOUMN PADA DATABASE data_relawan
    public function kecamatanrelawan(){
        // Buatkan saya relasi one to one ke data model district indoregion
        return $this->hasOne(District::class, 'id', 'kecamatan');
    }

    public function desarelawan(){
        // Buatkan saya relasi one to one ke data model village indoregion
        return $this->hasOne(Village::class, 'id', 'desa');
    }
}
