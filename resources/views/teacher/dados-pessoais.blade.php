<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Cadastro de Professores</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	
	<body>
	
		<div class="fonte-cabecalho">
		</div>
		<div class="container">
			<ul class="nav nav-tabs">
				<li><a href="vaga-disciplina">Áreas de interesse</a></li>
				<li class="active, link3"><a href="dados-pessoais">Dados pessoais</a></li>
				<li><a href="dados-academicos">Dados Acadêmicos</a></li>
			</ul>
			<div class="formatacao-campos">
				*Obrigatório
			</div>
		
			<form id="form" action="/store">
			{{ csrf_field() }}
				<div class="form-group">
					<div class="col-md-4">
						<label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
						<input id="textNome" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label for="textSobrenome" class="control-label, fonte-campos">Sobrenome<span class="cor-campo">*</span></label>
					<input id="textSobrenome" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite seu Sobrenome')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
			</div>
			
			<div class="form-group, form-alinhamento">
				<div class="form-alinhamento_1">
					<label for="textNomeSocial" class="control-label, fonte-campos">Nome social</label>
					<input id="textNomeSocial" class="form-control" type="text">
				</div>
			</div>
		
			<div class="form-group, form-alinhamento-1">
				<div class="col-md-3">
					<label for="textDtNasc" class="control-label, fonte-campos">Data de nascimento<span class="cor-campo">*</span></label>
					<input id="textDtNasc" class="form-control" type="date" required oninvalid="this.setCustomValidity('Digite Data de Nascimento')" onchange="try{setCustomValidity('')}catch(e){}">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-3">
					<label for="sexo">Sexo:</label>
					<select class="form-control" id="sexo">
						<option>Masculino</option>
						<option>Feminino</option>
						<option>Não deseja Informar</option>
					</select>
				</div>
			</div> 
	
			<div class="form-group col-md-4">
				<label for="inputNatu" class="fonte-campos">Nacionalidade<span class="cor-campo">*</span></label>
				<select id="inputNatu" class="form-control">
					<option selected>Brasileiro(a)</option>
					<option>Extrangeiros</option>
				</select>
			</div>
			
			<div class="form-formatacao"></div>
			<div class="form-group, form-alinhamento">
				<label for="inputNomeMae" class="control-label, form-alinhamento-2">Nome da mãe<span class="cor-campo">*</span></label>
				<input id="inputNomeMae" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite o Nome da Mãe')" onchange="try{setCustomValidity('')}catch(e){}">
			</div>
			<div class="posicao-form-campos"></div>
			<div class="form-group, form-alinhamento">
				<label for="inputNomePai" class="control-label, fonte-campos">Nome do pai</label>
				<input id="inputNomePai" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite o Nome do Pai')" onchange="try{setCustomValidity('')}catch(e){}">
			</div>
			<div class="posicao-form-campos"></div>
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
					<label><input type="checkbox" id ="opcaoNao" name="opcaoDeficiencia" onclick="return Validacao();">Não</label>
				</div>
				<div class="checkbox, opcao-alinhamento">
					<label><input type="checkbox" id="opcaoSim" name="opcaoDeficiencia" onclick="return Validacao();">Sim</label>
				</div>
			</div>
			<div class="col-md-2">
				Descreva  sua deficiência
			</div>
			<div class="form-group, col-md-4">
				<label></label>
					<textarea class="form-control" rows="2" id="comentario"></textarea>
			</div>
			<div class="row">
				<h3>Documentos</h3>

				<hr />

				<h4>Documento de Indentidade</h4>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-9">	
							<label for="inputNumDocs" class="fonte-campos">Número de documento RG<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputNumDocs" required oninvalid="this.setCustomValidity('Digite o Número do RG')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}">
						</div>
					</div>
			
					<div class="row">
						<div class="col-md-5">	
							<label for="inputOrgEmissor" class="fonte-campos">Orgão emissor<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputOrgEmissor" required oninvalid="this.setCustomValidity('Digite o Orgão Emissor')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
	    	  
						<div class="col-md-5">	
							<label for="inputDataEmissao" class="fonte-campos">Data emissão<span class="cor-campo"> *</span></label>
							<input type="date" class="form-control" id="inputDataEmissao">
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="float-right">
						<div class="row">
							<h4>Versão digitalizada</h4>
								<img src="img/visao_digitalizada.jpg" class="img-responsive, cadastro-incones" alt="versao-digitalizada">
						</div>
						<div class="row">
							<img src="img/lixeira.jpg" class="img-responsive, incone-lixeira" alt="lixeira">
						</div>
					</div>
				</div>
			</div>
			
			<hr />
			
			<div class="row">	    	
				<h4>CPF</h4>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-8">	
								<label for="inputNumDoc" class="fonte-campos">Número do documento<span class="cor-campo"> *</span></label>
								<input  type="text" class="form-control" id="inputNumDoc"  required oninvalid="this.setCustomValidity('Digite o CPF completo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
							</div>
						</div>
					</div>

					<div class="col-md-5">
						<div class="float-right">
							<h4>Versão digitalizada</h4>
							<div class="row">
								<img src="img/arraste.png" class="img-responsive" alt="arraste">
							</div>
						</div>
					</div>
			</div>
			
			<hr />
		
			<div class="row">
				<h4>Titulo de eleitor</h4>
	    	
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-8">	
							<label for="inputNumDoc_1" class="fonte-campos">Número de documento<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputNumDoc_1" required oninvalid="this.setCustomValidity('Digite o Título de Eleitor')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="float-right">
						<h4>Versão digitalizada</h4>
						<div class="row">
							<img src="img/arraste.png" class="img-responsive" alt="arraste">
						</div>
					</div>	    	
				</div>
			</div>
			
		<hr />
		
		<div class="row">
	    	<h4>Certificado Militar</h4>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-8">	
						<label for="inputNumDoc_" class="fonte-campos">Número de documento<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputNumDoc_1" required oninvalid="this.setCustomValidity('Digite o Número do Certificado Militar')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
					</div>
				</div>
	    	</div>
	    	<div class="col-md-5">
				<div class="float-right">
					<h4>Versão digitalizada</h4>
						<div class="row">
							<img src="img/arraste.png" class="img-responsive" alt="arraste">
						</div>
				</div>
			</div>
		</div>
			
		<hr />
		
		<div class="row">
	    	<h4>Endereço e contato</h4>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-6">	
						<label for="inputCep" class="fonte-campos">CEP<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputCep" required oninvalid="this.setCustomValidity('Digite o Cep completo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]{5}-[0-9]{3}">
					</div>
			
					<div class="col-md-6">	
						<span class="cor-campo">Pesquisar CEP *</span>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">	
						<label for="inputTipoLogra" class="fonte-campos">Tipo logradouro<span class="cor-campo">*</span></label>
						<select id="inputTipoLogra" class="form-control">
							<option>Avenida</option>
							<option>Rua</option>
						</select>
					</div>
	    	  
					<div class="col-md-9">	
						<label for="inputLogradouro" class="fonte-campos">Lougradouro<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputLogradouro" required oninvalid="this.setCustomValidity('Digite o Lougradouro')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">	
						<label for="inputNum" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputNum" required oninvalid="this.setCustomValidity('Digite Somente Número')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
					</div>
	    	  
					<div class="col-md-4">	
						<label for="inputComplemento" class="fonte-campos">Complemento<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputComplemento" required oninvalid="this.setCustomValidity('Digite o Complemento')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
				
					<div class="col-md-5">	
						<label for="inputBairro" class="fonte-campos">Bairro<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputBairro" required oninvalid="this.setCustomValidity('Digite o Bairro')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
				
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">	
						<label for="inputUF" class="fonte-campos">UF<span class="cor-campo">*</span></label>
						<select id="inputUF" class="form-control">
							<option>SP</option>
							<option>RJ</option>
						</select>
					</div>
	    	  
					<div class="col-md-9">	
						<label for="inputCidade" class="fonte-campos">Cidade<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputCidade" required oninvalid="this.setCustomValidity('Digite a Cidade')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
	    	<h4>Telefone</h4>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">	
						<label for="inputTipo" class="fonte-campos">Tipo<span class="cor-campo">*</span></label>
						<select id="inputTipo" class="form-control">
							<option>11</option>
							<option>21</option>
						</select>
					</div>
					<div class="col-md-2">	
						<label for="inputPrefixo" class="fonte-campos">Prefixo<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputPrefixo" required oninvalid="this.setCustomValidity('Digite o Prefixo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
					</div>
					<div class="col-md-8">	
						<label for="inputNum_1" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputNum_1" required oninvalid="this.setCustomValidity('Digite o número de telefone')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]{4}-[0-9]{4}" >
							<span class="cor-campo">Adicionar outro telefone</span>
					</div>
				</div>
			</div>
<!-- 			
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">	
						<label for="inputEmail" class="fonte-campos">E-mail<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputEmail" required oninvalid="this.setCustomValidity('Digite o E-mail')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</div>
	    	  
					<div class="col-md-6">	
						<label for="inputConfirmarEmail" class="fonte-campos">Confirmar e-mail<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputConfirmarEmail" required oninvalid="this.setCustomValidity('Confirme o E-mail')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</div>
				</div>
			</div> -->
			<!-- <div class="col-md-12">
				<div class="row">
					<div class="col-md-6">	
						<label for="inputUsuario" class="fonte-campos">Usuário<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputUsuario" required oninvalid="this.setCustomValidity('Digite o Usuário')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
	    	  
					<div class="col-md-6">	
						<label for="inputSenha" class="fonte-campos">Senha<span class="cor-campo"> *</span></label>
						<input  type="text" class="form-control" id="inputSenha" required oninvalid="this.setCustomValidity('Digite a Senha')" onchange="try{setCustomValidity('')}catch(e){}">
					</div>
				</div>
			</div> -->
		</div>
		
	    <hr />

		<div style="clear: both;"></div>
			<div class="row">
				<button id="addSubmit" type="submit" class="btn btn-danger float-right">AVANÇAR</button></p> 
			</div>
			<br /><br />
    </div>	
	</form>
	
	<script type="text/javascript"> 

		/* Validação de checkedbox deficiencia */
		function Validacao()  
		{  
			var checkboxes = document.getElementsByName("opcaoDeficiencia");  
			var numberOfCheckedItems = 0;  
        for(var i = 0; i < checkboxes.length; i++)  
        {
			if(checkboxes[i].checked)  
				numberOfCheckedItems++;
		}
        if(numberOfCheckedItems > 1)  
        {  
                alert("Selecione somente uma opção");  
                return false;  
        }  
		
		}
	  
	</script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<script>
         jQuery(document).ready(function () {
             jQuery('#addSubmit').click(function (e) {
                 e.preventDefault();
                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     }
                 });
                 jQuery.ajax({
                     url: "{{ url('/store') }}",
                     method: 'post',
                     data: {
						_token: '{{csrf_token()}}',
                         name: jQuery('#textNome').val(),
                         last_name: jQuery('#textSobrenome').val(),
						 date_birth: jQuery('#textDtNasc').val(),
						 genre: jQuery('#sexo').val(),
						 marital_status: jQuery('#inputEstadoCivil').val(),
						 cpf: jQuery('#inputNumDoc').val(),
						 flag_deficient: jQuery('#').val(),
						 obs_deficient: jQuery('#comentario').val(),
						 name_mather: jQuery('#inputNomeMae').val(),
						 name_father: jQuery('#inputNomePai').val(),
						 name_social: jQuery('#textNomeSocial').val(),
						 nationality: jQuery('#inputNatu').val()
                     },
                     success: function (result) {
                         console.log(result);
                     }
                 });
             });
         });
	</script>
  </body>
</html>