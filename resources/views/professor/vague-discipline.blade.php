
  @extends('layouts.header')
  @section('title')
      Cadastro de Professores
  @endsection
  @section('css')
      <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
      <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
  @endsection
  @section('content')
	
	<div class="fonte-cabecalho"></div>
	
    <div class="container">
		<ul class="nav nav-tabs">
			<li class="active, link3"><a href="vaga-disciplina">Áreas de Interesse</a></li>
			<li><a href="dados-pessoais">Dados pessoais</a></li>
			<li><a href="dados-academicos">Dados Acadêmicos</a></li>
		</ul>
		<p class="ob, cor-campo">*Obrigatório</p>
		<p>Você esta credenciando como docente para:</p>
		<h2>{{$data->matter}}</h2>
		Requisitos
		<ul>
			<li>Docente nas universidades conveniadas com a Univesp</li>
			<li>Minimo: Título de Doutor</li>
		</ul>
		<hr/>

		<form>
			<div class="col-md-6">

				<h5><strong class="left">Autoria</strong></h5>

				<div class="checkbox">
                    @foreach($data->services as $d)
                      <label>
                        <input type="checkbox" value=" {{$d->id}}">
                        {{$d->title}}
                      </label>
                    @endforeach
				</div>
			</div>
			<div class="col-md-12">
				<hr />
				<h4>Declaração de Título de Experiência</h4>
				<div class="checagem-radio"></div>

                <?php
                $title_before = null;
                $subtitle_before = null;
                $result = [];
                $result2 = [];
                $result3 = [];
                $result4 = [];
                foreach ($data->vacancy_criteria as $d){
                    if(empty($result[$d->title]) || !in_array($d->title,$result)){
                        $result[$d->title] = $d->title;
                    }
                    $result2[$d->title][$d->subtitle] = $d->subtitle;
                    $result3[$d->title][$d->subtitle][] = $d->name;
                    $result4[$d->title][$d->subtitle][$d->id][$d->name] = $d->pivot->criterion_id;
                }
           ?>
                @foreach($data->criteria as $d)
                    @if($d->title != $title_before)
                        <h5><strong>{{ $result[$d->title]}}<span class="cor-campo">*</span></strong></h5>
                    @endif
                        @if($d->subtitle != $subtitle_before)
                            <div class="checagem-radio"></div>
                            <div class="checkbox"></div>
                        @endif

                        @if($d->subtitle != $subtitle_before)
                            <label>
                                <input type="checkbox" name="1" id="{{$d->pivot->criterion_id}}" value="1" onclick="return itemSelect(this)"/>{{$result2[$d->title][$d->subtitle]}}
                                @foreach($result3[$d->title][$d->subtitle] as $e)
                                    <?php
                                    print_r($result4[$d->title][$d->subtitle][$d->id][$d->name]);
                                    ?>
                                <div class="item-1, col-md-12" style="display:none">
                                        <input type="radio" id="{{$d->pivot->criterion_id}}" value ="{{$d->id}}" name="disciplina"/><span class="alinhamento-radio">{{$e}}</span>

                                </div>
                                @endforeach
                            </label>
                        @endif


                  <?php
                    $title_before = $d->title;
                    $subtitle_before = $d->subtitle;
                   ?>
                @endforeach
                <?php
                print_r($data->criterion_id);

                ?>
            <div class="checagem-radio"></div>
            <div class="row">
                <div class="float-right">
                    <p><a class="ob, cor-campo" href="processos-seletivos">Adicionar outra disciplina</a></p>
                </div>
            </div>
            <div class="row">
                <div class="float-right">
                    <button type="button" class="btn btn-danger">AVANÇAR</button>
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
