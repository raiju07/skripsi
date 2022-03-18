<html>
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="description" content="155 characters of message matching text with a call to action goes here">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Hege Refsnes">

    {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script> --}}

    <!-- STYLE -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('template/dist/css/style.min.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="./css/bootstrap.css">
    <link href="./css/style.css" rel="stylesheet"> --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>

    <style type="text/css">
        .carousel-inner{
            width:100%;
            max-height: 80vh !important;
            display: flex;
            align-items: center;
        }

        p{
            margin-bottom: 0;
        }

        .deskripsi{
            height: 100%;
        }

        .loader {
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left:0;
            z-index: 1;
            background: white;
            padding-top: 30vh;
            display: none;
        }

        .loader-spinner {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            margin: auto;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <header class="topbar" data-navbarbg="skin5" style="" >
        <nav id="navbar-top" class="navbar fixed-top top-navbar navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-header" data-logobg="skin5" style="">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                {{-- <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a> --}}
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand " href="/" style="height: 100%;display: block;background: black;">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('template') }}/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                     <!-- Logo text -->
                    <span class="logo-text">
                         <!-- dark Logo text -->
                         <img src="{{ asset('template') }}/assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        
                    </span>

                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></a>

            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->

            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-left mr-auto">
                </ul>
                <ul class="navbar-nav float-right">
                    @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    
    {{-- CONTENT --}}
    <div class="container-fluid body" style="min-height: 100vh;background: #eaeaea;">
        <div class="loader">
            <div class="loader-spinner"></div>
        </div>


        
        <div id="content" class="row m-2">
            <div class="col-md-12 align-center">
                <div class="card shadow rounded">
                    <div class="card-header text-center bg-dark text-white">
                        <h4 class="card-title">{{$lowongan->jabatan}} {{$lowongan->departemen}}</h4>
                    </div>
                    <div class="card-body p-3">
                        <span class="m-b-15 d-block deskripsi">{!! $lowongan->deskripsi !!}</span>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="/" class="btn btn-warning"><i class="fas fa-arrow-left"></i>  kembali </a>
                        <form action="{{ url('lamaran') }}" method="POST" class="d-inline">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="lowongan_id" value="{{$lowongan->id}}">
                            <button class="btn btn-cyan"> Lamar sekarang </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- INCLUDES/FOOTER -->
    <div class="container-fluid footer bg-dark text-white text-center">
        <div class="row">
            <div class="col-md-12">
                <h6 class="footer-copy">@copyright STIKOM 2021</h6>
            </div>
        </div>
    </div>

    {{-- END FOOTER --}}

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('template/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('template/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script>

    </script>
</body>
</html>