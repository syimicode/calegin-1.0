<?php

namespace App\Imports;

use App\Models\DataDptDapil;
use Maatwebsite\Excel\Concerns\ToModel;

class DataDptDapilImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataDptDapil([
            // Atur jumlah field yang akan kita import dan sesuaikan dengan kolomnya
            'nama_kecamatan'    => $row[1],
            'nama_desa'         => $row[2],
            'jumlah_tps'        => $row[3],
            'laki'              => $row[4],
            'perempuan'         => $row[5],
            'jumlah_dpt'        => $row[6],
        ]);
    }
}
