<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register/index');
    }

    // Method untuk menyimpan data
    public function store(Request $request)
    {
        // Validasi data sebelum diisi
        $validasiAkun = $request->validate([
            'name'      => 'required|min:3|max:20',
            'username'  => 'required|unique:users',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:6|max:10',
        ], [
            'name.required'         => '*Nama wajib diisi.',
            'name.min'              => '*Minimal 3 karakter huruf.',
            'name.max'              => '*Maksimal 20 karakter huruf.',
            'username.required'     => '*Username wajib diisi.',
            'username.unique'       => '*Username ini sudah digunakan.',
            'email.required'        => '*Email wajib diisi.',
            'email.email'           => '*Email harus berupa alamat email yang valid.',
            'email.unique'          => '*Email ini sudah digunakan.',
            'password.required'     => '*Password wajib diisi.',
            'password.min'          => '*Minimal 6 karakter huruf atau angka.',
            'password.max'          => '*Maksimal 20 karakter huruf atau angka.',
        ]);

        // Jalankan fungsi hashing (bcrypt) pada password user
        $validasiAkun['password'] = Hash::make($validasiAkun['password']);

        // Simpan data ke dalam database
        User::create($validasiAkun);

        // Setelah berhasil, pindah ke halaman login
        return redirect('/')->with('message', 'Registrasi akun berhasil, silahkan login..');
    }
}
