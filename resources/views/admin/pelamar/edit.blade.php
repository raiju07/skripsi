@extends('layouts.app', ['page_title' => 'Edit Pelamar'  ])

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="/admin/pelamar">pelamar</a></li>
<li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection
@section('content')
<div class="container-fluid bg-white ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form method="POST" action="{{ url('admin/pelamar/'.$user->id ) }}" enctype="multipart/form-data" autocomplete="off">
        	  	@csrf
        	  	@method('patch')
        	  	<!-- <div class="form-row">
        	  		<div class="form-group col-md-6 text-center">
        	  			<label>Foto</label>
        	  		    <div class="" style="height:200px">
        	  		        <img id="foto-preview" src="{{ asset('images') }}/{{ $user->foto == '' ? 'noimage.png' : $user->foto }}" class="img-thumbnail" alt="..." style="height:200px">
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
        	  		<div class="form-group col-md-6 text-center">
        	  			<label>CV</label>
        	  		    <div class="" style="height:200px">
        	  		        <img id="cv-preview" src="{{ asset('images') }}/{{ $user->cv == '' ? 'noimage.png' : $user->cv }}" class="img-thumbnail" alt="..." style="height:200px">
        	  		    </div>
        	  		    <input type="file" name="cv" id="cv" class="form-control form-control-sm @error('cv') is-invalid @enderror" onchange="function showPict(e){
        			            var file = e.target.files[0];
        			            var fileReader = new FileReader();
        			            fileReader.onload = function(e) { 
        			                $('#cv-preview').attr('src',fileReader.result )
        			            };
        			            fileReader.readAsDataURL(file);
        			        } showPict(event)">
        			        @error('cv')
        			            <span class="invalid-feedback" role="alert">
        			                <strong>{{ $message }}</strong>
        			            </span>
        			        @enderror
        	  		</div>

        	  	</div> -->
				<div class="form-row">
					<div class="form-group col-md-6 col-sm-12 text-center">
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
						<label>Update CV <span class="badge badge-secondary">jpg, jpeg, png, word, pdf</span></label>
						<!-- <div class="" style="height:200px">
							<img id="cv-preview" src="{{ asset('images') }}/{{ $user->cv == '' ? 'noimage.png' : $user->cv }}" class="img-thumbnail" alt="..." style="height:200px">
						</div> -->
						<input type="file" name="cv" id="cv" class="form-control form-control-sm @error('cv') is-invalid @enderror" >
							@error('cv')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

				</div>
				@if( !is_null($user->cv) && $user->cv != '')
				<div class="form-row bg-light pt-2">
					<div class="form-group col-md-6 col-sm-12">
						<label>Download CV</label>
						<br>
						<a class="btn btn-sm btn-info" href="{{ asset('cv/'.$user->cv) }}" download="{{$user->cv}}">{{ $user->cv }}</a>
					</div>
				</div>
				@endif
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
        	  		<div class="form-group col-md-3 col-sm-6">
        	  			<label>Email</label>
        	  			<input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
        	  			@error('email')
        	  			    <span class="invalid-feedback" role="alert">
        	  			        <strong>{{ $message }}</strong>
        	  			    </span>
        	  			@enderror
        	  		</div>
        	  		<div class="form-group col-md-3 col-sm-6">
        	  			<label>Telp</label>
        	  			<input type="text" name="telp" value="{{ old('telp', $user->telp) }}" class="form-control form-control-sm @error('telp') is-invalid @enderror" placeholder="Telp">
        	  			@error('telp')
        	  			    <span class="invalid-feedback" role="alert">
        	  			        <strong>{{ $message }}</strong>
        	  			    </span>
        	  			@enderror
        	  		</div>
        	  	</div>
        	  	<div class="form-row">
        	  		
        	  		<div class="form-group col-12">
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
        	  			<label>Tempat Lahir</label>
        	  			<input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" placeholder="tempat lahir">
        	  			@error('tempat_lahir')
        	  			    <span class="invalid-feedback" role="alert">
        	  			        <strong>{{ $message }}</strong>
        	  			    </span>
        	  			@enderror
        	  		</div>
        	  		<div class="form-group col-md-6 col-sm-12">
        	  			<label>Tgl Lahir</label>
        	  			<div class="input-group">
        	  			    <input name="tgl_lahir" type="text" class="form-control form-control-sm @error('tgl_lahir') is-invalid @enderror" id="datepicker-autoclose" placeholder="YYYY-MM-DD" data-date-format="yyyy-mm-dd" value="{{ old( 'tgl_lahir', $user->tgl_lahir) }}">
        	  			    <div class="input-group-append">
        	  			        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        	  			    </div>
        	  			    @error('tgl_lahir')
        	  			        <span class="invalid-feedback" role="alert">
        	  			            <strong>{{ $message }}</strong>
        	  			        </span>
        	  			    @enderror
        	  			</div>
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
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('#zero_config').DataTable();
	$(function(){
		$('#check-password').on('change', function(){
			if ($(this).is(':checked')) {
	            $('.password').prop('disabled', false);
	        } else {
	        	$('.password').prop('disabled', true);
	        }
		})
		jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
	});
</script>
@endpush