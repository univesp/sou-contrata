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
            <li class="disabled"><a href="{{ route('professorPersonalData') }}">Dados Pessoais</a></li>
            <li class="active"><a href="{{ route('professorAcademicData')}}">Dados Academicos</a></li>
            <li class="disabled"><a href="#">Área de Interesse</a></li>
        </ul>
        <p class="ob"><span class="cor-campo"> *</span>Campos Obrigatórios</p>
        <p class="text-danger">Para avançar é necessário a inserção das formações: <b>GRADUAÇÃO</b>, <b>MESTRADO</b> e <b>DOUTORADO</b>. Clique no botão <b>NOVO</b> para adicionar a formação.</p>

        <form action="{{ route('professorAcademicData')}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div  class="row">
                <div class="col-md-7">
                    <div  class="form-group">
                        <label for="cadlettters" class="fonte-campos"><a href="http://buscatextual.cnpq.br/buscatextual/busca.do?metodo=apresentar" target="blank">Preencha este campo com a url do seu curriculo Lattes</a><span class="cor-campo"> *</span></label>
                        <input required  type="text" class="form-control" id="cadlettters" name="cadlettters" placeholder="links para o curriculo lattes" value="{{ old('cadlettters') }}">
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
                                <option value="">SELECIONE A SUA FORMAÇÃO</option>
                                <option value="1" {{ (collect(old('graduate_dinamic.0'))->contains('1')) ? 'selected':'' }}>GRADUAÇÃO</option>
                                <option value="2" {{ (collect(old('graduate_dinamic.0'))->contains('2')) ? 'selected':'' }}>MESTRADO</option>
                                <option value="3" {{ (collect(old('graduate_dinamic.0'))->contains('3')) ? 'selected':'' }}>DOUTORADO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="col-md-6">
                            <label>Selecione a sua Área</label>
                            <select name="area_id[]" class="form-control graduations area" id="area" required>
                                <option value="">Selecione a área</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Selecione a sua Subárea</label>
                            <select name="subarea_id[]" class="form-control graduations subarea" id="subarea" disabled required>
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
                                <input  type="text" class="form-control inputCursos" maxlength="60" name="inputCursos[]" required value="{{ old('inputCursos.0') }}"  oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                        </div>
                        <div class="row spacing-top">
                            <div class="col-md-8">
                                <label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
                                <input maxlength="150" type="text" class="form-control inpuInstituicao" value="{{ old('inpuInstituicao.0') }}" name="inpuInstituicao[]" required maxlength="150" oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                        </div>
                        <div class="row spacing-top">
                            <div class="col-md-3">
                                <label for="inputAnoConclusao" class="fonte-campos">Data de Conclusão<span class="cor-campo"> *</span></label>
                                <input type="date" class="form-control dataYear inputDataConclusao" value="{{ old('inputDataConclusao.0') }}" name="inputDataConclusao[]" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}" max="new Date().toISOString().split('T')[0]">
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
                                <input type="file" onchange="verificaExtensao(this)" name="file_graduate[]" class="file_graduate" required  accept="application/pdf"/>
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
    @include('layouts.footer')
@endsection
@section('scripts')
    <script language="javascript" type="text/javascript">
        function verificaExtensao($input) {
            var extPermitidas = ['pdf'];
            var extArquivo = $input.value.split('.').pop();

            if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
                alert('Extensão "' + extArquivo + '" não permitida!');
                $input.value = ''
            }
        }
    </script>
    <script src="{{URL::asset('/js/academic-data.js')}}"></script>

@endsection
