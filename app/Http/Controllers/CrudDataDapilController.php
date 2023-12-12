<?php

namespace App\Http\Controllers;

use App\Imports\DataDptDapilImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CrudDataDapilController extends Controller
{
    // Tampilkan Data Relawan
    public function index(){
        $data_dpt_dapil = DB::table('data_dpt_dapil')->get();
        return view('datadapil/crud_dpt_dapil', ['data_dpt_dapil' => $data_dpt_dapil]);
    }

    // Method untuk button tambah data crud dpt dapil
    public function tambahdpt(){
        return view('datadapil/crud_dpt_dapil_tambah');
    }

    // Method untuk simpan data
    public function simpandpt(Request $request){
        
        // Validasi data sebelum diisi
        $this->_validation($request);

        DB::table('data_dpt_dapil')->insert([
            [
            'nama_kecamatan'    => $request->kecamatan,
            'nama_desa'         => $request->desa,
            'jumlah_tps'        => $request->jumlah_tps,
            'laki'              => $request->laki,
            'perempuan'         => $request->perempuan,
            'jumlah_dpt'        => $request->jumlah_dpt],
            // ['email' => 'janeway@example.com', 'votes' => 0],
        ]);

        // agar kembali ke halaman awal
        return redirect('dpt')->with('message', 'Data DPT berhasil ditambah!');
    }

    // Function untuk validasi data
    private function _validation(Request $request){
        // Validasi data sebelum diisi
        $request->validate([
            'kecamatan'     => 'required',
            'desa'          => 'required',
            'jumlah_tps'    => 'required|min:2',
            'laki'          => 'required',
            'perempuan'     => 'required',
            'jumlah_dpt'    => 'required',
        ], [
            'kecamatan.required'    => '*Kecamatan wajib diisi.',
            'desa.required'         => '*Kelurahan/Desa wajib diisi.',
            'jumlah_tps.required'   => '*Jumlah TPS wajib diisi.',
            'jumlah_tps.min'        => '*Minimal 2 karakter angka.',
            'laki.required'         => '*Jumlah DPT laki-laki wajib diisi.',
            'perempuan.required'    => '*Jumlah DPT perempuan wajib diisi.',
            'jumlah_dpt.required'   => '*Total jumlah DPT wajib diisi.',
        ]);
    }

    // Method untuk hapus data
    public function deletedpt($id){
        // return view('crud_dpt_dapil');
        DB::table('data_dpt_dapil')->where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data DPT berhasil dihapus!');
    }

    // Method untuk import file
    public function datadptimport(Request $request){
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('importExcel', $namafile);

        Excel::import(new DataDptDapilImport, public_path('/importExcel/'.$namafile));
        return redirect()->back()->with('message', 'Data DPT berhasil diimport!');
    }
}
