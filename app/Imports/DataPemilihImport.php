<?php

namespace App\Imports;

use App\Models\DataPemilih;
use Maatwebsite\Excel\Concerns\ToModel;

class DataPemilihImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPemilih([
            // Atur jumlah field yang akan kita import dan sesuaikan dengan kolomnya
            'nik'           => $row[1],
            'nama_pemilih'  => $row[2],
            'jenis_kelamin' => $row[3],
            'usia'          => $row[4],
            'whatsapp'      => $row[5],
            'ktp'           => $row[6],
            'kecamatan'     => $row[7],
            'desa'          => $row[8],
            'kabupaten'     => $row[9],
            'provinsi'      => $row[10],
        ]);
    }
}
