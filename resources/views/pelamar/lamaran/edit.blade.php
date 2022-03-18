@extends('layouts.app', ['page_title' => 'Edit Soal'  ])

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/soal') }}">soal</a></li>
<li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection
@section('content')
<div class="container-fluid bg-white ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form method="post" action="{{ url('admin/soal/'.$soal->id) }}" class="form-horizontal m-t-20" >
        	    @csrf
        	    @method('patch')
        	    <div class="form-row">
        	    	<div class="form-group col-md-12">
        	    	    <label>Soal</label>
        	    	    <textarea name="soal" id="soal" type="text" class="form-control d-none" placeholder="Ketik soal baru">{!! old('soal', $soal->soal) !!}</textarea>
        	    	    <div id="editor-soal" class="quill-editor @error('soal') is-invalid @enderror" style="height: 100px;">{!! old('soal', $soal->soal) !!}</div>
	    	    	    @error('soal')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    </div>
        	    <div class="form-row">
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi A</label>
        	    	    <textarea name="a" id="a" type="text" class="form-control d-none" placeholder="Jawaban A">{!! old('a', $soal->a) !!}</textarea> 
        	    	    <div id="editor-a" class="quill-editor @error('a') is-invalid @enderror" style="height: 100px;">{!! old('a', $soal->a) !!}</div>
	    	    	    @error('a')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi B</label>
        	    	    <textarea name="b" id="b" type="text" class="form-control d-none" placeholder="Jawaban B">{!! old('b', $soal->b) !!}</textarea>
        	    	    <div id="editor-b"  class="form-control @error('b') is-invalid @enderror" style="height: 100px;">{!! old('b', $soal->b) !!}</div>
	    	    	    @error('b')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi C</label>
        	    	    <textarea name="c" id="c" type="text" class="form-control d-none" placeholder="Jawaban C">{!! old('c', $soal->c) !!}</textarea>
        	    	    <div id="editor-c"  class="form-control @error('c') is-invalid @enderror" style="height: 100px;">{!! old('c', $soal->c) !!}</div>
	    	    	    @error('c')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi D</label>
        	    	    <textarea name="d" id="d" type="text" class="form-control d-none" placeholder="Jawaban B">{!! old('d', $soal->d) !!}</textarea>
        	    	    <div id="editor-d"  class="form-control @error('d') is-invalid @enderror" style="height: 100px;">{!! old('d', $soal->d) !!}</div>
	    	    	    @error('d')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    </div>

        	    <div class="form-row">
        	    	<div class="form-group col-md-6 col-sm-6 form-row">
	                    <label class="col-md-3">Jawaban</label>
	                    <div class="col-md-9">
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-a" name="jawaban" value="a" type="radio" class="custom-control-input" {{ old('jawaban', $soal->jawaban) == 'a' ? 'checked' : '' }} >
	                            <label class="custom-control-label" for="jawaban-a">A</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-b" name="jawaban" value="b" type="radio" class="custom-control-input" {{ old('jawaban', $soal->jawaban) == 'b' ? 'checked' : '' }}>
	                            <label class="custom-control-label" for="jawaban-b">B</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-c" name="jawaban" value="c" type="radio" class="custom-control-input" {{ old('jawaban', $soal->jawaban) == 'c' ? 'checked' : '' }}>
	                            <label class="custom-control-label" for="jawaban-c">C</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-d" name="jawaban" value="d" type="radio" class="custom-control-input" {{ old('jawaban', $soal->jawaban) == 'd' ? 'checked' : '' }}>
	                            <label class="custom-control-label" for="jawaban-d">D</label>
	                        </div>
	                    </div>
	                </div>

        	    	<div class="form-group col-md-6 col-sm-6 form-row">
        	    	    <label>Menit/Waktu</label>
        	    	    <input name="menit" id="menit" type="number" class="form-control @error('menit') is-invalid @enderror" placeholder="5" value="{{old('menit', $soal->menit)}}"> 
	    	    	    @error('menit')
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

    var quill = new Quill('#editor-soal', quillOpsi);
    var quillA = new Quill('#editor-a', quillOpsi);
    var quillB = new Quill('#editor-b', quillOpsi);
    var quillC = new Quill('#editor-c', quillOpsi);
    var quillD = new Quill('#editor-d', quillOpsi);

    quill.on('text-change', function(delta, oldDelta, source) {
		$('#soal').val(quill.root.innerHTML);
    });
    quillA.on('text-change', function(delta, oldDelta, source) {
		$('#a').val(quillA.root.innerHTML);
    });
    quillB.on('text-change', function(delta, oldDelta, source) {
		$('#b').val(quillB.root.innerHTML);
    });
    quillC.on('text-change', function(delta, oldDelta, source) {
		$('#c').val(quillC.root.innerHTML);
    });
    quillD.on('text-change', function(delta, oldDelta, source) {
		$('#d').val(quillD.root.innerHTML);
    });

</script>
@endpush