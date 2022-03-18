@extends('layouts.app', ['page_title' => 'Edit Soal'  ])

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/lamaran') }}">lamaran</a></li>
<li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection
@section('content')
<div class="container-fluid bg-white ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form method="post" action="{{ url('admin/lamaran/'.$lamaran->id) }}" class="form-horizontal m-t-20" >
        	    @csrf
        	    @method('patch')

        	    <div class="form-row">
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Email</label>
        	    		<input type="text" name="departemen" value="{{ $lamaran->pelamar['email'] }}" class="form-control " disabled>
        	    	</div>
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Departemen</label>
        	    		<input type="text" name="departemen" value="{{ $lamaran->lowongan['departemen'] }}" class="form-control " disabled>
        	    	</div>
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Jabatan</label>
        	    		<input type="text" name="departemen" value="{{ $lamaran->lowongan['jabatan'] }}" class="form-control " disabled>
        	    	</div>

        	    </div>

        	    <div class="form-row">

        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Nilai Ujian</label>
        	    		<input type="number" step="any" name="nilai_ujian" value="{{ old('nilai_ujian', $lamaran->nilai_ujian ) }}" class="form-control  @error('nilai_ujian') is-invalid @enderror" placeholder="00" required>
        	    		@error('nilai_ujian')
        	    		    <span class="invalid-feedback" role="alert">
        	    		        <strong>{{ $message }}</strong>
        	    		    </span>
        	    		@enderror
        	    	</div>
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Nilai Wawancara</label>
        	    		<input type="number" step="any" name="nilai_wawancara" value="{{ old('nilai_wawancara', $lamaran->nilai_wawancara ) }}" class="form-control  @error('nilai_wawancara') is-invalid @enderror" placeholder="00" required="">
        	    		@error('nilai_wawancara')
        	    		    <span class="invalid-feedback" role="alert">
        	    		        <strong>{{ $message }}</strong>
        	    		    </span>
        	    		@enderror
        	    	</div>

        	    	<div class="form-group col-md-4 col-sm-12">
        	    	    <label>Status {{$lamaran->status}} {{ old('status', $lamaran->status) == 'daftar'}} </label>
        	    	    <select id="status" name="status" class="select2 form-control custom-select @error('status') is-invalid @enderror" style="width: 100%; height:36px;">
        	    	    	<option>select</option>
        	    	        <option value="daftar" {{ old('status', $lamaran->status) == 'daftar' ? 'selected' : ''}}>Daftar</option>
        	    	        <option value="proses" {{ old('status', $lamaran->status) == 'proses' ? 'selected' : ''}}>Proses</option>
        	    	        <option value="lulus" {{ old('status', $lamaran->status) == 'lulus' ? 'selected' : ''}}>Lulus</option>
        	    	        <option value="gagal" {{ old('status', $lamaran->status) == 'gagal' ? 'selected' : ''}}>Gagal</option>
        	    	    </select>

        	    	    @error('status')
        	    	        <span class="invalid-feedback" role="alert">
        	    	            <strong>{{ $message }}</strong>
        	    	        </span>
        	    	    @enderror
        	    	</div>
        	    </div>

        	    <div class="form-row">
        	    	<button type="submit" class="btn btn-primary">Simpan</button>
        	    </div>
        	</form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

</script>
@endpush