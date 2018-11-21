@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
	<div class="fonte-cabecalho"></div>
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
        <div class="col-md-11">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
                        <input id="textNome" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="col-md-3">
                        <label for="textSobrenome" class="control-label, fonte-campos">Sobrenome<span class="cor-campo">*</span></label>
                        <input id="textSobrenome" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite seu Sobrenome')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="col-md-2">
                        <label for="textDtNasc" class="control-label, fonte-campos">Data de nascimento<span class="cor-campo">*</span></label>
                        <input id="textDtNasc" class="form-control" type="date" required oninvalid="this.setCustomValidity('Digite Data de Nascimento')" onchange="try{setCustomValidity('')}catch(e){}" <input id="textDtNasc" class="form-control" type="date" required="" oninvalid="this.setCustomValidity('Digite Data de Nascimento')" onchange="try{setCustomValidity('')}catch(e){}" style="padding: 0;">
                    </div>
                    <div class="col-md-2">
                        <label for="inputNatu" class="fonte-campos">Nacionalidade<span class="cor-campo">*</span></label>
                        <select id="inputNatu" class="form-control">
                            <option selected>Brasileiro(a)</option>
                            <option>Extrangeiros</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="fonte-campos" for="sexo">Sexo:</label>
                            <select class="form-control" id="sexo">
                                <option>Masculino</option>
                                <option>Feminino</option>
                                <option>Não deseja Informar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="textNomeSocial" class="control-label, fonte-campos">Nome social</label>
                            <input id="textNomeSocial" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="inputEstadoCivil" class="fonte-campos">Estado civil<span class="cor-campo">*</span></label>
                                <select id="inputEstadoCivil" class="form-control">
                                    <option>Solteiro</option>
                                    <option>Casado</option>
                                    <option>Divorsiado</option>
                                    <option>Viúvo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="inputNomeMae" class="control-label fonte-campos">Nome da mãe<span class="cor-campo">*</span></label>
                            <input id="inputNomeMae" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite o Nome da Mãe')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputNomePai" class="control-label fonte-campos">Nome do pai</label>
                            <input id="inputNomePai" class="form-control" type="text" required oninvalid="this.setCustomValidity('Digite o Nome do Pai')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        Possui Alguma Deficiência?
                        <!-- <div class="checkbox, opcao-alinhamento">
                            <label><input type="checkbox" id ="opcaoNao" name="opcaoDeficiencia" onclick="return Validacao();">Não</label>
                        </div> -->
                        <div class="checkbox">
                            <label>
                                <!-- <input type="hidden" id="opcaoSim" name="opcaoDeficiencia" value="0" onclick="return Validacao();"> -->
                                <input type="checkbox" id="opcaoSim" name="opcaoDeficiencia" onclick="return Validacao();">Sim
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="comentario" class="control-label fonte-campos deficiencia" style="display: none;">
                                Descreva  sua deficiência
                            </label>
                            <textarea class="form-control deficiencia" rows="2" id="comentario" style="display: none;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h3>Documentos</h3>
                            <hr />
                            <h4>Documento de Indentidade</h4>
                        </div>
                        <div class="col-md-3">
                            <label for="inputNumDocs" class="fonte-campos">Número de documento RG<span class="cor-campo"> *</span></label>
                            <input  type="text" class="form-control" id="inputNumDocs" required oninvalid="this.setCustomValidity('Digite o Número do RG')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}">
                        </div>
                        <div class="col-md-2">
                            <label for="inputOrgEmissor" class="fonte-campos">Orgão emissor<span class="cor-campo"> *</span></label>
                            <input  type="text" class="form-control" id="inputOrgEmissor" required oninvalid="this.setCustomValidity('Digite o Orgão Emissor')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                        <div class="col-md-2">
                            <label for="inputDataEmissao" class="fonte-campos">Data emissão<span class="cor-campo"> *</span></label>
                            <input type="date" class="form-control" id="inputDataEmissao" style="padding: 0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>CPF</h4>
                        </div>
                            <div class="col-md-4">
                                <label for="inputNumDoc" class="fonte-campos">Número do documento<span class="cor-campo"> *</span></label>
                                <input  type="text" class="form-control" id="inputNumDoc"  required oninvalid="this.setCustomValidity('Digite o CPF completo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                            </div>
                            <div class="col-md-3">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/arraste.png" id="arraste" class="img-responsive" alt="arraste">
                            </div>
                            <div class="col-md-2">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/visao_digitalizada.jpg" class="img-responsive" alt="versao-digitalizada">
                            </div>
                            <div class="col-md-2">
                                <img src="img/lixeira.jpg" class="img-responsive img-lixeira" alt="lixeira">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Titulo de eleitor</h4>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumDoc_1" class="fonte-campos">Número de documento<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputNumDoc_1" required oninvalid="this.setCustomValidity('Digite o Título de Eleitor')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
                            </div>
                            <div class="col-md-3">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/arraste.png" id="arraste" class="img-responsive" alt="arraste">
                            </div>
                            <div class="col-md-2">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/visao_digitalizada.jpg" class="img-responsive" alt="versao-digitalizada">
                            </div>
                            <div class="col-md-2">
                                <img src="img/lixeira.jpg" class="img-responsive, incone-lixeira" alt="lixeira">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Certificado Militar</h4>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumDoc_" class="fonte-campos">Número de documento<span class="cor-campo"> *</span></label>
                                <input  type="text" class="form-control" id="inputNumDoc_1" required oninvalid="this.setCustomValidity('Digite o Número do Certificado Militar')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
                            </div>
                            <div class="col-md-3">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/arraste.png" id="arraste" class="img-responsive" alt="arraste">
                            </div>
                            <div class="col-md-2">
                                <label for="arraste" class="fonte-campos">Versão digitalizada</label>
                                <img src="img/visao_digitalizada.jpg" class="img-responsive" alt="versao-digitalizada">
                            </div>
                            <div class="col-md-2">
                                <img src="img/lixeira.jpg" class="img-responsive, incone-lixeira" alt="lixeira">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Endereço e contato</h4>
                            <hr />
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="inputCep" class="fonte-campos">CEP<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputCep" required oninvalid="this.setCustomValidity('Digite o Cep completo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]{5}-[0-9]{3}">
                                    <span class="cor-campo">Pesquisar CEP *</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="inputTipoLogra" class="fonte-campos">Tipo logradouro<span class="cor-campo">*</span></label>
                                    <select id="inputTipoLogra" class="form-control">
                                        <option>Avenida</option>
                                        <option>Rua</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLogradouro" class="fonte-campos">Lougradouro<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputLogradouro" required oninvalid="this.setCustomValidity('Digite o Lougradouro')" onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputNum" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputNum" required oninvalid="this.setCustomValidity('Digite Somente Número')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label for="inputComplemento" class="fonte-campos">Complemento<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputComplemento" required oninvalid="this.setCustomValidity('Digite o Complemento')" onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputBairro" class="fonte-campos">Bairro<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputBairro" required oninvalid="this.setCustomValidity('Digite o Bairro')" onchange="try{setCustomValidity('')}catch(e){}" style="width: 316px;">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputUF" class="fonte-campos">UF<span class="cor-campo">*</span></label>
                                    <select id="inputUF" class="form-control">
                                        <option>SP</option>
                                        <option>RJ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <label for="inputCidade" class="fonte-campos">Cidade<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control" id="inputCidade" required oninvalid="this.setCustomValidity('Digite a Cidade')" onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Telefone</h4>
                            <hr />
                        </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label for="inputTipo" class="fonte-campos">Tipo<span class="cor-campo">*</span></label>
                                        <select id="inputTipo" class="form-control">
                                            <option>11</option>
                                            <option>21</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="inputPrefixo" class="fonte-campos">Prefixo<span class="cor-campo"> *</span></label>
                                        <input  type="text" class="form-control" id="inputPrefixo" required oninvalid="this.setCustomValidity('Digite o Prefixo')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputNum_1" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
                                        <input  type="text" class="form-control" id="inputNum_1" required oninvalid="this.setCustomValidity('Digite o número de telefone')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]{4}-[0-9]{4}" >
                                        <span class="cor-campo">Adicionar outro telefone</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
			<hr />
			<button id="addSubmit" type="submit" class="btn btn-danger float-right">AVANÇAR</button>
		</div>
		<div class="row">
			<div class="row">
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
        </div>
		</form>
@endsection
@section('scripts')
	<script src="{{URL::asset('js/dados-pessoais.js')}}"></script>
@endsection
