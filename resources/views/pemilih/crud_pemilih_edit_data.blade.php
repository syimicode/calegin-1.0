@extends('layout.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="section-header">
    <a href="{{ URL::previous() }}" class="mr-3">
        <i class="fas fa-arrow-circle-left"
        style="font-size: 30px; vertical-align: middle; color: #fc544b"></i>
    </a>

    <h1>Edit Data Pemilih</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('updatepemilih', $dataPemilih->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="section-title mt-1 mb-3">Detail Pemilih</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_pemilih" @if (old('nama_pemilih'))
                                        value="{{ old('nama_pemilih') }}" @else
                                        value="{{ $dataPemilih->nama_pemilih }}" @endif
                                        class="form-control @error('nama_pemilih') is-invalid @enderror">
                                    @error('nama_pemilih')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="Laki-Laki"
                                            {{ old('gender', $dataPemilih->jenis_kelamin) == "Laki-Laki" ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="Perempuan"
                                            {{ old('gender', $dataPemilih->jenis_kelamin) == "Perempuan" ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="number" name="usia" @if (old('usia')) value="{{ old('usia') }}" @else
                                        value="{{ $dataPemilih->usia }}" @endif
                                        class="form-control @error('usia') is-invalid @enderror">
                                    @error('usia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Induk Kependudukan (NIK)</label>
                                    <input type="number" name="nik_pemilih" @if (old('nik_pemilih'))
                                        value="{{ old('nik_pemilih') }}" @else
                                        value="{{ $dataPemilih->nik }}" @endif
                                        class="form-control @error('nik_pemilih') is-invalid @enderror">
                                    @error('nik_pemilih')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="number" name="whatsapp" @if (old('whatsapp'))
                                        value="{{ old('whatsapp') }}" @else value="{{ $dataPemilih->whatsapp }}" @endif
                                        class="form-control @error('whatsapp') is-invalid @enderror">
                                    @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Upload KTP</label>
                                    <input type="file" name="ktp_pemilih"
                                    class="form-control @error('ktp_pemilih') is-invalid @enderror">
                                    @error('ktp_pemilih')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="gallery gallery-fw">
                                        <div class="gallery-item" data-image="{{ asset('imageKTP/'.$dataPemilih->ktp) }}"
                                            data-title="{{$dataPemilih->ktp}}" href="{{ asset('imageKTP/'.$dataPemilih->ktp) }}"
                                            style="height: 100px; background-image: {{ asset('imageKTP/'.$dataPemilih->ktp) }};">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-1 mb-3">Area Pemilih</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="custom-select" name="provinsi" id="provinsi">
                                        <option selected>pilih provinsi..</option>
                                        {{-- Deklarasi looping untuk memanggil package indoregion --}}
                                        @if (is_array($provinces) || is_object($provinces)) {
                                        @foreach ($provinces as $provinsi) {
                                        <option value="{{ $provinsi->id }}"> {{ $provinsi->name }} </option>
                                        }
                                        @endforeach
                                        }
                                        @endif
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