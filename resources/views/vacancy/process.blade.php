@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
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
					<th scope="col">Engenharia de Produção 2014</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tópicos Avançados em Eng. de Produção I</td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso I</td>
					<td>80</td>
					<td>2019.1</td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao1" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estágio Supervisionado I</td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao2" class="btn btn-danger">Aplicar</button></a></td>				
				</tr>
				<tr>
					<td>Tópicos Avançados em Eng. de Produção II</td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao3" class="btn btn-danger">Aplicar</button></a></td>				
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso II</td>
					<td>80</td>
					<td>2019.2</td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao4" class="btn btn-danger">Aplicar</button></a></td>				
				</tr>
				<tr>
					<td>Estágio Supervisionado II</td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button"  id="botao5" class="btn btn-danger">Aplicar</button></a></td>				
				</tr>
			</tbody>
		</table>
		<div class="form_dados"></div>
		<table class="table" id="example">
			<thead>
				<tr>
					<th scope="col">Engenharia de Produção 2014</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tópicos Avançados em Eng. de Produção I</td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao6" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso I</td>
					<td>80</td>
					<td>2019.1</td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao7" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estágio Supervisionado I</td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao8" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Tópicos Avançados em Eng. de Produção II</td>
					<td>20</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao9" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Trabalho de Conclusão de Curso II</td>
					<td>80</td>
					<td>2019.2</td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao10" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estágio Supervisionado II</td>
					<td>100</td>
					<td></td>
					<td>inédita</td>
					<td>Decidir oferta</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao11" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
		</table>
		<div class="form_dados"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Engenharia de Produção 2016</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Economia II</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao12" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Administração II</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao13" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Organização industrial</td>
					<td>20</td>
					<td>2019.1</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao14" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Modelagem e simulação</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao15" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador para engenharia de produção IIA</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao16" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Engenharia econômica e financeira</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao17" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Gestão da informação</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao18" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Sistemas de produção</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao19" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Gestão do conhecimento</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao20" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Gestão da informação</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao21" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador para engenharia de produção IIB</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao22" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
		</table>
		<div class="form_dados"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Engenharia de Computação 2016</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Bancos de dados</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao23" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Fundamentos matemáticos da computação</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao24" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador para engenharia de computação IIA</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao25" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Sistemas operacionais</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao26" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto digital</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao27" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Programação orientada a objetos</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao28" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Programação orientada a objetos</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao29" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Microeletrônica</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao30" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador para engenharia de computação IIB</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao31" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
		</table>
		<div class="form_dados"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Engenharias 2017.2</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Sistemas de informação</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao32" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Fenômenos de transporte</td>
					<td>40</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao33" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Ciência dos materiais</td>
					<td>40</td>
					<td>2019.1</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao34" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Administração I</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao35" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador V</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao36" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Estatística</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao37" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Resistência dos materiais</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao38" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Higiene e segurança do trabalho I</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao39" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador VI</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao40" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
		</table>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Engenharias 2018.1</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Cálculo III</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td>Refazer</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao41" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Física III</td>
					<td>80</td>
					<td>2019.1</td>
					<td>reoferta</td>
					<td>Refazer</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao42" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Ciência do Ambiente</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao43" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador III</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao44" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Métodos numéricos</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao45" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Mecânica geral</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao46" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Química</td>
					<td>40</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao47" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Economia I</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao48" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador IV</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao49" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
			</tbody>
			</table>
			<div class="form_dados"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Engenharias 2018.2</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col">Observação</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Geometria analítica e álgebra linear</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao50" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Física II</td>
					<td>80</td>
					<td>2019.1</td>
					<td>reoferta</td>
					<td>Refazer</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao51" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Sociedade e Cultura</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao52" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador I</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsável</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao53" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Cálculo II</td>
					<td>80</td>
					<td></td>
					<td>reoferta</td>
					<td>Refazer</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao54" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Programação de computadores</td>
					<td>80</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao55" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Expressão gráfica</td>
					<td>20</td>
					<td>2019.2</td>
					<td>reoferta</td>
					<td></td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao56" class="btn btn-danger">Aplicar</button></a></td>
				</tr>
				<tr>
					<td>Projeto Integrador II</td>
					<td>20</td>
					<td></td>
					<td>reoferta</td>
					<td>Verificar se Waldomiro será responsáve</td>
					<td><a href="vaga-disciplina-1"><button type="button" id="botao57" class="btn btn-danger">Aplicar</button></a></td>
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
		