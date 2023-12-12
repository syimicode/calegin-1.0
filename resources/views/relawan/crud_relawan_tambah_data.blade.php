@extends('layout.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="section-header">
    <a href="{{ URL::previous() }}" class="mr-3">
        <i class="fas fa-arrow-circle-left"
        style="font-size: 30px; vertical-align: middle; color: #fc544b"></i>
    </a>

    <h1>Tambah Data Relawan</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('simpan') }}" method="POST">
                        @csrf
                        <div class="section-title mt-1 mb-3">Detail Relawan</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_relawan"
                                        class="form-control @error('nama_relawan') is-invalid @enderror"
                                        value="{{ old('nama_relawan') }}">
                                    @error('nama_relawan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender_relawan') is-invalid @enderror" name="gender_relawan"
                                        value="{{ old('gender_relawan') }}">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('gender_relawan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="number" name="usia"
                                        class="form-control @error('usia') is-invalid @enderror"
                                        value="{{ old('usia') }}">
                                    @error('usia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="number" name="whatsapp"
                                        class="form-control @error('whatsapp') is-invalid @enderror"
                                        value="{{ old('whatsapp') }}">
                                    @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-1 mb-3">Area Relawan</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="custom-select" name="provinsi" id="provinsi">
                                        <option selected>pilih provinsi..</option>
                                        {{-- Deklarasi looping untuk memanggil package indoregion --}}
                                        @foreach ($provinces as $provinsi)
                                        <option value=" {{ $provinsi->id }} "> {{ $provinsi->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kota/Kabupaten</label>
                                    <select class="custom-select @error('kabupaten') is-invalid @enderror"
                                        name="kabupaten" id="kabupaten"></select>
                                    @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="custom-select @error('kecamatan') is-invalid @enderror"
                                        name="kecamatan" id="kecamatan"></select>
                                    @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelurahan/Desa</label>
                                    <select class="custom-select @error('desa') is-invalid @enderror" name="desa"
                                        id="desa"></select>
                                    @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-2" type="submit">Simpan Data</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection