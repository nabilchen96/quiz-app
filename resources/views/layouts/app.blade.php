<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon.ico') }}" />
    <link rel="icon" type="image/png" href="{{ asset('icon.ico') }}" />

    <title>Aplikasi Ujian Online</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        .table td {
            white-space: unset;
        }

        div.scroll {
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
        }

        .page-item .page-link {
            border-radius: 8px !important;
            margin: 5px;
        }

        .judul_berita {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
            height: 54px;
        }
    </style>

</head>

<body class="bg-gray-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container py-2">
            <a class="navbar-brand py-0" href="{{ url('/') }}">
                <h3 class="mb-0">Tekwuon 🚁</h3>
                {{-- <span class="mt-0 ms-1">Aplikasi Quiz Online</span> --}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('produk') }}" style="margin-right: 20px">Sahretech</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('berita') }}" style="margin-right: 20px">Porkaone</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-light bg-white navbar-expand fixed-bottom pb-0">
        <ul class="navbar-nav nav-justified w-100">

            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="bi bi-ui-checks-grid" style="font-size: 16px;"></i>
                    <br />
                    <p class="text-sm">Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link">
                    <i class="bi bi-people" style="font-size: 16px;"></i>
                    <br />
                    <p class="text-sm">User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/soal') }}" class="nav-link">
                    <i class="bi bi-file-earmark-text" style="font-size: 16px;"></i>
                    <br />
                    <p class="text-sm">Soal</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/nilai') }}" class="nav-link">
                    <i class="bi bi-trophy" style="font-size: 16px;"></i>
                    <br />
                    <p class="text-sm">Nilai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="bi bi-arrow-right" style="font-size: 16px;"></i>
                    <br />
                    <p class="text-sm">Logout</p>
                </a>
            </li>
        </ul>
    </nav>

    @yield('content')

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        axios.interceptors.request.use(function(config) {
            $('.spinner-border').show();
            return config;
        });

        axios.interceptors.response.use(function(response) {
            $('.spinner-border').hide();
            return response;
        });
    </script>
    @stack('script')
    <br><br><br>
</body>

</html>
