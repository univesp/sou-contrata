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
            {{-- <li><a href="{{ route('personal-data.index') }}">Dados pessoais</a></li> --}}
            <li class="disabled"><a href="#">Dados pessoais</a></li>
            {{-- <li><a href="{{ route('professorAcademicData') }}">Dados academicos</a></li> --}}
            <li class="disabled"><a href="#">Dados academicos</a></li>
            <li class="active, link3"><a href="{{ route('vagueDiscipline', ['id' => Session::get('vagueId')]) }}">Área de interesse</a></li>
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

        <form action="/vague-discipline" method="post">
            {{ csrf_field() }}
			<div class="col-md-6">

				<h5><strong class="left">Serviços</strong></h5>
                <i>Você pode se credenciar para vários serviços</i>
				<div class="checkbox" >
                 @foreach($data->services as $services)
                      <label>
                        <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}

                      </label>
                 @endforeach
				</div>
			</div>
			<div class="col-md-12">
				<hr />
				<h4>Declaração de Título e Experiência</h4>
				<div class="checagem-radio"></div>

                <?php
                $title = [] ;
                $subtitle = [] ;
                $name = [] ;
                $id = [] ;
                foreach ($vacancies as $vacancy){
                    $title[$vacancy->title] = $vacancy->title;
                    $subtitle[$vacancy->title][$vacancy->subtitle] = $vacancy->subtitle ;
                    $name[$vacancy->title][$vacancy->subtitle][$vacancy->name] = $vacancy->name;
                    $id[$vacancy->title][$vacancy->subtitle][$vacancy->name][$vacancy->vacancy_criteria[0]->criterion_id] = $vacancy->vacancy_criteria[0]->criterion_id;

                }
                ?>

                @foreach($vacancies as $vacancy)
                    <input type="hidden" name="vacancy_id" value="{{$vacancy->vacancy_criteria[0]->vacancy_id}}">
                    @if(!empty($title[$vacancy->title]))
                       <h5><strong>{{$title[$vacancy->title]}}<span class="cor-campo">*</span></strong></h5>
                     @foreach($vacancies as $v)
                       @if(!empty($subtitle[$vacancy->title][$v->subtitle]))
                            <div class="checagem-radio"></div>
                            <div class="checkbox"></div>
                            <label id="subtitle">
                                <input type="checkbox" name="vc[]" value="{{$v->vacancy_criteria[0]->id}}" onclick="return itemSelect(this)"/>{{$subtitle[$vacancy->title][$v->subtitle]}}
                                @foreach($vacancies as $r)
                                    @if(!empty($name[$vacancy->title][$v->subtitle][$r->name]))

                                        <div class="item-1, col-md-12" style="display:none">
                                            <input type="checkbox" name="criteria[]" id="{{$id[$vacancy->title][$v->subtitle][$r->name][$r->id]}}" value ="{{$id[$vacancy->title][$v->subtitle][$r->name][$r->id]}}" name="disciplina"/><span class="alinhamento-radio">{{$name[$vacancy->title][$v->subtitle][$r->name]}}</span>
                                        </div>

                                    @endif
                                    <?php
                                    $name[$vacancy->title][$v->subtitle][$r->name] = null;
                                    ?>
                                @endforeach
                            </label>
                        @endif
                           <?php
                           $subtitle[$vacancy->title][$v->subtitle] = null;
                           ?>
                    @endforeach
                    @endif
                        <?php
                        $title[$vacancy->title] = null;
                                                           ?>
                @endforeach

            <div class="row">

                <div class="float-right">
                    <button type="submit" class="btn btn-danger">AVANÇAR</button>
                </div>
            </div>
           <br /><br />
            </form>


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


	   </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
