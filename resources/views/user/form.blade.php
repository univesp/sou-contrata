@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
	<body>
		<div class="fonte-cabecalho">
			</div>
			<div class="container">
				<div class="formatacao-campos">
					*Obrigatório
				</div>
				<form action="/store" method="post">
					{{ csrf_field() }}
					<div class="form-group col-md-6" style="padding-left: -5;padding-left: 10px;">
						<label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
						<input id="textNome" class="form-control" type="text" name="name" required oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
					<div style="clear: both;"></div>
					<div class="form-group form-group col-md-3" style="padding-right: 0px;">
						<label for="textLogin" class="control-label, fonte-campos">Login<span class="cor-campo">*</span></label>
						<input id="textLogin" class="form-control" type="text" name="login" required oninvalid="this.setCustomValidity('Digite seu Login')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
					<div class="form-group form-group col-md-3" style="padding-left: 10px;">
						<label for="textSenha" class="control-label, fonte-campos">Senha<span class="cor-campo">*</span></label>
						<input id="textSenha" class="form-control" type="password" name="password" required oninvalid="this.setCustomValidity('Digite sua Senha')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
					<div style="clear: both;"></div>
					<div class="form-group form-group col-md-6" style="padding-right: 12px;width: 541px;">
						<label for="textSenha" class="control-label, fonte-campos">Email<span class="cor-campo">*</span></label>
						<input id="textSenha" class="form-control" type="Email" name="email" style="width: 539px;" required oninvalid="this.setCustomValidity('Digite seu Email')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</div>
					<div style="clear: both;"></div>
					<hr />
					<div class="row">
						<button type="submit" name="salve" class="btn btn-danger float-right">SALVAR</button></p> 
					</div>
					<br /><br />
				</form>	
			</div>
@endsection
