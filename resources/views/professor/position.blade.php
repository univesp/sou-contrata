@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
    ÁREA DE INTERESSE
@endsection
@section('username')
    {{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection
@section('content')
    <div class="container">
		<ul class="nav nav-tabs">
            {{-- <li><a href="{{ route('personal-data.index') }}">Dados Pessoais</a></li> --}}
            <li class="disabled"><a href="#">Dados Pessoais</a></li>
            {{-- <li><a href="{{ route('professorAcademicData') }}">Dados Academicos</a></li> --}}
            <li class="disabled"><a href="#">Dados Academicos</a></li>
            <li class="active, link3"><a href="{{ route('professorPosition', ['id' => Session::get('vagueId')]) }}">Área de Interesse</a></li>
		</ul>
        <div class="vague-information">
            <p class="ob, cor-campo">*Obrigatório</p>
            <p>Você esta se credenciando</p>
            <p><strong>{{$data->title}}</strong></p>
            Requisitos
            <ul>
                <li>Docente nas universidades conveniadas com a Univesp</li>
                <li>Minimo: Título de Doutor</li>
            </ul>
        </div>
		<hr/>

        <form action="{{ route('professorPosition')}}" method="post">
            {{ csrf_field() }}
                <input type="hidden" name="vacancy_id" value="{{$id}}">
                <h5><strong class="left">Serviços</strong> <span class="cor-campo"> *</span></h5>
                <i id="text-negrito">Você pode se credenciar para vários serviços</i>
                <br>
                <div class="checkbox">
                        <div class="row">
                        @foreach($data->services as $services)
                                <div class="col-md-12">
                                <label>
                                    <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                </div>
                <div class="col-md-12">
                    <hr />
                    <h4>Declaração de Título de Experiência</h4>
                    <div class="checagem-radio"></div>
                    <br>
                    @foreach($result as $key => $title)
                        <h5><strong class="autoria">{{$key}}<span class="cor-campo">*</span></strong></h5>
                        <div class="checagem-radio"></div>
                        <div class="checkbox">
                            @foreach($title as $k => $criterion)
                                  <label>
                                    <input type="checkbox" name="criteria[]" id="criteria_{{$criterion['id']}}" value="{{$criterion['id']}}" onclick="return itemSelect(this)"/>{{$criterion['name']}}
                                    <div class="item-1, col-md-12 none">
                                        @foreach($criterion['type'] as $c => $type)
                                            <input type="radio" id="type_{{$type['id']}}" name="type_{{$criterion['id']}}" value="{{$type['id']}}"/><span class="alinhamento-radio">{{$type['description']}}</span>
                                        @endforeach
                                    </div>

                                  </label>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="checagem-radio"></div>
                    <div class="row">
                        <div class="float-right">
                            <button type="submit" class="btn btn-danger">AVANÇAR</button>
                        </div>
                    </div>
                    <br /><br />
                 </div>
        </form>
    </div>
@endsection
@section('scripts')
<script>
		function itemSelect(elem) {
		  var si = $(elem).val();
		  var isCheck = $(elem).is(':checked');

		  if(isCheck) {
			fadeIn($(elem).siblings());
		  } else {
			fadeOut($(elem).siblings());
		  }
		}

		function fadeIn(itemClass, itemId) {
		  $(itemClass).fadeIn();
		  $(itemId).addClass('borda');
		}

		function fadeOut(itemClass, itemId) {
		  $(itemClass).fadeOut();
		  $(itemId).removeClass('borda');
		}

        $(document).ready(function() {
            $('input:radio, input:checkbox').on('click', function(e) {
               // $(e.target).css('background', 'red');
            });
        });

</script>
@endsection
