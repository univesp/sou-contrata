@extends('layouts.header')
@section('title')

@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('content')
@section('cabecalho')
	DADOS ACADÊMICOS
@endsection
@section('username')
{{ "Bem vindo ". Session::get('user')['user'] }}
@endsection
@section('content')

		<div class="container">
			<ul class="nav nav-tabs">
				{{-- <li><a href="{{ route('personal-data.index') }}">Dados pessoais</a></li> --}}
				<li class="disabled"><a href="#">Dados pessoais</a></li>
				<li class="active, link3"><a href="{{ route('professorAcademicData') }}">Dados academicos</a></li>
                {{-- <li><a href="{{ route('vagueDiscipline', ['id' => Session::get('vagueId')]) }}">Área de interesse</a></li> --}}
				<li class="disabled"><a href="#">Área de interesse</a></li>
			</ul>
			<p class="ob"><span class="cor-campo"> *</span>Obrigatório</p>
			<br />
			<form action="/academic-data" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div  class="row">
				<div class="col-md-7">
					<div  class="form-group">
						<label for="cadlettters" class="fonte-campos">Curriculo Lattes<span class="cor-campo"> *</span></label>
                        <input  type="text" class="form-control" id="cadlettters" name="cadlettters" placeholder="links para o curriculo lattes">
					</div>
				</div>
			</div>
			<br />
			<hr />
			<div class="row">
				<h3>Formação acadêmica</h3>

	    	<hr />
                {{ Session::get('user')['user'] }}
	    	<h4>Graduação</h4>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<label for="inputCursos" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" maxlength="50" id="inputCursos" name="inputCursos" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inpuInstituicao" name="inpuInstituicao" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputAnoConclusao" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>
							<input  type="date" class="form-control dataYear" id="inputDataConclusao" name="inputDataConclusao" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top:20px; margin-left:0px;">
					<div class="col-md-12">
					  <label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
						<div class="display-flex">
							<input type="file" name="file_graduate" id="file_graduate"/>
						</div>
					</div><br />
				</div>
			</div>

			<hr />
	    <div style="clear: both;"></div>
		<div class="row">
			<p class="top">Adicionar formação : <span class="cor-campo"> * | Graduação | Mestrado | Doutorado</span><button type="submit" class="btn btn-danger float-right submit">AVANÇAR</button></p>
		</div>
		<br /><br />
			</form>
		</div>
@endsection
@section('scripts')
	<script>
		$(function(){
			$(document).ready(function(){

				$(".submit").click(function(e){

				})
			});
		});
	</script>
@endsection
