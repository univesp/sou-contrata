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
    {{--  {{dd($candidate, $scholarity[0], $scholarity[0]_type)}}  --}}
    <div class="container">
        <div id="msgFail"></div>
        
        <ul class="nav nav-tabs">
            <li class="enabled"><a href="{{route('admin/personal-data/edit', $user->user_id)}}">Dados Pessoais</a></li>
            <li class="active"><a href="{{route('admin/academic-data/edit', $user->id)}}">Dados Academicos</a></li>
            <li class="active"><a href="{{route('admin/password/edit', $user->id)}}">Senha</a></li>
        </ul>

        <p class="ob"><span class="cor-campo"> *</span>Campos Obrigatórios</p>
        <p class="text-danger">Para avançar é necessário a inserção das formações: <b>GRADUAÇÃO</b>, <b>MESTRADO</b> e <b>DOUTORADO</b>. Clique no botão <b>NOVO</b> para adicionar a formação.</p>

        <form action="{{ route('admin/academic-data/update', $id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div  class="row">
                <div class="col-md-7">
                    <div  class="form-group">
                        <label for="cadlettters" class="fonte-campos"><a href="http://buscatextual.cnpq.br/buscatextual/busca.do?metodo=apresentar" target="blank">Preencha este campo com a url do seu curriculo Lattes</a><span class="cor-campo"> *</span></label>
                        <input  type="text" class="form-control" id="cadlettters" name="cadlettters" placeholder="links para o curriculo lattes" value="{{ old('cadlettters', $scholarity[0]->class_name) }}">
                    </div>
                </div>
            </div>
            <br />
            <hr />
            @foreach($scholarity as $scholl)
                <div class="row">
                    <h3>Formação Acadêmica</h3>
                    <hr />
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="graduate_dinamic[]" id="0" class="form-control graduate_dinamic tier">
                                    <option value="">SELECIONE A SUA FORMAÇÃO</option>
                                    <option value="0" @if (old('graduate_dinamic.0', $scholl->scholarity_type)=='graduate' ) selected="selected" @endif>GRADUAÇÃO</option>
                                    <option value="1" @if (old('graduate_dinamic.0', $scholl->scholarity_type)=='master' ) selected="selected" @endif>MESTRADO</option>
                                    <option value="2" @if (old('graduate_dinamic.0', $scholl->scholarity_type)=='doctorate' ) selected="selected" @endif>DOUTORADO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-md-6">
                                <label>Selecione a sua Área</label>
                                <select name="area_id[]" class="form-control graduations area" id="area" required>
                                    <option value="{{$scholl->area[0]->id}}">{{$scholl->area[0]->description}}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Selecione a sua Subárea</label>
                                <select name="subarea_id[]" class="form-control graduations subarea" id="subarea" disabled required>
                                    <option value="{{$scholl->subarea[0]->id}}">{{$scholl->subarea[0]->description}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="father">
                        <div class="col-md-7">
                            <div class="row spacing-top">
                                <div class="col-md-12">
                                    <label for="inputCursos" class="fonte-campos">Curso<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control inputCursos" maxlength="200" name="inputCursos[]" required value="{{ old('inputCursos.0', $scholl->course_name) }}"  oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                            </div>
                            <div class="row spacing-top">
                                <div class="col-md-8">
                                    <label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
                                    <input  type="text" class="form-control inpuInstituicao" value="{{ old('inpuInstituicao.0', $scholl->teaching_institution) }}" name="inpuInstituicao[]" required maxlength="150" oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                            </div>
                            <div class="row spacing-top">
                                <div class="col-md-3">
                                    <label for="inputAnoConclusao" class="fonte-campos">Data de Conclusão<span class="cor-campo"> *</span></label>
                                    <input  type="date" class="form-control dataYear inputDataConclusao" value="{{ old('inputDataConclusao.0', $scholl->end_date) }}" name="inputDataConclusao[]" required oninvalid="this.setCustomValidity('Digite o Data de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}" max="new Date().toISOString().split('T')[0]">
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
                                <button type="button" data-toggle="modal" data-target="#modal-success" class="btn pdf-buttom">Ver Diploma</button><br/>
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
            @endforeach





            <hr />
            <div class="row">
                <p class="top">Adicionar Formação : <span class="cor-campo"> * | Graduação | Mestrado | Doutorado</span>
                    <button type="submit" class="btn btn-danger float-right submit" disabled>ATUALIZAR</button>
                    <a href="{{route('home')}}"><button type="button" class="btn btn-danger space-btw-button">VOLTAR</button></a>
                </p>
            </div>
            <br /><br />
        </form>

        <div class="modal fade in" id="modal-success" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">PDF</h4>
                    </div>
                    <div class="modal-body">
                        <embed
                            src="{{ $scholl->link }}"
                            class="pdf-size"
                            frameborder="0"
                        >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{URL::asset('/js/admin/academic-data.js')}}"></script>
@endsection
