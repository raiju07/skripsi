@extends('layouts.app', ['page_title' => 'Lamaran Anda'  ])

@section('breadcrumb')

<li class="breadcrumb-item active" aria-current="page">Lamaran Anda</li>
@endsection
@section('content')

<div class="container-fluid bg-white ">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12 align-center">
        @if(auth()->guard('web')->user()->lamaran()->exists())
            @foreach( $lamaran as $i => $lamaran )
                <div class="card shadow rounded">
                    <div class="card-header text-center bg-dark text-white">
                        <h4 class="card-title">{{$lamaran->lowongan['jabatan']}} {{$lamaran->lowongan['departemen']}}</h4>
                    </div>
                    <div class="card-body p-3">
                        <span class="m-b-15 d-block deskripsi">{!! $lamaran->lowongan['deskripsi'] !!}</span>

                    </div>
                </div>
            @endforeach
        @else
            <div class="card shadow rounded">
                <div class="card-header text-center bg-dark text-white">
                    <h4 class="card-title">Anda Belum Melamar</h4>
                </div>
                <div class="card-body p-3">
                    <a href="/">Lihat lamaran</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function(){

    });
</script>
@endpush




