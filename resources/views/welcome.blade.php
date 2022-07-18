{{-- @extends('layouts.blank')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @component('components.who')
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection --}}

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
            height: 120px;
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
                        <!-- <img src="{{ asset('template') }}/assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
                    </b>
                    <!--End Logo icon -->
                     <!-- Logo text -->
                    <span class="logo-text">
                         <!-- dark Logo text -->
                         <!-- <img src="{{ asset('template') }}/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                        E-Recruitment
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
    {{-- <div id="margin-top" style="margin-top: 165px">
    </div> --}}
    
    {{-- CONTENT --}}
    <div class="container-fluid body" style="min-height: 100vh;background: #eaeaea;">
        <div class="loader">
            <div class="loader-spinner"></div>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        @endif

       {{--  @if($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-warning">:message
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>')) !!}
        @endif --}}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert bg-warning">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
            
        @endif
        <!-- INCLUDES/CAROUSEL -->
        {{-- <div class="slider" >
            
            <div id="carousel-slide" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <li data-target="#carousel-slide" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-slide" data-slide-to="1"></li>
                    <li data-target="#carousel-slide" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="{{asset('template/assets/images')}}/big/img1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('template/assets/images')}}/big/img2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('template/assets/images')}}/big/img3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> --}}

        <div class="row pt-4">
            <div class="col-12 align-items-center text-center">
                <h3>DAFTAR LOWONGAN KERJA</h3>
            </div>
        </div>

        <div class="form-row bg-info text-white mb-4 pt-2">
            <div class="form-group col-md-10 col-sm-6">
                <label>Cari</label>
                <input type="text" id="cari" name="cari" value="{{ old('cari') }}" class="form-control form-control-sm " placeholder="Cari lowongan">
            </div>
            <div class="form-group col-md-2 col-sm-6 d-flex ">
                <button id="find" class="btn btn-block align-self-end"><i class="i fas fa-search"></i></button>
            </div>
            {{ csrf_field() }}
        </div>
        
        <div id="content" class="row m-2">

        </div>

        <div class="row justify-content-center">
            <div id="load-wrapper" class="col-md-2" >
                <button id="load" class="btn btn-cyan">Tampilkan lebih banyak</button>
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
        $('.carousel').carousel()
            ///////////////// fixed menu on scroll for desktop
            if ($(window).width() > 992) {
        } // end if

        $(window).scroll(function(){  
            if ($(this).scrollTop() > 40) {
                $('#navbar-top').addClass("fixed-top");
                // add padding top to show content behind navbar
                $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
                $('#navbar-top').removeClass("fixed-top");
                 // remove padding top from body
                $('body').css('padding-top', '0');
            }   
        });

        var SITEURL = "{{ route('lowongan') }}";
        var page = 1;
        load_more(page);

        $('#cari').on('keyup', function(){
            page = 1; 
        });

        $('#find').on('click', function(){
            page = 1;
            $("#content").empty();   
            load_more(page);  
        });

        $('#load').on('click', function(){
            page++; //page number increment
            load_more(page); //load content  
        });

        function load_more(page){
            var cari = $('#cari').val();
            $.ajax({
                url: SITEURL,
                type: "post",
                datatype: "html",
                data:{
                    'page' : page,
                    'cari' : $('#cari').val(),
                    '_token' : $('input[name="_token"]').val(),
                },
                beforeSend: function()
                {
                   $('.loader').show();
                }
            })
            .done(function(data)
            {
                if(data.length == 0){
                    console.log(data.length);
                    $('.loader').hide();
                    $('#load-wrapper').html("Sudah tidak ada lagi!");
                    return;
                }
                $('.loader').hide();
                if(cari != ''){
                    $("#content").html(data);         
                }else{
                    $("#content").append(data);         
                }

                console.log('data');
                console.log('cari', cari);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('No response from server');
            });

         }
    </script>
</body>
</html>