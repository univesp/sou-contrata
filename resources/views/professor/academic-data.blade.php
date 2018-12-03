@extends('layouts.header')
@section('title')
    DADOS ACADÊMICOS
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
            <li class="disabled"><a href="#">Dados Pessoais</a></li>
            <li class="active, link3"><a href="{{ route('professorPersonalData')}}">Dados Academicos</a></li>
            <li class="disabled"><a href="#">Área de Interesse</a></li>
        </ul>
        <p class="ob"><span class="cor-campo"> *</span>Obrigatório</p>
        <br />

        <form action="{{ route('professorAcademicData')}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div  class="row">
                <div class="col-md-7">
                    <div  class="form-group">
                        <label for="cadlettters" class="fonte-campos"><a href="http://buscatextual.cnpq.br/buscatextual/busca.do?metodo=apresentar" target="blank">Preencha este campo com a url do seu curriculo Lattes</a><span class="cor-campo"> *</span></label>
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
                            <select name="graduate_dinamic[]" id="0" class="form-control graduate_dinamic tier">
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
                            <select name="area_id[]" class="form-control graduations areas" id="area" required>
                                <option value="">Selecione a área</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="area">Selecione a sua Subárea</label>
                            <select name="subarea_id[]" class="form-control graduations" id="subarea" disabled required>
                                <option value="">Selecione a subárea</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="father">
                    <div class="col-md-7">
                        <div class="row spacing-top">
                            <div class="col-md-12">
                                <label for="inputCursos" class="fonte-campos">Curso<span class="cor-campo"> *</span></label>
                                <input  type="text" class="form-control inputCursos" maxlength="50" name="inputCursos[]" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                        </div>
                        <div class="row spacing-top">
                            <div class="col-md-8">
                                <label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
                                <input  type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" maxlength="150" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                        </div>
                        <div class="row spacing-top">
                            <div class="col-md-3">
                                <label for="inputAnoConclusao" class="fonte-campos">Data de Conclusão<span class="cor-campo"> *</span></label>
                                <input  type="date" class="form-control dataYear inputDataConclusao" name="inputDataConclusao[]" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}" max="new Date().toISOString().split('T')[0]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-danger"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row col-md-7 spacing-top">
                        <div class="col-md-8 spacing-top">

                            <label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
                            <div class="display-flex">
                                <input type="file" name="file_graduate[]" class="file_graduate" required  accept="application/pdf"/>
                            </div>
                            <span class="cor-campo">* Formato do arquivo deve ser PDF, com tamanho max de 4 MB</span></label>
                        </div><br />
                        <div class="col-md-1">
                            <button type="button" class="btn btn-success btn-sm novo">Novo</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <p class="top">Adicionar Formação : <span class="cor-campo"> * | Graduação | Mestrado | Doutorado</span><button type="submit" class="btn btn-danger float-right submit" disabled>AVANÇAR</button></p>
            </div>
            <br /><br />
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('/js/academic-data.js')}}"></script>
@endsection
