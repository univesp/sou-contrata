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
			<div id="msgFail"></div>
			<ul class="nav nav-tabs">
				{{-- <li><a href="{{ route('personal-data.index') }}">Dados Pessoais</a></li> --}}
				<li class="disabled"><a href="#">Dados Pessoais</a></li>
				<li class="active, link3"><a href="{{ route('academic-data.index') }}">Dados Academicos</a></li>
                {{-- <li><a href="{{ route('vagueDiscipline', ['id' => Session::get('vagueId')]) }}">Área de Interesse</a></li> --}}
				<li class="disabled"><a href="#">Área de Interesse</a></li>
			</ul>
			<p class="ob"><span class="cor-campo"> *</span>Obrigatório</p>
			<br />
			<form action="{{ route('academic-data.index') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			<div  class="row">
				<div class="col-md-7">
					<div  class="form-group">
						<label for="cadlettters" class="fonte-campos"><a href="http://buscatextual.cnpq.br/buscatextual/busca.do?metodo=apresentar" target="blank">Preencha este campo com a url do seu curriculo Latttes</a><span class="cor-campo"> *</span></label>
                <input  type="text" class="form-control" id="cadlettters" name="cadlettters" placeholder="links para o curriculo lattes">
					</div>
				</div>
			</div>
			<br />
			<hr />
			<div class="row">
				<h3>Formação Acadêmica</h3>
			<hr />
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<select name="graduations[]" class="form-control graduations">
							<option value="" selected>SELECIONE A SUA FORMAÇÃO</option>
							<option value="1">GRADUAÇÃO</option>
							<option value="2">MESTRADO</option>
							<option value="3">DOUTORADO</option>
						</select>
					</div>
				</div>
			</div>
				<div class="row">
				  <div class="col-md-7">
					<div class="col-md-6">
					   	<label class="area">Selecione a sua Área</label>
					   	<input type="hidden" name="area_id" id="area_id"/>
						<select name="graduations[]" class="form-control graduations" id="area" required>
							<option value="">Selecione a área</option>
						</select>
					</div>
					<div class="col-md-6">
						<label class="area">Selecione a sua Subárea</label>
						<select name="graduations[]" class="form-control graduations" id="subarea" required>
							<option value="">Selecione a subárea</option>
						</select>
					</div>
                  </div>
				</div>
			<br>
			<br>
			<div id="father">
				<div class="col-md-7">
					<div class="row" style="margin-top:10px;">
						<div class="col-md-12">
							<label for="inputCursos" class="fonte-campos">Curso<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control inputCursos" maxlength="50" name="inputCursos[]" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-8">
							<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-3">
							<label for="inputAnoConclusao" class="fonte-campos">Data de Conclusão<span class="cor-campo"> *</span></label>
							<input  type="date" class="form-control dataYear inputDataConclusao" name="inputDataConclusao[]" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}">
						</div>
					</div>
				</div>

				<div class="row col-md-7" style="margin-top:20px; margin-left:0px;">
					<div class="col-md-6" style="margin-top:10px;padding-left:0px;">

					  <label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
						<div class="display-flex">
							<input type="file" name="file_graduate[]" class="file_graduate" required  accept="application/pdf"/>
						</div>
					</div><br />
					<div class="col-md-1" style="margin-top:0px;">
						<button type="button" class="btn btn-success btn-sm novo">Novo</button>
					</div>
				</div>
			</div>
		</div>

			<hr />
	    <div style="clear: both;"></div>
		<div class="row">
			<p class="top">Adicionar Formação : <span class="cor-campo"> * | Graduação | Mestrado | Doutorado</span><button type="submit" class="btn btn-danger float-right submit">AVANÇAR</button></p>
		</div>
		<br /><br />
			</form>
		</div>
