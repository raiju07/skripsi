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
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    <form method="POST" action="{{ url('admin/profil/'.$user->id ) }}" enctype="multipart/form-data" autocomplete="off">
      	@csrf
      	@method('patch')
      	<div class="form-row">
      		<div class="form-group col text-center">
      		    <div class="" style="height:200px">
      		        <img id="foto-preview" src="{{ $user->foto == '' ? '/images/noimage.png' : '/images/'.$user->foto }}" class="img-thumbnail" alt="..." style="height:200px">
      		    </div>
      		    <input type="file" name="foto" id="foto" class="form-control form-control-sm @error('foto') is-invalid @enderror" onchange="function showPict(e){
    		            var file = e.target.files[0];
    		            var fileReader = new FileReader();
    		            fileReader.onload = function(e) { 
    		                $('#foto-preview').attr('src',fileReader.result )
    		            };
    		            fileReader.readAsDataURL(file);
    		        } showPict(event)">
    		        @error('foto')
    		            <span class="invalid-feedback" role="alert">
    		                <strong>{{ $message }}</strong>
    		            </span>
    		        @enderror
      		</div>

      	</div>
      	<div class="form-row">
      		<div class="form-group col-md-6 col-sm-12">
      			<label>Nama</label>
      			<input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="form-control form-control-sm @error('nama') is-invalid @enderror" placeholder="Nama">
      			@error('nama')
      			    <span class="invalid-feedback" role="alert">
      			        <strong>{{ $message }}</strong>
      			    </span>
      			@enderror
      		</div>
      		<div class="form-group col-md-6 col-sm-12">
      			<label>Email</label>
      			<input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
      			@error('email')
      			    <span class="invalid-feedback" role="alert">
      			        <strong>{{ $message }}</strong>
      			    </span>
      			@enderror
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="form-group col-md-6 col-sm-12">
      			<label>Telp</label>
      			<input type="text" name="telp" value="{{ old('telp', $user->telp) }}" class="form-control form-control-sm @error('telp') is-invalid @enderror" placeholder="Telp">
      			@error('telp')
      			    <span class="invalid-feedback" role="alert">
      			        <strong>{{ $message }}</strong>
      			    </span>
      			@enderror
      		</div>
      		<div class="form-group col-md-6 col-sm-12">
      			<label>Alamat</label>
      			<input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}" class="form-control form-control-sm @error('alamat') is-invalid @enderror" placeholder="Alamat">
      			@error('alamat')
      			    <span class="invalid-feedback" role="alert">
      			        <strong>{{ $message }}</strong>
      			    </span>
      			@enderror
      		</div>
      	</div>
      	<div class="form-row">
      		<div class="form-group col-md-6 col-sm-12">
      			<label>Jabatan</label>
      			<input type="text" name="jabatan" value="{{ $user->jabatan }}" class="form-control form-control-sm @error('jabatan') is-invalid @enderror" placeholder="Jabatan">
      			@error('jabatan')
      			    <span class="invalid-feedback" role="alert">
      			        <strong>{{ $message }}</strong>
      			    </span>
      			@enderror
      		</div>
      	</div>

      	<hr>

        <div class="form-group">
            <label class=""><input type="checkbox" id="check-password" > Ganti password</label>
        </div>

        <div class="form-row">
        	<div class="form-group col">
        		<label>Password</label>
        		<input type="password" name="password" id="password" class="form-control form-control-sm password" required disabled placeholder="Password">
        		<h6 class="text-danger"><span class="pwd_error"></span></h6>
        	</div>
        	<div class="form-group col">
        		<label >Konfirmasi</label>
              	<input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm password" required disabled placeholder="Konfirmasi Password">
              	<h6 class="text-danger"><span class="pwd_error"></span></h6>
        	</div>
        </div>

        <button class="btn btn-success btn-block" type="submit">Update</button>
    </form>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$(function(){
		$('#check-password').on('change', function(){
			if ($(this).is(':checked')) {
	            $('.password').prop('disabled', false);
	        } else {
	        	$('.password').prop('disabled', true);
	        }
		})
	});
</script>
@endpush




