@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')

@if(isset($data))

{{ dd($data) }}

@endif

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
				<tr>
					<td>Tópicos Avançados em Eng. de Produção I</td>
                    <td>Calculo I</td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 1]) }}"><button type="button"  id="botao" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso I</td>
                    <td>Calculo I e Fisica quantica</td>
					<td>80</td>
					<td>2019.1</td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 2]) }}"><button type="button"  id="botao1" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estágio Supervisionado I</td>
                    <td></td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 3]) }}"><button type="button"  id="botao2" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Tópicos Avançados em Eng. de Produção II</td>
                    <td></td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 4]) }}"><button type="button"  id="botao3" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso II</td>
                    <td></td>
					<td>80</td>
					<td>2019.2</td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 5]) }}"><button type="button"  id="botao4" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estágio Supervisionado II</td>
                    <td></td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td><a href="{{ route('vagueDiscipline', ['id' => 6]) }}"><button type="button"  id="botao5" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
		</table>
		</div>
@endsection
@section('script')
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

@endsection
