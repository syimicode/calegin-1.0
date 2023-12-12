<?php

namespace App\Http\Controllers;

use App\Imports\DataRelawanImport;
use App\Models\DataRelawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Maatwebsite\Excel\Facades\Excel;

class CrudRelawanController extends Controller
{
    // Tampilkan Data Relawan
    public function index() {
        // $data_relawan = DB::table('data_relawan')->get();
        $data_relawan = DataRelawan::with('kecamatanrelawan', 'desarelawan')->get();
        return view('relawan/crud_relawan', ['data_relawan' => $data_relawan]);
    }

    // Method untuk button tambah data crud relawan
    public function tambah(){
        $provinces = Province::all();
        return view('relawan/crud_relawan_tambah_data', compact('provinces'));
    }

    // Method untuk getKabupaten
    public function getkabupaten(request $request){
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>pilih kota/kabupaten..</option>";
        foreach($kabupatens as $kabupaten){
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    // Method untuk getKecamatan
    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>pilih kecamatan..</option>";
        foreach($kecamatans as $kecamatan){
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $option;
    }

    // Method untuk getDesa
    public function getdesa(request $request){
        $id_kecamatan = $request->id_kecamatan;
        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>pilih kelurahan/desa..</option>";
        foreach($desas as $desa){
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }

        echo $option;
    }

    // Method untuk simpan data
    public function simpan(Request $request){
        
        // Validasi data sebelum diisi
        $this->_validation($request);

        // Validasi data sudah mencapai batas maksimum
        $count = DB::table('data_relawan')->count();
        if ($count >= 12) {
            return redirect('relawan')->with('error', 'Data Anda sudah mencapai batas maksimum. Silakan hapus beberapa data atau hubungi Admin untuk memperoleh izin.');
        }

        DB::table('data_relawan')->insert([
            [
            'nama_relawan'          => $request->nama_relawan,
            'jenis_kelamin_relawan' => $request->gender_relawan,
            'usia_relawan'          => $request->usia,
            'whatsapp'              => $request->whatsapp,
            'kecamatan'             => $request->kecamatan,
            'desa'                  => $request->desa,
            'kabupaten'             => $request->kabupaten,
            'provinsi'              => $request->provinsi],
            // ['email' => 'janeway@example.com', 'votes' => 0],
        ]);

        // agar kembali ke halaman awal
        return redirect('relawan')->with('message', 'Data relawan berhasil ditambah!');
    }

    // Function untuk validasi data
    private function _validation(Request $request){
        // Validasi data sebelum diisi
        $request->validate([
            'nama_relawan'      => 'required|min:3|max:30',
            'gender_relawan'    => 'required',
            'usia'              => 'required|min:2|max:2',
            'whatsapp'          => 'required',
            'kecamatan'         => 'required',
            'desa'              => 'required',
            'kabupaten'         => 'required',
            'provinsi'          => 'required',
        ], [
            'nama_relawan.required'     => '*Nama lengkap wajib diisi.',
            'nama_relawan.min'          => '*Minimal 3 karakter huruf.',
            'nama_relawan.max'          => '*Maksimal 30 karakter huruf.',
            'gender_relawan.required'   => '*Jenis kelamin wajib diisi.',
            'usia.required'             => '*Usia wajib diisi.',
            'usia.min'                  => '*Minimal 2 karakter angka.',
            'usia.max'                  => '*Maksimal 2 karakter angka.',
            'whatsapp.required'         => '*Whatsapp wajib diisi.',
            'kecamatan.required'        => '*Kecamatan wajib diisi.',
            'desa.required'             => '*Kelurahan/Desa wajib diisi.',
            'kabupaten.required'        => '*Kota/Kabupaten wajib diisi.',
            'provinsi.required'         => '*Provinsi wajib diisi.',
        ]);
    }

    // Method untuk edit data
    public function edit($id){
        $provinces = Province::all();
        $dataRelawan = DataRelawan::find($id);
        return view('relawan/crud_relawan_edit_data', compact('dataRelawan', 'provinces'));
    }

    // Method untuk update data
    public function update(Request $request, $id){
        // Validasi data sebelum diisi
        $this->_validation($request);

        DB::table('data_relawan')->where('id', $id)->update([
            'nama_relawan'          => $request->nama_relawan,
            'jenis_kelamin_relawan' => $request->gender_relawan,
            'usia_relawan'          => $request->usia,
            'whatsapp'              => $request->whatsapp,
            'kecamatan'             => $request->kecamatan,
            'desa'                  => $request->desa,
            'kabupaten'             => $request->kabupaten,
            'provinsi'              => $request->provinsi,
        ]);
        return redirect('relawan')->with('message', 'Data relawan berhasil diubah!');
    }

    // Method untuk hapus data
    public function delete($id){
        $hapus = DataRelawan::find($id);
        // Hapus data di Database
        $hapus->delete();
        return redirect()->back()->with('message', 'Data relawan berhasil dihapus!');
    }

    // Method untuk import file
    public function datarelawanimport(Request $request){
        // Validasi data sudah mencapai batas maksimum agar tidak dapat import file
        $count = DB::table('data_relawan')->count();
        if ($count >= 12) {
            return redirect('relawan')->with('error', 'Data Anda sudah mencapai batas maksimum. Silahkan hapus beberapa data atau hubungi Admin untuk memperoleh izin.');
        }

        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('importExcel', $namafile);

        Excel::import(new DataRelawanImport, public_path('/importExcel/'.$namafile));
        return redirect()->back()->with('message', 'Data relawan berhasil diimport!');
    }
}