@endsection
@section('scripts')
	<script>
		$(function(){
			var CONTADOR = 0;
			function validateExtension(file) {
				if(file.get(0).files[0].size > 20000 || file.get(0).files[0].type != 'application/pdf') {
                    $("#msgFail").addClass('msgFail');
					$("#msgFail").append('<div class="alert alert-danger" role="alert">Arquivo Inválido ou maior que 2 Mega-byte (Mb)</div>');
                    $("#cadlettters").focus();
					$(".file_graduate").val('');
					$(".file_graduate").focus();
					$('html, body').animate({scrollTop:0}, 'slow');
				} else{
					$("#msgFail").empty();
				}
			}

			function mount_form_graduation(id) {

				var HTML = new Array();
				var codigo;

				if(!id) {
					codigo = CONTADOR;

				} else {

					codigo = id;
				}

				HTML.push('<div id="grad_' + codigo + '">');
				HTML.push('<div class="col-md-7">');
				HTML.push('<div class="row">');
				HTML.push('<div class="col-md-12">');
				HTML.push('<select name="graduations[]" class="form-control graduations graduate-select">');
				HTML.push('<option value="" selected>SELECIONE A SUA FORMAÇÃO</option>');
				HTML.push('<option value="1">GRADUAÇÃO</option>');
				HTML.push('<option value="2">MESTRADO</option>');
				HTML.push('<option value="3">DOUTORADO</option>');
				HTML.push('</select>');
				HTML.push('</div></div></div><br/>');
				HTML.push('<div class="col-md-7">');
				HTML.push('<div class="row" style="margin-top:10px;">');
				HTML.push('<div class="col-md-12">');
				HTML.push('<label for="inputCursos" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>');
				HTML.push('<input type="text" class="form-control inputCursos" maxlength="50" name="inputCursos[]" required oninvalid="this.setCustomValidity(Digite o Curso)" onchange="try{setCustomValidity("")}catch(e){}>');
				HTML.push('</div></div>');
				HTML.push('<div class="row" style="margin-top:10px;">');
				HTML.push('<div class="col-md-8">');
				HTML.push('<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>');
				HTML.push('<input type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" required oninvalid="this.setCustomValidity(Digite a Instituição)" onchange="try{setCustomValidity("")}catch(e){}>');
				HTML.push('</div></div>');
				HTML.push('<div class="row" style="margin-top:10px;">');
				HTML.push('<div class="col-md-12">');
				HTML.push('<label for="inputAnoConclusao" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>');
				HTML.push('<input type="date" class="form-control dataYear inputDataConclusao" name="inputDataConclusao[]" required oninvalid="this.setCustomValidity(Digite o Data de Conclusão)" onchange="try{setCustomValidity("")}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}>');
				HTML.push('</div></div></div>');
			    HTML.push('<div class="row col-md-7" style="margin-top:20px; margin-left:0px;">');
			    HTML.push('<div class="col-md-6" style="margin-top:10px;">');
			    HTML.push('<label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>');
			    HTML.push('<div class="display-flex">');
			    HTML.push('<input type="file" name="file_graduate[]" class="file_graduate"/>');
			    HTML.push('</div></div><br />');
			    HTML.push('<div class="col-md-3" style="margin-top:0px;">');
			    HTML.push('<button type="button" class="btn btn-success btn-sm novo" novo='+ codigo +'>Novo</button>');
			    HTML.push('<button type="button" class="btn btn-danger btn-sm remove" remove=' + codigo + '>Remover</button>');
			    HTML.push('</div></div>');

				$("#father").append(HTML.join(''));

				CONTADOR++;
			}
            function getSelectData() {
                $.ajax({
                    // Call url
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: "area",
                    type: 'get',
                    data: {
                        _token: '{{csrf_token()}}'

                    },
                    success: function (result) {
                        result = JSON.parse(result);
                        Object.keys(result).forEach(function (key) {
                            $('#area').append(`<option value="${key}">${result[key]}</option>`)
                        });
                    },
                    error: function (errors) {
                        console.log(errors)
                    }
                });
            }


			$(document).ready(function(){

				$(".file_graduate").change(function () { 
					validateExtension($(this));
				
				});

                getSelectData();
			});

			$(document).on('click', '.remove', function(){

				var id = $(this).attr('remove');

				$("#grad_" + id).remove();
			});

			$(document).on('click', '.novo', function(){

				var id = $(this).attr('novo');

				mount_form_graduation(id);

			});

            $('#area').on('change', function(e) {
				$("#area_id").val($('#area').val());
                $('#subarea').children().not(':first').remove();
                $.ajax({
                    // Call url
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: `subarea/${e.target.value}`,
                    type: 'get',
                    data: {
                        _token: '{{csrf_token()}}',
                    },
                    success: function (result) {
                        result = JSON.parse(result);
                        Object.keys(result).forEach(function (key) {
                            $('#subarea').append(`<option value="${key}">${result[key]}</option>`)
                        });
                    },

                    error: function (errors) {
                        console.log(errors)
                    }
                });
            });
		});
	</script>
@endsection
