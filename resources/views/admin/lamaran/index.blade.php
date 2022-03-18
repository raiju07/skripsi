@extends('layouts.app', ['page_title' => 'Lamaran'  ])



@section('breadcrumb')

<li class="breadcrumb-item active" aria-current="page">lamaran</li>
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

    
    <div class="row justify-content-center p-0">
        
        <div class="col-md-12 p-0">
            <div class="panel panel-default">
                <div class="panel-body p-0">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-sm table-striped table-bordered p-0">
                            <thead>
                                <tr class="text-center">
                                    <th width="10">No</th>
                                    <th>Email</th>
                                    <th>Departemen</th>
                                    <th>Jabatan</th>
                                    <th>Gaji</th>
                                    <th>Nilai Ujian</th>
                                    <th>Nilai Wawancara</th>
                                    <th>Status</th>
                                    <th width="20">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i => $v)
                                    <tr>
                                        <td align="center">{{$loop->iteration}}</td>
                                        <td>{!! $v->pelamar['email'] !!}</td>
                                        <td>{!! $v->lowongan['departemen'] !!}</td>
                                        <td>{!! $v->lowongan['jabatan'] !!}</td>
                                        <td align="right">{!! $v->lowongan['gaji'] !!}</td>
                                        <td align="center">{{ $v->nilai_ujian }}</td>
                                        <td align="center">{!! $v->nilai_wawancara !!}</td>
                                        <td>{!! $v->status !!}</td>

                                        <td align="center">
                                            <div class="d-flex">
                                                <a href="{{url('admin/lamaran/'.$v->id.'/edit')}}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
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
