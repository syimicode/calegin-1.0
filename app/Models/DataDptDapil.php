<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDptDapil extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = "data_dpt_dapil";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kecamatan', 'nama_desa', 'jumlah_tps', 'laki', 'perempuan', 'jumlah_dpt',
    ];
}
