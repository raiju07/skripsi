@extends('layouts.app', ['page_title' => 'Mulai Ujian'  ])



@section('breadcrumb')

<li class="breadcrumb-item active" aria-current="page">Mulai Ujian</li>
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

    <div class="col-md-12 align-center">
        <div class="card shadow rounded">
            <div class="card-header text-center bg-dark text-white">
                <h4 class="card-title" >Waktu anda <span id="timer"></span></h4>
            </div>
            <div class="card-body p-3">
                <form class="m-t-40 form-horizontal" id="step-form" method="POST" action="{{ url('/ujian') }}" enctype="multipart/form-data" >
                    @csrf
                    <div>
                        @foreach($data as $i => $v)
                            <h3>Soal {{ $loop->iteration}}</h3>
                            <section>
                                <p>{!! $v->soal !!}</p>
                                <strong>Jawab:</strong>
                                <div class="form-row form-group">
                                    <div class="col-md-12">
                                        <input id="soal-{{$i}}" name="soal_id[{{$i}}]" value="{{$v->id}}" type="hidden" required>
                                        <input id="jawaban-{{$i}}-null" name="jawaban[{{$i}}]" value="" type="radio" class="d-none" {{old('jawaban.'.$i, null) == null ? 'checked' : ''}}>
                                        <input id="jawaban_soal-{{$i}}" name="jawaban_soal[{{$i}}]" value="{{$v->jawaban}}" type="hidden" required>

                                        <div class="custom-control custom-radio">
                                            <input id="jawaban-{{$i}}-a" name="jawaban[{{$i}}]" value="a" type="radio" class="custom-control-input" required {{old('jawaban.'.$i) == 'a' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="jawaban-{{$i}}-a"><strong>A.</strong> {!! $v->a !!}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="jawaban-{{$i}}-b" name="jawaban[{{$i}}]" value="b" type="radio" class="custom-control-input" required {{old('jawaban.'.$i) == 'b' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="jawaban-{{$i}}-b"><strong>B.</strong> {!! $v->b !!}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="jawaban-{{$i}}-c" name="jawaban[{{$i}}]" value="c" type="radio" class="custom-control-input" required {{old('jawaban.'.$i) == 'c' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="jawaban-{{$i}}-c" ><strong>C.</strong> {!! $v->c !!}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="jawaban-{{$i}}-d" name="jawaban[{{$i}}]" value="d" type="radio" class="custom-control-input" required {{old('jawaban.'.$i) == 'd' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="jawaban-{{$i}}-d"><strong>D.</strong> {!! $v->d !!}</label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                        @endforeach
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    var $soal = @json($data); 
    var currentStep = 0;
    var min =  $soal[currentStep].menit -1 ;
    var sec = 60;
    var form = $("#step-form");
    var myVar = null;
    $(function(){
        

        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });

        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            titleTemplate: '<span class="number">#title#</span>',// #index#
            transitionEffect: "slideLeft",
            autoFocus: true,
            forceMoveForward:false,
            //enablePagination:true,
            onInit: function (event, current) {
                $('.actions > ul > li:first-child').attr('style', 'display:none');
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                currentStep = newIndex;
                setTimer();
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                $theSteps = $('.steps ul').find('.current');
                $($theSteps).prev('li').addClass('disabled');
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                form.submit();
            }
        });

        function setTimer(){
            clearInterval(myVar);
            min =  $soal[currentStep].menit - 1;
            sec = 60;
            myVar = setInterval(myTimer ,1000);
        }

        function myTimer() {
            if(min == 0 && sec == 0){
                form.children("div").steps('next');
                //setTimer(currentStep);
            }

            if(sec <= 0){
                min--;
                sec = 60;
            }else{
               sec--; 
            }

            $("#timer").html(min+':'+sec);
        }

        setTimer();
        //$("a[href$='previous']").hide();

    });
</script>
@endpush

@push('styles')
<style type="text/css">
    
</style>
@endpush




