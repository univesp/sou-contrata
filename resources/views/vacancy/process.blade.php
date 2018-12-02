@extends('layouts.header')
@section('title')
	CREDENCIAMENTO
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
	CREDENCIAMENTO
@endsection
@section('username')
{{ "Bem vindo, ". Session::get('user')['user'] }}

@endsection
@section('content')
	<div class="container">
	@if(!empty($resp))
            <h1 class="alert alert-success" role="alert">{{$resp}}</h1>
	@endif
	<ul class="nav nav-tabs">
		<li class="active, link"><a href="#">Abertos</a></li>
	</ul>
	<div class="form_dados"></div>
		<table id="example" class="table">
			<thead>
				<tr>
					<th scope="col">Curso</th>
                    <th scope="col">Disciplina</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			<tbody>
			@if(isset($data))
				@foreach($data as $d)
					<tr>
						<td>{{$d->title}}</td>
						<td>{{$d->matter}}</td>
						<td>{{$d->payload}}</td>
						<td>{{$d->offer}}</td>
						<td>{{$d->type}}</td>
						<td>
                            @if(empty($d->applications[0]->candidate_id))
                                <a href="{{ route('professorPosition', ['id' => $d->id]) }}"><button type="button"  id="botao" class="btn btn-danger">Candidatar</button></a>
                            @else
                                <a href="#"> <button type="button"  id="botaoSucess" class="btn btn-success">Inscrito</button></a>
                            @endif
                        </td>
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>
        {{ !empty($data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links()) }}
		</div>
@endsection
@section('script')
<script>
	var botao = document.querySelector('button#botao');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Candidatar');
		$('#botao').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Candidatar' : 'Remover Item';
	});
	var botao = document.querySelector('button#botao1');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Candidatar');
		$('#botao1').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Candidatar' : 'Remover Item';
	});
</script>
@endsection
