<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Inscrição</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
	<div class="cabecalho">
		<div class="container">
			<span class="font-cabecalho1">Processo Seletivo 2019</span><br />
			<span class="font-cabecalho2">Professores Autor de Conteúdo</span>
			<button type="button" class="btn btn-info">Aberto</button>
		</div>
	</div>
	<div class="container">
		<a  class="link-conteudo" href="index.html">< Voltar</a>
		<h2 class="fonte-conteudo">Formulário de Inscrição</h2>
		
		<form action="processos-seletivos">
			<div class="form-group">
				<label for="nome">Nome Completo:</label>
				<input type="nome" class="form-control" id="nome">
			</div>
			
			<div class="form-group">
				<label for="rg">RG:</label>
				<input type="rg" class="form-control" id="rg">
			</div>
			
			<div class="form-group">
				<label for="cpf">CPF:</label>
				<input type="cpf" class="form-control" id="cpf">
			</div>
			
			<div class="form-group">
				<label for="email">E-mail:</label>
				<input type="email" class="form-control" id="email">
			</div>
		  
			<div class="form-group">
				<label for="curriculum">Curriculum Letters</label>
				<input type="curriculum" class="form-control, fundo-label" id="curriculum" value="http://lattes.cnpq.br/650934850395">
			</div>
			<div class="formatacao_doc">
				Documentação
			</div>
			<img src="img/imagem-rodape.jpg" class="img-responsive, formatacao-rodape" alt="img-rodape"/>
			<div class="botao-posicao-form">
			<a href="processos-seletivos"><button type="submit" class="btn btn-danger">Enviar</button></a>
			</div>
		</form> 
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>