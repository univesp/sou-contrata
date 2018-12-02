@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
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

        <form action="position" method="post">
            {{ csrf_field() }}

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
                <div class="col-md-12">
                <hr />
                <h4>Declaração de Título de Experiência</h4>
                      <div class="checagem-radio"></div>
                    <br>
                    <h5><strong class="autoria">Título de Mestre<span class="cor-campo">*</span></strong></h5>
                    <div class="checagem-radio"></div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="1" id="1" value="1" onclick="return itemSelect(this)"/>Área de disciplina
                        <div class="item-1, col-md-12 none">
                            <input type="radio" id="1" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
                            <input type="radio" id="2" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
                            <input type="radio" id="3" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
                            <input type="radio" id="4" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
                        </div>

                      </label>
                        <div class="checagem"></div>
                       <label>
                       <input type="checkbox" name="5" id="5" value="5" onclick="return itemSelect(this)"/>Área correlata
                        <div class="item-2, col-md-12 none">
                            <input type="radio" id="5" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
                            <input type="radio" id="6" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
                            <input type="radio" id="7" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
                            <input type="radio" id="8" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
                        </div>
                      </label>
                    </div>


                    <div class="checagem-radio"></div>
                    <div class="row">
                        <div class="float-right">
                            <button type="button" class="btn btn-danger">AVANÇAR</button>
                        </div>
                    </div>
                   <br /><br />
               </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script type="text/javascript">

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
