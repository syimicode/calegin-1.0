<?php

namespace App\Http\Controllers;

use App\Imports\DataPemilihImport;
use App\Models\DataPemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Province;
use Maatwebsite\Excel\Facades\Excel;

class CrudPemilihController extends Controller
{
    // Tampilkan Data Pemilih
    public function index() {
        // $data_pemilih = DB::table('data_pemilih')->get();
        $data_pemilih = DataPemilih::with('kecamatanpemilih', 'desapemilih')->get();
        return view('pemilih/crud_pemilih', ['data_pemilih' => $data_pemilih]);
    }

    // Method untuk button tambah data crud pemilih
    public function tambahpemilih(){
        $provinces = Province::all();
        return view('pemilih/crud_pemilih_tambah_data', compact('provinces'));
    }

    // Method untuk simpan data
    public function simpanpemilih(Request $request){
        // Validasi data sebelum diisi
        $this->_validation($request);

        // Validasi data sudah mencapai batas maksimum
        $count = DB::table('data_pemilih')->count();
        if ($count >= 2) {
            return redirect('pemilih')->with('error', 'Data Anda sudah mencapai batas maksimum. Silakan hapus beberapa data atau hubungi Admin untuk memperoleh izin.');
        }

        $data = $request->ktp_pemilih;
        $namaFile = time().rand(100,999).".".$data->getClientOriginalName();

        DB::table('data_pemilih')->insert([
            [
            'nik'           => $request->nik_pemilih,
            'nama_pemilih'  => $request->nama_pemilih,
            'jenis_kelamin' => $request->gender,
            'usia'          => $request->usia,
            'whatsapp'      => $request->whatsapp,
            'ktp'           => $namaFile,
            'kecamatan'     => $request->kecamatan,
            'desa'          => $request->desa,
            'kabupaten'     => $request->kabupaten,
            'provinsi'      => $request->provinsi],
            // ['email' => 'janeway@example.com', 'votes' => 0],
        ]);

        $data->move(public_path('/imageKTP'), $namaFile);

        // agar kembali ke halaman awal
        return redirect('pemilih')->with('message', 'Data pemilih berhasil ditambah!');
    }

    // Function untuk validasi data
    private function _validation(Request $request){
        // Validasi data sebelum diisi
        $request->validate([
            'nik_pemilih'   => 'required|min:16|max:16|unique:data_pemilih,nik',
            'nama_pemilih'  => 'required|min:3|max:30',
            'gender'        => 'required',
            'usia'          => 'required|min:2|max:2',
            'whatsapp'      => 'required',
            'ktp_pemilih'   => 'required',
            'kecamatan'     => 'required',
            'desa'          => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
        ], [
            'nik_pemilih.required'      => '*NIK wajib diisi.',
            'nik_pemilih.min'           => '*NIK harus terdiri dari 16 digit.',
            'nik_pemilih.max'           => '*NIK harus terdiri dari 16 digit.',
            'nik_pemilih.unique'        => '*NIK ini sudah terdaftar di dalam sistem.',
            'nama_pemilih.required'     => '*Nama lengkap wajib diisi.',
            'nama_pemilih.min'          => '*Minimal 3 karakter huruf.',
            'nama_pemilih.max'          => '*Maksimal 30 karakter huruf.',
            'gender.required'           => '*Jenis kelamin wajib diisi.',
            'usia.required'             => '*Usia wajib diisi.',
            'usia.min'                  => '*Minimal 2 karakter angka.',
            'usia.max'                  => '*Maksimal 2 karakter angka.',
            'whatsapp.required'         => '*Whatsapp wajib diisi.',
            'ktp_pemilih.required'      => '*Foto KTP wajib diisi.',
            'kecamatan.required'        => '*Kecamatan wajib diisi.',
            'desa.required'             => '*Kelurahan/Desa wajib diisi.',
            'kabupaten.required'        => '*Kota/Kabupaten wajib diisi.',
            'provinsi.required'         => '*Provinsi wajib diisi.',
        ]);
    }

    // Method untuk edit data
    public function editpemilih($id){
        $provinces = Province::all();
        $dataPemilih = DataPemilih::find($id);
        return view('pemilih/crud_pemilih_edit_data', compact('dataPemilih', 'provinces'));
    }

    // Method untuk update data
    public function updatepemilih(Request $request, $id){
        // Validasi data sebelum diisi
        $this->_validation($request);

        $ubah = DataPemilih::find($id);
        $awal = $ubah->ktp;

        $data = ([
            'nik'           => $request->nik_pemilih,
            'nama_pemilih'  => $request->nama_pemilih,
            'jenis_kelamin' => $request->gender,
            'usia'          => $request->usia,
            'whatsapp'      => $request->whatsapp,
            'ktp'           => $awal,
            'kecamatan'     => $request->kecamatan,
            'desa'          => $request->desa,
            'kabupaten'     => $request->kabupaten,
            'provinsi'      => $request->provinsi,
        ]);
        $request->ktp_pemilih->move(public_path().'/imageKTP', $awal);
        $ubah->update($data);

        return redirect('pemilih')->with('message', 'Data pemilih berhasil diubah!');
    }

    // Method untuk hapus data
    public function deletepemilih($id){
        $hapus = DataPemilih::find($id);
        $file = public_path('/imageKTP/').$hapus->ktp;

        // Cek jika ada gambar ktp
        if(file_exists($file)){
            // Maka hapus file di folder public/imageKTP
            @unlink($file);
        }

        // Hapus data di Database
        $hapus->delete();
        return redirect()->back()->with('message', 'Data pemilih berhasil dihapus!');
    }

    // Method untuk import file
    public function datapemilihimport(Request $request){
        // Validasi data sudah mencapai batas maksimum agar tidak dapat import file
        $count = DB::table('data_pemilih')->count();
        if ($count >= 2) {
            return redirect('pemilih')->with('error', 'Data Anda sudah mencapai batas maksimum. Silahkan hapus beberapa data atau hubungi Admin untuk memperoleh izin.');
        }

        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('importExcel', $namafile);

        Excel::import(new DataPemilihImport, public_path('/importExcel/'.$namafile));
        return redirect()->back()->with('message', 'Data pemilih berhasil diimport!');
    }
}
