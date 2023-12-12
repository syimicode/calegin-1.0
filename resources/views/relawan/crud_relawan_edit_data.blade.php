@extends('layout.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="section-header">
    <a href="{{ URL::previous() }}" class="mr-3">
        <i class="fas fa-arrow-circle-left"
        style="font-size: 30px; vertical-align: middle; color: #fc544b"></i>
    </a>

    <h1>Edit Data Relawan</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('update', $dataRelawan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="section-title mt-1 mb-3">Detail Relawan</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_relawan"
                                        @if (old('nama_relawan'))
                                            value="{{ old('nama_relawan') }}"
                                        @else
                                            value="{{ $dataRelawan->nama_relawan }}"
                                        @endif
                                        class="form-control @error('nama_relawan') is-invalid @enderror">
                                    @error('nama_relawan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('gender_relawan') is-invalid @enderror" name="gender_relawan">
                                        <option value="Laki-Laki" {{ old('gender_relawan', $dataRelawan->jenis_kelamin_relawan) == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('gender_relawan', $dataRelawan->jenis_kelamin_relawan) == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
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
                                        @if (old('usia'))
                                        value="{{ old('usia') }}"
                                        @else
                                            value="{{ $dataRelawan->usia_relawan }}"
                                        @endif
                                        class="form-control @error('usia') is-invalid @enderror">
                                    @error('usia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="number" name="whatsapp"
                                        @if (old('whatsapp'))
                                            value="{{ old('whatsapp') }}"
                                        @else
                                            value="{{ $dataRelawan->whatsapp }}"
                                        @endif
                                        class="form-control @error('whatsapp') is-invalid @enderror">
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