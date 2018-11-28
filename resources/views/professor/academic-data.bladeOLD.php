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
{{ "Bem vindo, ". Session::get('user')['user'] }}
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
						<!--
						<div class="col-md-5">
							<label for="inputSituacao" class="fonte-campos">Situação<span class="cor-campo"> *</span></label>
							<select id="inputSituacao" class="form-control" name="inputSituacao">
								<option value="1" selected>Concluido</option>
								<option value="0">Incompleto</option>
							</select>
						</div>-->
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
							<!--<img src="img/arraste.png" class="img-responsive">
							<img src="img/lixeira.jpg" class="img-responsive img-lixeira">-->
						</div>
					</div><br />
				</div>
			</div>

			<hr />

			<div class="row">
				<h4>Mestrado</h4>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">
								<label for="inputArea" class="fonte-campos">Área<span class="cor-campo"> *</span></label>
								<input type="text" class="form-control" maxlength="50" id="inputArea" name="inputArea" required oninvalid="this.setCustomValidity('Digite a Área')" onchange="try{setCustomValidity('')}catch(e){}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label for="inputInstiucao_1" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
								<input  type="text" class="form-control" id="inputInstiucao_1" name="inputInstiucao_1" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
							</div>
						</div>
						<div class="row">
							<!--<div class="col-md-5">
								<label for="inputSituacao_1" class="fonte-campos">Situação<span class="cor-campo"> *</span></label
								<select id="inputSituacao_1" class="form-control" name="inputSituacao_1"
									<option value="0" selected>Em andamento</option>
									<option value="1">Concluido</option>
								</select>
							</div>-->
							<div class="col-md-3">
								<label for="inputAnoConclusao_1" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>
								<input  type="date" class="form-control dataYear" id="inputAnoConclusao_1" name="inputAnoConclusao_1" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}">
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:20px; margin-left:0px;">
						<div class="col-md-12">	 
						<label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
							<div class="display-flex">
								<input type="file" name="file_master" id="file_master"/>
								<!--<img src="img/arraste.png" class="img-responsive">
								<img src="img/lixeira.jpg" class="img-responsive img-lixeira">-->
							</div>
						</div><br />
					</div>

			</div>

			<hr />

			<div class="row">
				<h4>Doutorado</h4>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">
							<label for="inputCursos_2" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>
							<input type="text" class="form-control" imaxlength="50" id="inputCursos_2" name="inputCursos_2" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inputInstiucao_2" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
							<input type="text" class="form-control" id="inputInstiucao_2" name="inputInstiucao_2" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<!--<div class="col-md-5">
							<label for="inputSituacao_2 class="fonte-campos">Situação<span class="cor-campo"> *</span></label>
							<select id="inputSituacao_2" class="form-control" name="inputSituacao_2">
								<option value="1" selected>Concluido</option>
								<option value="0">Incompleto</option>
							</select>
						</div>-->
						<div class="col-md-3">
							<label for="inputAnoConclusao_2" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>
							<input  type="date" class="form-control dataYear" id="inputAnoConclusao_2" name="inputAnoConclusao_2" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}">
						</div>
					</div>
				</div>

				<div class="row" style="margin-top:20px; margin-left:0px;">
					<div class="col-md-12">	 
					  <label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
						<div class="display-flex">
							<input type="file" name="file_doctorate" id="file_doctorate"/>
							<!--<img src="img/arraste.png" class="img-responsive">
							<img src="img/lixeira.jpg" class="img-responsive img-lixeira">-->
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
