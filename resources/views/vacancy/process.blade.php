@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
	{{-- dd($vague) --}}
	<div class="container">
	<h2 class="fonte-conteudo">Processos Seletivos</h2>
	<ul class="nav nav-tabs">
		<li class="active, link"><a href="#">Abertos</a></li>
		<li><a class="link-2" href="#">Vigentes</a></li>
		<li><a class="link-2" href="#">Arquivados</a></li>
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
			@foreach($vague as $d)
				<tr>
					<td>{{$d->title}}</td>
                    <td>{{$d->matter}}</td>
					<td></td>
					<td></td>
					<td>{{$d->type}}</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => $d->id]) }}"><button type="button"  id="botao" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
@endsection
@section('script')
<script>
	var botao = document.querySelector('button#botao');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Aplicar');
		$('#botao').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Aplicar' : 'Remover Item';
	});
	var botao = document.querySelector('button#botao1');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Aplicar');
		$('#botao1').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Aplicar' : 'Remover Item';
	});
</script>
@endsection
