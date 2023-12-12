@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <h5 style="font-size: 16px; margin-top: 25px; margin-bottom: 20px;
                padding-left: 25px;">Rabu, 14 Februari 2024</h5>

                <div style="border-top: 1px solid #f9f9f9; margin-bottom: 20px"></div>

                <div class="countdown">
                    <span class="hari time-elem"></span>
                    <span class="jam time-elem"></span>
                    <span class="menit time-elem"></span>
                    <span class="detik time-elem"></span>
                </div>

                <div class="caption">
                    <div class="caption-jarak">
                        <div class="keterangan">HARI</div>
                    </div>

                    <div class="caption-jarak">
                        <div class="keterangan">JAM</div>
                    </div>

                    <div class="caption-jarak">
                        <div class="keterangan">MENIT</div>
                    </div>

                    <div class="caption-jarak">
                        <div class="keterangan">DETIK</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-danger bg-danger">
                <i class="fas fa-bullseye"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Target Suara</h4>
                </div>
                <div class="card-body">
                    10.000
                </div>
            </div>
        </div>

        <div class="card card-statistic-2" style="margin-top: -50px">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Dukungan Terkumpul</h4>
                </div>
                <div class="card-body">
                    {{ $total_dukungan }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-warning bg-warning">
                <i class="far fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data DPT</h4>
                </div>
                <div class="card-body">
                    286.201
                </div>
            </div>
        </div>



        <div class="card card-statistic-2" style="margin-top: -50px">
            <div class="card-icon shadow-success bg-success">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Relawan</h4>
                </div>
                <div class="card-body">
                    {{ $jumlah_relawan }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Monitoring Wilayah</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center" class="table-active">Kecamatan</th>
                                <th scope="col" style="text-align: center" class="table-active">DPT</th>
                                <th scope="col" style="text-align: center" class="table-active">TPS</th>
                                <th scope="col" style="text-align: center" class="table-active">Dukungan</th>
                                <th scope="col" style="text-align: center" class="table-active">Target Suara</th>
                                <th scope="col" style="text-align: center" class="table-active">Potensial</th>
                                <th scope="col" style="text-align: center" class="table-active">Capaian</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Bojong Gede</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Ciseeng</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Gunung Sindur</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Kemang</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Parung</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Ranca Bungur</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <td>Tajur Halang</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right">0</td>
                                <td style="text-align: right" class="table-active">0</td>
                                <td style="text-align: right">0</td>
                            </tr>
                            <tr>
                                <th style="text-align: center">Total</th>
                                <th style="text-align: right">0</th>
                                <th style="text-align: right">0</th>
                                <th style="text-align: right">0</th>
                                <th style="text-align: right">0</th>
                                <th style="text-align: right" class="table-active">0</th>
                                <th style="text-align: right">0</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-lg-6">
        {{-- <div class="card">
            <div class="card-body">
                <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
                    <img alt="image" src="{{ asset('assets/img/adian.jpg') }}" class="img-fluid">
                </div>
            </div>
        </div> --}}

        <div class="card">
        <div class="card-header"><h4>Calon Legislatif</h4></div>
        <div class="card-body">
            <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                <li class="media" style="align-items: center;">
                    <img alt="image" class="mr-3 rounded-circle" width="100" src="{{ asset('assets/img/adian.jpg') }}">
                    <div class="media-body">
                        <div class="media-title"><h5>Adian Yunus Napitupulu, S.H</h5></div>
                        <div class="text-muted d-inline font-weight-normal">DPR RI Provinsi Jawa Barat Dapil 5</div>
                        <div class="text-muted d-inline font-weight-normal"><div class="text-primary">PDI Perjuangan</div></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4>Demografi Relawan</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                        <img class="mr-3 rounded shadow-light" width="55"
                            src="{{ asset('assets/img/avatar/avatar-3.png') }}">
                        <div class="media-body">
                            <div class="media-title">Laki-laki</div>
                            <div class="mt-1">
                                <div class="budget-price-label">{{ $jumlah_relawan_laki }} jiwa</div>
                            </div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="mr-3 rounded shadow-light" width="55"
                            src="{{ asset('assets/img/avatar/avatar-4.png') }}">
                        <div class="media-body">
                            <div class="media-title">Perempuan</div>
                            <div class="mt-1">
                                <div class="budget-price-label">{{ $jumlah_relawan_perempuan }} jiwa</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4>Demografi Pemilih</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                        <img class="mr-3 rounded shadow-light" width="55"
                            src="{{ asset('assets/img/avatar/avatar-3.png') }}">
                        <div class="media-body">
                            <div class="media-title">Laki-laki</div>
                            <div class="mt-1">
                                <div class="budget-price-label">{{ $jumlah_pemilih_laki }} jiwa</div>
                            </div>
                        </div>
                    </li>
                    <li class="media">
                        <img class="mr-3 rounded shadow-light" width="55"
                            src="{{ asset('assets/img/avatar/avatar-4.png') }}">
                        <div class="media-body">
                            <div class="media-title">Perempuan</div>
                            <div class="mt-1">
                                <div class="budget-price-label">{{ $jumlah_pemilih_perempuan }} jiwa</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection