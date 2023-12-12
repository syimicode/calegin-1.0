@extends('layout.master')
@section('content')
<div class="section-header">
    <h1>Data Pemilih</h1>
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

            {{-- pesan toast error ketika validasi data sudah mencapai batas maksimum upload --}}
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('error') }}
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="col-12 col-md-8 col-sm-6">
                        <a href="{{ route('tambahpemilih') }}" class="btn btn-icon icon-left btn-primary">
                            <i class="fas fa-plus"></i> Tambah Data</a>
                    </div>

                    <div class="col-12 col-md-4 col-sm-6" style="display: flex; justify-content: flex-end">
                        {{-- Modal pada button import file terletak di file master.blade.php --}}
                        <button type="button" class="btn btn-icon icon-left btn-light" data-toggle="modal"
                            data-target="#importPemilih">
                            <i class="far fa-file"></i> Import Excel</button>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Tabel Data Pendukung/Pemilih --}}
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatables">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">#</th>
                                    <th style="vertical-align: middle;">Kecamatan</th>
                                    <th style="vertical-align: middle;">Kelurahan/Desa</th>
                                    <th style="vertical-align: middle;">NIK</th>
                                    <th style="vertical-align: middle;">Nama</th>
                                    <th style="vertical-align: middle;">Gender</th>
                                    <th style="vertical-align: middle;">Usia</th>
                                    <th style="vertical-align: middle;"
                                        class="sorting_asc_disabled sorting_desc_disabled">WhatsApp</th>
                                    <th style="vertical-align: middle;"
                                        class="sorting_asc_disabled sorting_desc_disabled">KTP</th>
                                    <th style="vertical-align: middle; text-align: center;"
                                        class="sorting_asc_disabled sorting_desc_disabled">Edit</th>
                                    <th style="vertical-align: middle; text-align: center;"
                                        class="sorting_asc_disabled sorting_desc_disabled">Hapus</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data_pemilih as $no => $data)
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">{{ $no+1 }}.</td>
                                    <td style="vertical-align: middle;">
                                        {{ $data->kecamatanpemilih->name ?? $data->kecamatan }}</td>
                                    <td style="vertical-align: middle;">
                                        {{ $data->desapemilih->name ?? $data->desa }}</td>
                                    <td style="vertical-align: middle; white-space: nowrap;">{{ $data->nik }}</td>
                                    <td style="vertical-align: middle; white-space: nowrap;">{{ $data->nama_pemilih }}
                                    </td>
                                    <td style="vertical-align: middle; white-space: nowrap;">{{ $data->jenis_kelamin }}
                                    </td>
                                    <td style="vertical-align: middle; white-space: nowrap;">{{ $data->usia }} thn</td>
                                    <td style="vertical-align: middle; white-space: nowrap;">{{ $data->whatsapp }}</td>
                                    <td style="vertical-align: middle;">
                                        <div class="gallery">
                                            <div class="gallery-item" data-image="{{ asset('imageKTP/'.$data->ktp) }}"
                                                data-title="{{$data->ktp}}" href="{{ asset('imageKTP/'.$data->ktp) }}"
                                                style="background-image: {{ asset('imageKTP/'.$data->ktp) }};">
                                            </div>
                                        </div>
                                    </td>

                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="{{ route('editpemilih', $data->id) }}" class="btn btn-success mr-2"
                                            data-toggle="tooltip" title data-original-title="Edit">
                                            <i class="fas fa-pencil-alt"></i></a>
                                    </td>

                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="#" class="btn btn-danger swal-confirm-pemilih" data-toggle="tooltip"
                                            title data-original-title="Hapus" data-id="{{ $data->id }}"
                                            data-nama="{{ $data->nama_pemilih }}"><i class="fas fa-trash"></i></a>
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