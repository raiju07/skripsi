@extends('layouts.app', ['page_title' => 'Master Soal'  ])



@section('breadcrumb')

<li class="breadcrumb-item active" aria-current="page">soal</li>
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

    <div class="row mb-2">
        <div class="col-md-12">
            <div><a href="/admin/soal/create" class="btn btn-primary"><i class="fas fa-plus"></i> Soal Baru </a></div>
        </div>
    </div>
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body p-0">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-sm table-striped table-bordered p-0">
                            <thead>
                                <tr class="text-center">
                                    <th width="10">No</th>
                                    <th>Soal</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th width="30">Jawaban</th>
                                    <th width="20">Menit/Waktu</th>
                                    <th width="20">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i => $v)
                                    <tr>
                                        <td align="center">{{$loop->iteration}}</td>
                                        <td>{!! $v->soal !!}</td>
                                        <td>{!! $v->a !!}</td>
                                        <td>{!! $v->b !!}</td>
                                        <td>{!! $v->c !!}</td>
                                        <td>{!! $v->d !!}</td>
                                        <td align="center">{{$v->jawaban}}</td>
                                        <td align="center">{{$v->menit}} Menit</td>
                                        <td align="center">
                                            <div class="d-flex">
                                                <a href="{{url('admin/soal/'.$v->id.'/edit')}}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{url('admin/soal/'.$v->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

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
@push('scripts')
<script type="text/javascript">
    $('#zero_config').DataTable();
</script>
@endpush
