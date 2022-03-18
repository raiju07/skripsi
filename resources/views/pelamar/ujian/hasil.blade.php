@extends('layouts.app', ['page_title' => 'Hasil Review Anda'  ])



@section('breadcrumb')

<li class="breadcrumb-item active" aria-current="page">Hasil Review Anda</li>
@endsection
@section('content')

<div class="container-fluid bg-white p-0">
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

    <div class="col-md-12 align-center p-0">
        <table class="table table-bordered" >
            <thead>
                <tr class="table-primary text-center">
                    <th>Hasil Tes</th>
                    <th>Hasil Wawancara</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $lamaran->nilai_ujian }}</td>
                    <td>{{ $lamaran->nilai_wawancara }}</td>
                    <td>{{ $lamaran->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function(){

    });
</script>
@endpush




