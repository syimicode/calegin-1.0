@extends('layout.master')
@section('content')
<div class="section-header">
    <h1>Data DPT</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">

            {{-- pesan toast ketika berhasil tambah, delete, import data --}}
            @if (session('message'))
            <div class="alert alert-info alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="col-12 col-md-8 col-sm-6">
                        <a href="{{ route('tambahdpt') }}" class="btn btn-icon icon-left btn-primary">
                            <i class="fas fa-plus"></i> Tambah Data</a>
                    </div>

                    <div class="col-12 col-md-4 col-sm-6" style="display: flex; justify-content: flex-end">
                        {{-- Modal pada button import file terletak di file master.blade.php --}}
                        <button type="button" class="btn btn-icon icon-left btn-light" data-toggle="modal"
                            data-target="#importDataDapil">
                            <i class="far fa-file"></i> Import Excel</button>
                    </div>
                </div>
                
                <div class="card-body">
                    {{-- Tabel Data DPT Dapil 6 --}}
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatables">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center; width: 6%;">#</th>
                                    <th style="vertical-align: middle;">Kecamatan</th>
                                    <th style="vertical-align: middle;">Kelurahan/Desa</th>
                                    <th style="vertical-align: middle;" class="sorting_asc_disabled sorting_desc_disabled">Jumlah TPS</th>
                                    <th style="vertical-align: middle; text-align: center;">L</th>
                                    <th style="vertical-align: middle; text-align: center;">P</th>
                                    <th style="vertical-align: middle; text-align: center;">Jumlah DPT</th>
                                    <th style="vertical-align: middle;" class="sorting_asc_disabled sorting_desc_disabled">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data_dpt_dapil as $no => $data)
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">{{ $no+1 }}.</td>
                                    <td style="vertical-align: middle;">{{ $data->nama_kecamatan }}</td>
                                    <td style="vertical-align: middle;">{{ $data->nama_desa }}</td>
                                    <td style="vertical-align: middle;">{{ $data->jumlah_tps }} TPS</td>
                                    <td style="vertical-align: middle; text-align: right;">{{ $data->laki }}</td>
                                    <td style="vertical-align: middle; text-align: right;">{{ $data->perempuan }}</td>
                                    <td style="vertical-align: middle; text-align: right;">{{ $data->jumlah_dpt }}</td>

                                    <td style="vertical-align: middle;">
                                        <a href="#" class="btn btn-danger swal-confirm-dapil" data-toggle="tooltip"
                                            title data-original-title="Hapus" data-id="{{ $data->id }}"
                                            data-nama="{{ $data->nama_desa }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection