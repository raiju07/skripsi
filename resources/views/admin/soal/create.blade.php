@extends('layouts.app', ['page_title' => 'Soal Baru'  ])

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{ url('/admin/soal') }}">soal</a></li>
<li class="breadcrumb-item active" aria-current="page">buat</li>
@endsection
@section('content')
<div class="container-fluid bg-white ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form method="POST" action="{{ url('admin/soal') }}" class="form-horizontal m-t-20" enctype="multipart/form-data" >
        	    @csrf
        	    <div class="form-row">
        	    	<div class="form-group col-md-12">
        	    	    <label>Soal</label>
        	    	    <textarea name="soal" id="soal" type="text" class="form-control d-none" placeholder="Ketik soal baru" required></textarea> 
	    	    	    <div id="editor-soal" class="quill-editor @error('soal') is-invalid @enderror" style="height: 100px;"></div>
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
        	    	    <textarea name="a" id="a" type="text" class="form-control d-none" placeholder="Jawaban A" required></textarea> 
        	    	    <div id="editor-a" class="quill-editor ql-editor @error('a') is-invalid @enderror" style="height: 100px;"></div>
	    	    	    @error('a')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>

        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi B</label>
        	    	    <textarea name="b" id="b" type="text" class="d-none" placeholder="Jawaban B"></textarea> 
        	    	    <div id="editor-b"  class="quill-editor ql-editor @error('b') is-invalid @enderror" style="height: 100px;"></div>
	    	    	    @error('b')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi C</label>
        	    	    <textarea name="c" id="c" type="text" class="d-none" placeholder="Jawaban C"></textarea> 
        	    	    <div id="editor-c"  class="quill-editor ql-editor @error('c') is-invalid @enderror" style="height: 100px;"></div>
	    	    	    @error('c')
	    	                <span class="invalid-feedback" role="alert">
	    	                    <strong>{{ $message }}</strong>
	    	                </span>
	    	            @enderror
        	    	</div>
        	    	<div class="form-group col-md-6">
        	    	    <label>Opsi D</label>
        	    	    <textarea name="d" id="d" type="text" class="d-none" placeholder="Jawaban D"></textarea> 
        	    	    <div id="editor-d"  class="quill-editor ql-editor @error('d') is-invalid @enderror" style="height: 100px;"></div>
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
	                            <input id="jawaban-a" name="jawaban" value="a" type="radio" class="custom-control-input" required>
	                            <label class="custom-control-label" for="jawaban-a">A</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-b" name="jawaban" value="b" type="radio" class="custom-control-input">
	                            <label class="custom-control-label" for="jawaban-b">B</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-c" name="jawaban" value="c" type="radio" class="custom-control-input">
	                            <label class="custom-control-label" for="jawaban-c">C</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                            <input id="jawaban-d" name="jawaban" value="d" type="radio" class="custom-control-input">
	                            <label class="custom-control-label" for="jawaban-d">D</label>
	                        </div>
	                    </div>
	                </div>

        	    	<div class="form-group col-md-6 col-sm-6 form-row">
        	    	    <label>Menit/Waktu</label>
        	    	    <input name="menit" id="menit" type="number" class="form-control @error('menit') is-invalid @enderror" placeholder="5" value="5"> 
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
			toolbar: toolbarOpsi,
			clipboard: {
	            matchVisual: false
	        }
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
    	var quillHtml = quill.root.innerHTML.replace(/<\/?p[^>]*>/g, "");
		$('#soal').val(quillHtml);
    });
    quillA.on('text-change', function(delta, oldDelta, source) {
		var quillHtmlA = quillA.root.innerHTML.replace(/<\/?p[^>]*>/g, "");
		$('#a').val(quillHtmlA);
    });
    quillB.on('text-change', function(delta, oldDelta, source) {
		var quillHtmlB = quillB.root.innerHTML.replace(/<\/?p[^>]*>/g, "");
		$('#b').val(quillHtmlB);
    });
    quillC.on('text-change', function(delta, oldDelta, source) {
		var quillHtmlC = quillC.root.innerHTML.replace(/<\/?p[^>]*>/g, "");
		$('#c').val(quillHtmlC);
    });
    quillD.on('text-change', function(delta, oldDelta, source) {
		var quillHtmlD = quillD.root.innerHTML.replace(/<\/?p[^>]*>/g, "");
		$('#d').val(quillHtmlD);
    });

</script>
@endpush

