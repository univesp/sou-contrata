<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
		
		<!-- <form action="processos-seletivos"> -->
		<form action="/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
				<label for="name">Nome Completo:</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>
			
			<div class="form-group">
				<label for="rg">RG:</label>
				<input type="text" class="form-control" id="rg" name="rg">
			</div>
			
			<div class="form-group">
				<label for="cpf">CPF:</label>
				<input type="text" class="form-control" id="cpf" name="cpf">
			</div>
			
			<div class="form-group">
				<label for="email">E-mail:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
		  
			<div class="form-group">
				<label for="curriculum">Curriculum Letters</label>
				<input type="text" class="form-control" id="curriculum" name="curriculum" placeholder="http://lattes.cnpq.br/650934850395" value="">
			</div>
			<div class="formatacao_doc">
				Documentação
			</div>
			<div id="upload-files"></div>
			
			<!--<img src="img/imagem-rodape.jpg" class="img-responsive, formatacao-rodape" alt="img-rodape"/>-->
			<div class="botao-posicao-form">
			<button type="submit" class="btn btn-danger" id="btn">Enviar</button>
			</div>
		</form> 
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<script>
		
		$(function() {
			
			$(document).ready(function() {
				
				$('.formatacao_doc').on('dragover', function(event) {
					event.preventDefault();
					event.stopPropagation();
					$(this).addClass('formatacao_doc-hover ');
				});
				
				$('.formatacao_doc').on('dragleave', function(event) {
					event.preventDefault();
					event.stopPropagation();
					$(this).removeClass('formatacao_doc-hover ');
				});
				
				$('.formatacao_doc').on('drop', function(event) {
					event.preventDefault();
					event.stopPropagation();
					$(this).removeClass('formatacao_doc-hover ');
					var data = new FormData();
					var files = event.originalEvent.dataTransfer.files;
					for(var i=0; i < files.length; i++) {
						data.append('file[]', files[i]);
					}	

					$.ajax({
						 headers: {
      					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    					},
						url: '/documents',
						type: 'post',
						data: data,
						contentType:false,
						cache: false,
						processData:false,
						success: function(result) {

							$("#upload-files").html(result);
						}
					});
				});
			});
		})
	</script>
  </body>
</html>