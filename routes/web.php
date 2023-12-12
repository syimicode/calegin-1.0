<?php

use App\Http\Controllers\CrudDataDapilController;
use App\Http\Controllers\CrudPemilihController;
use App\Http\Controllers\CrudRelawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Middleware Prevent-Back-History (agar mencegah tombol kembali browser setelah Login & Logout)
Route::group(['middleware' => 'prevent-back-history'], function(){

    // Halaman Login & logout
    Route::get('/', [LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/', [LoginController::class,'authenticate'])->name('login')->middleware('guest');

    // Halaman Register
    Route::get('register', [RegisterController::class,'create'])->name('register')->middleware('guest');
    Route::post('register', [RegisterController::class,'store'])->name('store')->middleware('guest');

    // Middleware Auth (jika email & password user sesuai, maka user dapat mengakses route dibawah ini)
    Route::group(['middleware' => 'auth'], function(){

        // Logout
        Route::post('logout', [LoginController::class,'logout'])->name('logout');

        // Halaman Dashboard
        Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

        // Halaman Data DPT Dapil 6
        Route::get('dpt', [CrudDataDapilController::class,'index'])->name('crud_dpt_dapil');
        Route::get('dpt/tambah', [CrudDataDapilController::class,'tambahdpt'])->name('tambahdpt');
        Route::post('dpt/simpan', [CrudDataDapilController::class,'simpandpt'])->name('simpandpt');
        Route::get('dpt/delete/{id}', [CrudDataDapilController::class,'deletedpt'])->name('deletedpt');
        Route::post('dpt/importdatadpt', [CrudDataDapilController::class,'datadptimport'])->name('importdatadpt');

        // Halaman Tim Relawan Saksi
        Route::get('relawan', [CrudRelawanController::class,'index'])->name('crud_relawan');
        Route::get('relawan/tambah', [CrudRelawanController::class,'tambah'])->name('tambah');
        Route::post('relawan/simpan', [CrudRelawanController::class,'simpan'])->name('simpan');
        Route::get('relawan/delete/{id}', [CrudRelawanController::class,'delete'])->name('delete');
        Route::get('relawan/{id}/edit', [CrudRelawanController::class,'edit'])->name('edit');
        Route::patch('relawan/{id}', [CrudRelawanController::class,'update'])->name('update');
        Route::post('relawan/importdatarelawan', [CrudRelawanController::class,'datarelawanimport'])->name('importdatarelawan');

        // Dropdown daerah untuk halaman Tim Relawan Saksi & Data Pendukung/Pemilih (tambah data)
        Route::post('relawan/getkabupaten', [CrudRelawanController::class,'getkabupaten'])->name('getkabupaten');
        Route::post('relawan/getkecamatan', [CrudRelawanController::class,'getkecamatan'])->name('getkecamatan');
        Route::post('relawan/getdesa', [CrudRelawanController::class,'getdesa'])->name('getdesa');

        // Halaman Data Pendukung/Pemilih
        Route::get('pemilih', [CrudPemilihController::class,'index'])->name('crud_pemilih');
        Route::get('pemilih/tambahpemilih', [CrudPemilihController::class,'tambahpemilih'])->name('tambahpemilih');
        Route::post('pemilih/simpanpemilih', [CrudPemilihController::class,'simpanpemilih'])->name('simpanpemilih');
        Route::get('pemilih/delete/{id}', [CrudPemilihController::class,'deletepemilih'])->name('deletepemilih');
        Route::get('pemilih/{id}/edit', [CrudPemilihController::class,'editpemilih'])->name('editpemilih');
        Route::patch('pemilih/{id}', [CrudPemilihController::class,'updatepemilih'])->name('updatepemilih');
        Route::post('pemilih/importdatapemilih', [CrudPemilihController::class,'datapemilihimport'])->name('importdatapemilih');

    }); // End Middleware Auth

}); // End Prevent-Back-History

