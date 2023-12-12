<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Tampilkan Data Dashboard
    public function index() {
        $total_dukungan             = DB::table('data_pemilih')->count();
        $jumlah_relawan             = DB::table('data_relawan')->count();
        $jumlah_relawan_laki        = DB::table('data_relawan')->where('jenis_kelamin_relawan', 'Laki-Laki')->count();
        $jumlah_relawan_perempuan   = DB::table('data_relawan')->where('jenis_kelamin_relawan', 'Perempuan')->count();
        $jumlah_pemilih_laki        = DB::table('data_pemilih')->where('jenis_kelamin', 'Laki-Laki')->count();
        $jumlah_pemilih_perempuan   = DB::table('data_pemilih')->where('jenis_kelamin', 'Perempuan')->count();
        
        return view('dashboard', compact(
            'total_dukungan',
            'jumlah_relawan',
            'jumlah_relawan_laki',
            'jumlah_relawan_perempuan',
            'jumlah_pemilih_laki',
            'jumlah_pemilih_perempuan'
        ));
    }
}
