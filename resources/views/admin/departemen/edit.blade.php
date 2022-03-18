@extends('layouts.app', ['page_title' => 'Edit Soal'  ])

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/lowongan') }}">lowongan</a></li>
<li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection
@section('content')
<div class="container-fluid bg-white ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form method="post" action="{{ url('admin/lowongan/'.$lowongan->id) }}" class="form-horizontal m-t-20" >
        	    @csrf
        	    @method('patch')
        	    <div class="form-row">
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Departemen</label>
        	    		<input type="text" name="departemen" value="{{ old('departemen', $lowongan->departemen ) }}" class="form-control form-control-sm @error('departemen') is-invalid @enderror" placeholder="Departemen">
        	    		@error('departemen')
        	    		    <span class="invalid-feedback" role="alert">
        	    		        <strong>{{ $message }}</strong>
        	    		    </span>
        	    		@enderror
        	    	</div>
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Jabatan</label>
        	    		<input type="text" name="jabatan" value="{{ old('jabatan', $lowongan->jabatan ) }}" class="form-control form-control-sm @error('jabatan') is-invalid @enderror" placeholder="Jabatan">
        	    		@error('jabatan')
        	    		    <span class="invalid-feedback" role="alert">
        	    		        <strong>{{ $message }}</strong>
        	    		    </span>
        	    		@enderror
        	    	</div>
        	    	<div class="form-group col-md-4 col-sm-12">
        	    		<label>Gaji</label>
        	    		<input type="text" name="gaji" value="{{ old('gaji', $lowongan->gaji ) }}" class="form-control form-control-sm @error('gaji') is-invalid @enderror" placeholder="1.000.000 - 2.500.000">
        	    		@error('gaji')
        	    		    <span class="invalid-feedback" role="alert">
        	    		        <strong>{{ $message }}</strong>
        	    		    </span>
        	    		@enderror
        	    	</div>
        	    </div>

        	    <div class="form-row">
        	    	<div class="form-group col-md-12">
        	    	    <label>Deskripsi</label>
        	    	    <textarea name="deskripsi" id="deskripsi" type="text" class="form-control d-none" placeholder="Ketik deskripsi baru" required>{!! old('deskripsi', $lowongan->deskripsi ) !!}</textarea> 
	    	    	    <div id="editor-deskripsi" class="quill-editor @error('deskripsi') is-invalid @enderror" style="height: 350px;">{!! old('deskripsi', $lowongan->deskripsi ) !!}</div>
                	    @error('deskripsi')
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

	var toolbarOpsi = [
		['bold', 'italic', 'underline', 'strike'],        // toggled buttons
		['blockquote', 'code-block'],

		[{ 'header': 1 }, { 'header': 2 }],               // custom button values
		[{ 'list': 'ordered'}, { 'list': 'bullet' }],
		[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
		[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
		[{ 'direction': 'rtl' }],                         // text direction

		[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
		[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

		[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
		[{ 'font': [] }],
		[{ 'align': [] }],

		['clean']                                         // remove formatting button
	];

	var quillOpsi = {
        theme: 'snow',
        modules: {
			toolbar: toolbarOpsi
		},
		readOnly: false,
		//debug: 'info',
    };

    var quill = new Quill('#editor-deskripsi', quillOpsi);

    quill.on('text-change', function(delta, oldDelta, source) {
		$('#deskripsi').val(quill.root.innerHTML);
    });

</script>
@endpush