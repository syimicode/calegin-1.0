<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Calegin</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    @stack('page-styles')

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Konten Header (file dipecah di header.blade.php) -->
            @include('layout.header')

            <!-- Konten Sidebar (file dipecah di sidebar.blade.php) -->
            @include('layout.sidebar')


            <!-- Main Content -->
            <div class="main-content">

                {{-- Ini adalah Modal untuk button import file crud_relawan --}}
                <div class="modal fade" id="importRelawan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">*File format excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('importdatarelawan') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan data</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                {{-- Ini adalah Modal untuk button import file crud_pemilih --}}
                <div class="modal fade" id="importPemilih" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">*File format excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('importdatapemilih') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan data</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                {{-- Ini adalah Modal untuk button import file crud_dpt_dapil --}}
                <div class="modal fade" id="importDataDapil" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">*File format excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('importdatadpt') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan data</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                <section class="section">

                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="d-flex justify-content-center">
                    Copyright &copy; 2023 <div class="bullet"></div> Calegin
                </div>
            </footer>
        </div>
    </div>

    @stack('before-scripts')
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    {{-- SweetAlert2 (icon warning delete data untuk crud_relawan)--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $('.swal-confirm-relawan').click(function () {

            var relawan_id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Data Relawan dengan nama " + nama + "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "relawan/delete/" + relawan_id + ""
                };
            });
        });
    </script>


    {{-- SweetAlert2 (icon warning delete data untuk crud_pemilih)--}}
    <script type="text/javascript">
        $('.swal-confirm-pemilih').click(function () {

            var pemilih_id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Data Pemilih dengan nama " + nama + "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "pemilih/delete/" + pemilih_id + ""
                };
            });
        });
    </script>

    {{-- SweetAlert2 (icon warning delete data untuk crud_data_dapil)--}}
    <script type="text/javascript">
        $('.swal-confirm-dapil').click(function () {

            var dapil_id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda akan menghapus Data DPT pada Desa " + nama + "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "dpt/delete/" + dapil_id + ""
                };
            });
        });
    </script>

    {{-- csrf-token untuk Indoregion (di view crud_relawan_tambah dan crud_pemilih_tambah) --}}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(function () {
            // Menampilkan otomatis data list kabupaten saat dropdown provinsi dipilih
            $('#provinsi').on('change', function () {
                let id_provinsi = $('#provinsi').val();

                // Mengirim data id_provinsi ke Route
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,

                    // Tampilkan data list kabupaten
                    success: function (msg) {
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function (data) {
                        console.log('error:', data);
                    },
                })
            })

            // Menampilkan otomatis data list kecamatan saat dropdown kabupaten dipilih
            $('#kabupaten').on('change', function () {
                let id_kabupaten = $('#kabupaten').val();

                // Mengirim data id_kabupaten ke Route
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    // Tampilkan data list kecamatan
                    success: function (msg) {
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function (data) {
                        console.log('error:', data);
                    },
                })
            })

            // Menampilkan otomatis data list desa saat dropdown kecamatan dipilih
            $('#kecamatan').on('change', function () {
                let id_kecamatan = $('#kecamatan').val();

                // Mengirim data id_kecamatan ke Route
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    // Tampilkan data list desa
                    success: function (msg) {
                        $('#desa').html(msg);
                    },
                    error: function (data) {
                        console.log('error:', data);
                    },
                })
            })
        })
    </script>

</body>

</html>