@extends('layouts.header')
@section('title')
	Credênciamento
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
	Credênciamento
@endsection
@section('username')
{{Session::get('user')->name}} 
@endsection

@section('content')

	<div class="container">
	@if(isset($resp))
		<h1 style="color: green;">{{"Parabéns você se candidatou com sucesso!"}}</h1>
	@endif
	<h2 class="fonte-conteudo">Credenciamento</h2>
	<ul class="nav nav-tabs">
		<li class="active, link"><a href="#">Abertos</a></li>
	</ul>
	<div class="form_dados"></div>
		<table id="example" class="table">
			<thead>
				<tr>
					<th scope="col">Curso</th>
                    <th scope="col">Matéria</th>
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
						<td><a href="{{ route('vagueDiscipline', ['id' => $d->id]) }}"><button type="button"  id="botao" class="btn btn-danger">Candidatar</button></a></td>
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>
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
