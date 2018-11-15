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
		<ul class="nav nav-tabs">
			<li><a href="vaga-disciplina">Áreas de Interesse</a></li>
			<li class="active, link3"><a href="dados-pessoais">Dados Pessoais</a></li>
			<li><a href="dados-academicos">Dados Acadêmicos</a></li>
			<li><a href="#">Conferir dados</a></li>
		</ul>
		<div class="formatacao-campos">
			*Obrigatório
		</div>
		
		<form id="form">
			<div class="form-group">
				<div class="col-md-4">
					<label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
					<input id="textNome" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label for="textSobrenome" class="control-label, fonte-campos">Sobrenome<span class="cor-campo">*</span></label>
					<input id="textSobrenome" class="form-control" type="text">
				</div>
			</div>
			<div class="form-linha"></div>
			<div class="form-check, form-input">
				<input class="form-check-input" type="radio" name="radio" id="radio" value="option">
					<label class="form-check-label" for="radio">
					<span class="fonte-campos">Desejo utilizar nome razão social</span>
					</label>
			</div>
			<div class="form-group, form-alinhamento">
				<label for="textNomeSocial" class="control-label, fonte-campos">Nome social<span class="cor-campo">*</span></label>
				<input id="textNomeSocial" class="form-control" type="text">
			</div>
			<div class="form-group, form-alinhamento-1">
				<div class="col-md-3">
					<label for="textDtNasc" class="control-label, fonte-campos">Data de nascimento<span class="cor-campo">*</span></label>
					<input id="textDtNasc" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="inputSexo" class="control-label, fonte-campos">Sexo<span class="cor-campo">*</span></label>
					<input id="inputSexo" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="inputNatu" class="fonte-campos">Naturalidade<span class="cor-campo">*</span></label>
					<select id="inputNatu" class="form-control">
					<option selected>Brasileira</option>
					<option>Chilena</option>
					<option>Americana</option>
					<option>Chinesa</option>
				</select>
			</div>
			<div class="form-formatacao"></div>
			<div class="form-group, form-alinhamento">
				<label for="inputNomeMae" class="control-label, form-alinhamento-2">Nome da mãe<span class="cor-campo">*</span></label>
				<input id="inputNomeMae" class="form-control" type="text">
			</div>
			<div class="form-group, form-alinhamento">
				<label for="inputNomePai" class="control-label, fonte-campos">Nome do pai</label>
				<input id="inputNomePai" class="form-control" type="text">
			</div>
			<div class="form-group col-md-5">
				<label for="inputEstadoCivil" class="fonte-campos">Estado civil<span class="cor-campo">*</span></label>
					<select id="inputEstadoCivil" class="form-control">
					<option>Solteiro</option>
					<option>Casado</option>
					<option>Divorsiado</option>
					<option>Viúvo</option>
				</select>
			</div>
			<div class="form-checkbox"></div>
			<div class="alinhamento-check, col-md-6">
				Possui Alguma Deficiência?
				<div class="checkbox, opcao-alinhamento">
					<label><input type="checkbox" id ="opcaoNao">Não</label>
				</div>
				<div class="checkbox, opcao-alinhamento">
					<label><input type="checkbox" id="opcaoSim">Sim</label>
				</div>
			</div>
			<div class="col-md-2">
				Descreva  sua deficiência
			</div>
			<div class="form-group, col-md-4">
			<label></label>
				<textarea class="form-control" rows="2" id="comentario"></textarea>
			</div> 
			Documentos
			<hr />
			<div class="form-group, form-alinhamento, col-md-4">
				<label for="inputDocs" class="control-label, fonte-campos">Documentos de Indentidade<span class="cor-campo">*</span></label>
				<input id="inputDocs" class="form-control" type="text">
			</div>
			<div class="col-md-8, formatacao_doc">
				Visão Digitalizada
				<img src="img/visao_digitalizada.jpg" class="img-responsive" alt="visao_digitalizada"/>
			</div>
			<div class="form-group, col-md-3">
				<label for="inputOrgEmissor" class="control-label, fonte-campos">Orgão Emissor<span class="cor-campo">*</span></label>
				<input id="inputOrgEmissor" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-3">
				<label for="inputDataEmissao" class="control-label, fonte-campos">Data Emissão<span class="cor-campo">*</span></label>
				<input id="inputDataEmissao" class="form-control" type="text">
			</div>
			<div class="col-md-6, formatacao_doc">
				<img src="img/lixeira.jpg" alt="lixo" class="img-responsive" />
			</div>
			<p>
			<hr />
			CPF<br />
			<div class="form-group, col-md-4">
				<label for="inputCPF" class="control-label, fonte-campos">Número do documento<span class="cor-campo">*</span></label>
				<input id="inputCPF" class="form-control" type="text">
			</div>
			<div class="col-md-8, formatacao_doc">
				Visão Digitalizada
				<img src="img/inform-formulario.jpg" class="img-responsive" alt="inform-formulario"/>
			</div>
			<hr />
			Título de Eleitor<br />
			<div class="form-group, col-md-4">
				<label for="inputTituloEleitor" class="control-label, fonte-campos">Título de Eleitor<span class="cor-campo">*</span></label>
				<input id="inputTituloEleitor" class="form-control" type="text">
			</div>
			<div class="col-md-8, formatacao_doc">
				Visão Digitalizada
				<img src="img/inform-formulario.jpg" class="img-responsive" alt="inform-formulario"/>
			</div>
			<hr />
			Certificado Militar<br />
			<div class="form-group, col-md-4">
				<label for="inputNumDoc" class="control-label, fonte-campos">Número Documento<span class="cor-campo">*</span></label>
				<input id="inputNumDoc" class="form-control" type="text">
			</div>
			<div class="col-md-8, formatacao_doc">
				Visão Digitalizada
				<img src="img/inform-formulario.jpg" class="img-responsive" alt="inform-formulario"/>
			</div>
			<hr />
			Endereço Contato<br />
			<div class="form-group">
				<label for="inputTituloEleitor" class="control-label, fonte-campos">CEP<span class="cor-campo">*</span></label>
				<input id="inputTituloEleitor" class="form-control" type="text"><span class="cor-campo">Pesquisar CEP</span>
				
			</div>
			<div class="form-group, col-md-3">
				<label for="inputTipoLog" class="fonte-campos">Tipo Lougradouro<span class="cor-campo">*</span></label>
					<select id="inputTipoLog" class="form-control">
					<option></option>
				</select>
			</div>
			<div class="form-group, col-md-9">
				<label for="inputLog" class="control-label, fonte-campos">Lougradouro<span class="cor-campo">*</span></label>
				<input id="inputLog" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-4">
				<label for="inputNum" class="control-label, fonte-campos">Número<span class="cor-campo">*</span></label>
				<input id="inputNum" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-4">
				<label for="inputComp" class="control-label, fonte-campos">Complemento<span class="cor-campo">*</span></label>
				<input id="inputComp" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-4">
				<label for="inputBairro" class="control-label, fonte-campos">Bairro<span class="cor-campo">*</span></label>
				<input id="inputBairro" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-3">
				<label for="inputUF" class="fonte-campos">UF<span class="cor-campo">*</span></label>
					<select id="inputUF" class="form-control">
					<option>SP</option>
					<option>RJ</option>
				</select>
			</div>
			<div class="form-group, col-md-9">
				<label for="inputCidade" class="fonte-campos">Cidade<span class="cor-campo">*</span></label>
					<select id="inputCidade" class="form-control">
					<option>São Paulo</option>
					<option>Rio de Janeiro</option>
				</select>
			</div>
			Telefone<br />
			<div class="form-group, col-md-4">
				<label for="inputTipo" class="fonte-campos">Tipo<span class="cor-campo">*</span></label>
					<select id="inputTipo" class="form-control">
					<option></option>
				</select>
			</div>
			<div class="form-group, col-md-4">
				<label for="inputPrefixo" class="control-label, fonte-campos">Prefixo<span class="cor-campo">*</span></label>
				<input id="inputPrefixo" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-4">
				<label for="inputNumero" class="control-label, fonte-campos">Número<span class="cor-campo">*</span></label>
				<input id="inputNumero" class="form-control" type="text"><span class="cor-campo">Adiocionar outro telefone</span>
			</div>
			<div class="form-group, col-md-4">
				<label for="inputEmail" class="control-label, fonte-campos">E-mail<span class="cor-campo">*</span></label>
				<input id="inputEmail" class="form-control" type="text">
			</div>
			<div class="form-group, col-md-4">
				<label for="inputConfEmail" class="control-label, fonte-campos">Confirma e-mail<span class="cor-campo">*</span></label>
				<input id="inputConfEmail" class="form-control" type="text">
			</div>
			<div class="botao-form"></div>
			<button type="submit" class="btn btn-danger" id="botao-submit">Enviar</button>
		</form>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>