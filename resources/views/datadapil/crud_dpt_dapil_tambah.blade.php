@extends('layout.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="section-header">
    <a href="{{ URL::previous() }}" class="mr-3">
        <i class="fas fa-arrow-circle-left"
        style="font-size: 30px; vertical-align: middle; color: #fc544b"></i>
    </a>

    <h1>Tambah Data DPT</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('simpandpt') }}" method="POST">
                        @csrf
                        <div class="section-title mt-1 mb-3">Area DPT</div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan"
                                        class="form-control @error('kecamatan') is-invalid @enderror"
                                        value="{{ old('kecamatan') }}">
                                    @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kelurahan/Desa</label>
                                    <input type="text" name="desa"
                                        class="form-control @error('desa') is-invalid @enderror"
                                        value="{{ old('desa') }}">
                                    @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah TPS (cth: 01, 02, dst)</label>
                                    <input type="number" name="jumlah_tps"
                                        class="form-control @error('jumlah_tps') is-invalid @enderror"
                                        value="{{ old('jumlah_tps') }}">
                                    @error('jumlah_tps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-1 mb-3">Jumlah DPT</div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah DPT Laki-Laki</label>
                                    <input type="text" name="laki"
                                        class="form-control @error('laki') is-invalid @enderror"
                                        value="{{ old('laki') }}">
                                    @error('laki')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah DPT Perempuan</label>
                                    <input type="text" name="perempuan"
                                        class="form-control @error('perempuan') is-invalid @enderror"
                                        value="{{ old('perempuan') }}">
                                    @error('perempuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total Jumlah DPT</label>
                                    <input type="text" name="jumlah_dpt"
                                        class="form-control @error('jumlah_dpt') is-invalid @enderror"
                                        value="{{ old('jumlah_dpt') }}">
                                    @error('jumlah_dpt')
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