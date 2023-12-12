<?php

namespace App\Imports;

use App\Models\DataRelawan;
use Maatwebsite\Excel\Concerns\ToModel;

class DataRelawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataRelawan([
            // Atur jumlah field yang akan kita import dan sesuaikan dengan kolomnya
            'nama_relawan'          => $row[1],
            'jenis_kelamin_relawan' => $row[2],
            'usia_relawan'          => $row[3],
            'whatsapp'              => $row[4],
            'kecamatan'             => $row[5],
            'desa'                  => $row[6],
            'kabupaten'             => $row[7],
            'provinsi'              => $row[8],
        ]);
    }
}
