@extends('layouts.header')

@section('title')
    DADOS PESSOAIS
@endsection

@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('content')
    @section('cabecalho')
        DADOS PESSOAIS
    @endsection

    @section('username')
        {{ "Bem vindo, ". Session::get('user')['user'] }}
    @endsection

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="{{route('admin/personal-data/edit', $id)}}">Dados Pessoais</a></li>
            <li class="enabled"><a href="{{route('admin/academic-data/edit', $id)}}">Dados Academicos</a></li>
        </ul>
        <div class="formatacao-campos">
            *Obrigatório
        </div>
        <form id="form" name="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <label for="textNome" class="control-label fonte-campos">Primeiro Nome<span class="cor-campo">*</span></label>
                    <input name="name" id="textNome" class="form-control" type="text" required value="{{ old('name') }}" oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="col-md-3">
                    <label for="textSobrenome" class="control-label fonte-campos">Sobrenome<span class="cor-campo">*</span></label>
                    <input name="last_name" id="textSobrenome" class="form-control" type="text" value="{{ old('last_name') }}" required oninvalid="this.setCustomValidity('Digite seu Sobrenome')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('last_name'))
                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="textDtNasc" class="control-label fonte-campos">Data de Nascimento<span class="cor-campo">*</span></label>
                    <input name="date_birth" id="textDtNasc" class="form-control" type="date" value="{{ old('date_birth') }}" required oninvalid="this.setCustomValidity('Digite Data de Nascimento')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('date_birth'))
                        <p class="text-danger">{{ $errors->first('date_birth') }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="inputNatu" class="fonte-campos">Nacionalidade<span class="cor-campo">*</span></label>
                    <select name="nationality" id="inputNatu" class="form-control">
                        <option value="0" @if (old('nationality')=='0' ) selected="selected" @endif>Brasileiro(a)</option>
                        <option value="1" @if (old('nationality')=='1' ) selected="selected" @endif>Estrangeiros</option>
                    </select>
                    @if($errors->has('nationality'))
                        <p class="text-danger">{{ $errors->first('nationality') }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label class="fonte-campos" for="sexo">Sexo:</label>
                    <select name="genre" class="form-control" id="sexo" value="{{ old('genre') }}">
                        <option value="0" @if (old('genre')=='0' ) selected="selected" @endif>Masculino</option>
                        <option value="1" @if (old('genre')=='1' ) selected="selected" @endif>Feminino</option>
                        <option value="2" @if (old('genre')=='2' ) selected="selected" @endif>Não deseja Informar</option>
                    </select>
                </div>
                @if($errors->has('genre'))
                    <p class="text-danger">{{ $errors->first('genre') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="textNomeSocial" class="control-label, fonte-campos">Nome Social</label>
                    <input name="name_social" id="textNomeSocial" class="form-control" type="text" value="{{ old('name_social') }}">
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEstadoCivil" class="fonte-campos">Estado Civil<span class="cor-campo">*</span></label>
                        <select name="marital_status" id="inputEstadoCivil" class="form-control" value="{{ old('marital_status') }}">
                            <option value="0" @if (old('marital_status')=='0' ) selected="selected" @endif>Solteiro</option>
                            <option value="1" @if (old('marital_status')=='1' ) selected="selected" @endif>Casado</option>
                            <option value="2" @if (old('marital_status')=='2' ) selected="selected" @endif>Divorciado</option>
                            <option value="3" @if (old('marital_status')=='3' ) selected="selected" @endif>Viúvo</option>
                        </select>
                        @if($errors->has('marital_status'))
                            <p class="text-danger">{{ $errors->first('marital_status') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputNomeMae" class="control-label fonte-campos">Nome da Mãe<span class="cor-campo">*</span></label>
                        <input name="name_mother" id="inputNomeMae" class="form-control" type="text" value="{{ old('name_mother') }}" required oninvalid="this.setCustomValidity('Digite o Nome da Mãe')" onchange="try{setCustomValidity('')}catch(e){}">
                        @if($errors->has('name_mother'))
                            <p class="text-danger">{{ $errors->first('name_mother') }}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputNomePai" class="control-label fonte-campos">Nome do Pai</label>
                        <input name="name_father" id="inputNomePai" class="form-control" type="text" value="{{ old('name_father') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Possui Alguma Deficiência?
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="opcaoSim" name="flag_deficient" @if(old('flag_deficient'))
                                        checked @endif onclick="return Validacao();">Sim
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="comentario" class="control-label fonte-campos deficiencia none">
                                    Descreva sua Deficiência
                                </label>
                                <textarea name="obs_deficient" class="form-control deficiencia none" rows="2" id="comentario">{{ old('obs_deficient') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Documentos</h3>
                <hr />
                <h4>Documento de Indentidade</h4>
                <div class="col-md-3">
                    <label for="inputNumDocs" class="fonte-campos">Número de Documento RG<span class="cor-campo"> *</span></label>
                    <input name="rg_number" type="text" class="form-control" id="inputNumDocs" value="{{ old('rg_number') }}"  required oninvalid="this.setCustomValidity('Digite o Número do RG com dígito')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="9">
                    @if($errors->has('rg_number'))
                        <p class="text-danger">{{ $errors->first('rg_number') }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="inputOrgEmissor" class="fonte-campos">Orgão Emissor<span class="cor-campo"> *</span></label>
                    <input name="uf_issue" type="text" class="form-control" id="inputOrgEmissor" value="{{ old('uf_issue') }}" required oninvalid="this.setCustomValidity('Digite o Orgão Emissor')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="col-md-2">
                    <label for="inputDataEmissao" class="fonte-campos">Data Emissão<span class="cor-campo"> *</span></label>
                    <input name="date_issue" type="date" class="form-control" id="inputDataEmissao" value="{{ old('date_issue') }}" required oninvalid="this.setCustomValidity('Digite a Data de Emissão')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <input type="file" id="file_rg" class="spacing-top" name="file_rg" value="{{ old('file_rg') }}" required oninvalid="this.setCustomValidity('Obrigatório upload do RG')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('file_rg'))
                        <p class="text-danger">{{ $errors->first('file_rg') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <br />
                <h4>CPF</h4>
                <div class="col-md-4">
                    <label for="inputNumDoc" class="fonte-campos">Número do Documento<span class="cor-campo"> *</span></label>
                    <input name="cpf" type="text" class="form-control" value="123.456.789-101" readonly="readonly">
                </div>
            </div>
            <div class="row elector_title">
                <br />
                <h4>Titulo de Eleitor</h4>
                <div class="col-md-4">
                    <label for="inputNumDoc_1" class="fonte-campos">Número de Documento<span class="cor-campo"> *</span></label>
                    <input name="elector_title" type="text" class="form-control" id="inputNumDoc_1" value="{{ old('elector_title') }}" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$" maxlength="12">
                    @if($errors->has('elector_title'))
                        <p class="text-danger">{{ $errors->first('elector_title') }}</p>
                    @endif
                </div>
            </div>
            <div class="row elector_title">
                <div class="col-md-3">
                    <input type="file" id="file_title" name="file_title" class="spacing-top" value="{{ old('file_title') }}">
                    @if($errors->has('file_title'))
                        <p class="text-danger">{{ $errors->first('file_title') }}</p>
                    @endif
                </div>
            </div>
            <div class="row militar">
                <br />
                <h4 class="militar none">Certificado Militar</h4>
                <div class="col-md-4">
                    <label for="inputNumDoc_2" class="fonte-campos militar none">Número de Documento<span class="cor-campo">*</span></label>
                    <input name="military_certificate" type="text" class="form-control militar none" id="inputNumDoc_2" value="{{ old('military_certificate') }}">
                    @if($errors->has('military_certificate'))
                        <p class="text-danger">{{ $errors->first('military_certificate') }}</p>
                    @endif
                    <input type="file" id="file_military" class="militar none spacing-top" name="file_military" value="{{ old('file_military') }}">
                    @if($errors->has('file_military'))
                        <p class="text-danger">{{ $errors->first('file_military') }}</p>
                    @endif
                </div>
            </div>
            <br />
            <div class="row">
                <br />
                <h4>Endereço e Contato</h4>
                <hr />
                <div class="col-md-2">
                    <label for="inputCep" class="fonte-campos">CEP<span class="cor-campo"> *</span></label>
                    <input name="postal_code" type="text" class="form-control" id="inputCep" value="{{ old('postal_code') }}" required oninvalid="this.setCustomValidity('Digite o CEP')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('postal_code'))
                        <p class="text-danger">{{ $errors->first('postal_code') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="type_public_place" class="fonte-campos">Tipo<span class="cor-campo">*</span></label>
                    <input type="text" id="typePublicPlace" name="type_public_place" class="form-control" value="{{ old('type_public_place') }}" required oninvalid="this.setCustomValidity('Digite o Tipo')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="col-md-4">
                    <label for="inputLogradouro" class="fonte-campos">Lougradouro<span class="cor-campo"> *</span></label>
                    <input name="public_place" type="text" class="form-control" id="inputLogradouro" value="{{ old('public_place') }}" required oninvalid="this.setCustomValidity('Digite o Lougradouro')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('public_place'))
                        <p class="text-danger">{{ $errors->first('public_place') }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="inputNum" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
                    <input name="number" type="text" class="form-control" id="inputNum" required value="{{ old('number') }}" oninvalid="this.setCustomValidity('Digite o número')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$" maxlength="8">
                    @if($errors->has('number'))
                        <p class="text-danger">{{ $errors->first('number') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="inputComplemento" class="fonte-campos">Complemento</label>
                    <input name="complement" type="text" class="form-control" id="inputComplemento" value="{{ old('complement') }}">
                </div>
                <div class="col-md-4">
                    <label for="inputBairro" class="fonte-campos">Bairro<span class="cor-campo"> *</span></label>
                    <input name="neighborhood" type="text" class="form-control" id="inputBairro" value="{{ old('neighborhood') }}" required oninvalid="this.setCustomValidity('Digite o Bairro')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('neighborhood'))
                        <p class="text-danger">{{ $errors->first('neighborhood') }}</p>
                    @endif
                </div>
                <div class="col-md-1">
                    <label for="inputUF" class="fonte-campos">UF<span class="cor-campo">*</span></label>
                    <input name="state" type="text" class="form-control" id="inputUF" value="{{ old('state') }}" required oninvalid="this.setCustomValidity('Digite o UF')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('state'))
                        <p class="text-danger">{{ $errors->first('state') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="inputCidade" class="fonte-campos">Cidade<span class="cor-campo"> *</span></label>
                    <input name="city" type="text" class="form-control" id="inputCidade" value="{{ old('city') }}" required oninvalid="this.setCustomValidity('Digite a Cidade')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('city')) <p class="text-danger">{{ $errors->first('city') }}</p>
                    @endif
                </div>
            </div>
            <br />
            <div class="row">
                <br />
                <h4>Comprovante de Residência</h4>
                <hr />
                <div class="col-md-4">
                    <label for="inputNumDoc_2" class="fonte-campos">Água, Luz, Gás ou Telefone<span class="cor-campo"> *</span></label>
                    <input type="file" id="file_address" class="proof_address spacing-top" name="file_address" value="{{ old('file_address') }}" required oninvalid="this.setCustomValidity('Obrigatorio upload do Comprovante de Residência')" onchange="try{setCustomValidity('')}catch(e){}">
                    @if($errors->has('file_address'))
                        <p class="text-danger">{{ $errors->first('file_address') }}</p>
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <h4>Telefone</h4>
                <hr />
                <div class="col-md-2">
                    <label for="inputTipo" class="fonte-campos">Código País<span class="cor-campo">*</span></label>
                    <select id="inputTipo" class="form-control" name="area_code_phone" value="{{ old('area_code_phone') }}">
                        <option value=55 @if (old('area_code_phone')=='55' ) selected="selected" @endif>(+55) Brasil
                        <option value=351 @if (old('area_code_phone')=='351' ) selected="selected" @endif>(+351) Portugal
                        <option value=54 @if (old('area_code_phone')=='54' ) selected="selected" @endif>(+54) Argentina
                        <option value=1 @if (old('area_code_phone')=='1' ) selected="selected" @endif>(+1) EUA
                        <option value=86 @if (old('area_code_phone')=='86' ) selected="selected" @endif>(+86) China
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputNum_1" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
                    <input name="phone" type="text" class="form-control" id="inputNum_1" value="{{ old('phone') }}" required oninvalid="this.setCustomValidity('Digite o Telefone')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$" maxlength="15">
                    @if($errors->has('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
            </div>
            <br />
            <div class="row">
                <h4>Celular</h4>
                <hr />
                <div class="col-md-2">
                    <label for="inputTipo" class="fonte-campos">Código País<span class="cor-campo">*</span></label>
                    <select id="inputTipo" class="form-control" name="area_code_mobile" value="{{ old('area_code_mobile') }}">
                        <option value=55 @if (old('area_code_mobile')=='55' ) selected="selected" @endif>(+55) Brasil
                        <option value=351 @if (old('area_code_mobile')=='351' ) selected="selected" @endif>(+351) Portugal
                        <option value=54 @if (old('area_code_mobile')=='54' ) selected="selected" @endif>(+54) Argentina
                        <option value=1 @if (old('area_code_mobile')=='1' ) selected="selected" @endif>(+1) EUA
                        <option value=86 @if (old('area_code_mobile')=='86' ) selected="selected" @endif>(+86) China
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputNum_2" class="fonte-campos">Número<span class="cor-campo"> *</span></label>
                    <input name="mobile" type="text" class="form-control" id="inputNum_1" value="{{ old('mobile') }}" required oninvalid="this.setCustomValidity('Digite o Celular')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$" maxlength="15">
                    @if($errors->has('mobile'))
                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <hr />
                <button id="addSubmit" type="submit" class="btn btn-danger float-right">AVANÇAR</button>
            </div>
        </form>
    </div>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{URL::asset('/js/personal-data.js')}}"></script>
@endsection
