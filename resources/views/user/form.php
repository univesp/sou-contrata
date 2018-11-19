<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Professores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  <div class="fonte-cabecalho">
		</div>
		<div class="container">
			<div class="formatacao-campos">
				*Obrigatório
			</div>
			<form id="form" action="usuario">
				<div class="form-group col-md-8">
					<label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
					<input id="textNome" class="form-control" type="text" name="name" required oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
			
				<div class="form-group form-group col-md-4">
					<label for="textLogin" class="control-label, fonte-campos">Login<span class="cor-campo">*</span></label>
					<input id="textLogin" class="form-control" type="text" name="login" required oninvalid="this.setCustomValidity('Digite seu Login')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
				<div class="form-group form-group col-md-4">
					<label for="textSenha" class="control-label, fonte-campos">Senha<span class="cor-campo">*</span></label>
					<input id="textSenha" class="form-control" type="password" name="password" required oninvalid="this.setCustomValidity('Digite sua Senha')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
				<div class="form-group form-group col-md-4">
					<label for="textSenha" class="control-label, fonte-campos">Email<span class="cor-campo">*</span></label>
					<input id="textSenha" class="form-control" type="Email" name="email" required oninvalid="this.setCustomValidity('Digite seu Email')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				</div>
				<div style="clear: both;"></div>
				<hr />
				<div class="row">
					<button type="submit" name="salve" class="btn btn-danger float-right">SALVAR</button></p> 
				</div>
				<br /><br />
			</form>	
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>