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
                <br>
                <br>
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
                                <input  type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
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
                        <div class="col-md-6 spacing-top">

                            <label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>
                            <div class="display-flex">
                                <input type="file" name="file_graduate[]" class="file_graduate" required  accept="application/pdf"/>
                            </div>
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
    <script>
        $(function(){

            var CONTADOR = 0;
            var CERTIFICADOS = new Array();

            function validateExtension(file) {
                if(file.get(0).files[0].type != 'application/pdf') {
                    $("#msgFail").addClass('msgFail');
                    $("#msgFail").append('<div class="alert alert-danger" role="alert">Arquivo Inválido ou maior que 2 Mega-byte (Mb)</div>');
                    $("#cadlettters").focus();
                    $(".file_graduate").val('');
                    $(".file_graduate").focus();
                    $('html, body').animate({scrollTop:0}, 'slow');
                } else{
                    $("#msgFail").empty();
                }
            }

            function mount_form_graduation(id) {

                var HTML = new Array();
                var codigo;
                CONTADOR++;

                codigo = CONTADOR;

                var today = new Date().toISOString().split('T')[0];
                document.getElementsByClassName("inputDataConclusao")[0].setAttribute('max', today);

                HTML.push('<div id="grad_' + codigo + '">');
                HTML.push('<div class="col-md-7">');
                HTML.push('<div class="row">');
                HTML.push('<div class="col-md-12">');
                HTML.push('<select name="graduate_dinamic[]" id="' + codigo + '" class="form-control graduations graduate-select graduate_dinamic tier">');
                HTML.push('<option value="" selected>SELECIONE A SUA FORMAÇÃO</option>');
                HTML.push('<option value="1">GRADUAÇÃO</option>');
                HTML.push('<option value="2">MESTRADO</option>');
                HTML.push('<option value="3">DOUTORADO</option>');
                HTML.push('</select>');
                HTML.push('<div class="row">');
                HTML.push('<div class="col-md-12" style="padding-left: 0px;">');
                HTML.push('<div class="col-md-6">');
                HTML.push('<label class="area">Selecione a sua Área</label>');
                HTML.push('<select name="area_id[]" class="form-control graduations areas" id="" required>');
                HTML.push('<option value="">Selecione a área</option>');
                HTML.push('</select>');
                HTML.push('</div>');
                HTML.push('<div class="col-md-6" style="padding-right: 0px;">');
                HTML.push('<label class="area">Selecione a sua Subárea</label>');
                HTML.push('<select name="subarea_id[]" class="form-control graduations subarea" disabled required>');
                HTML.push('<option value="">Selecione a subárea</option>');
                HTML.push('</select>');
                HTML.push('</div>');
                HTML.push('</div>');
                HTML.push('</div><br><br>');
                HTML.push('</div></div></div><br/>');
                HTML.push('<div class="col-md-7">');
                HTML.push('<div class="row" style="margin-top:10px;">');
                HTML.push('<div class="col-md-12">');
                HTML.push('<label for="inputCursos" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>');
                HTML.push('<input type="text" class="form-control inputCursos" maxlength="50" name="inputCursos[]" required oninvalid="this.setCustomValidity(Digite o Curso)" onchange="try{setCustomValidity("")}catch(e){}>');
                HTML.push('</div></div>');
                HTML.push('<div class="row" style="margin-top:10px;">');
                HTML.push('<div class="col-md-8">');
                HTML.push('<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>');
                HTML.push('<input type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" required oninvalid="this.setCustomValidity(Digite a Instituição)" onchange="try{setCustomValidity("")}catch(e){}>');
                HTML.push('</div></div>');
                HTML.push('<div class="row" style="margin-top:10px;">');
                HTML.push('<div class="col-md-12">');
                HTML.push('<label for="inputAnoConclusao" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>');
                HTML.push('<input type="date" class="form-control dataYear inputDataConclusao" name="inputDataConclusao[]" max="'+ today +'" required oninvalid="this.setCustomValidity(Digite o Data de Conclusão)" onchange="try{setCustomValidity("")}catch(e){}" pattern="\d{1,2}/\d{1,2}/\d{4}>');
                HTML.push('</div></div>');
                HTML.push('<div class="row">');
                HTML.push('<div class="col-md-12" style="padding-left:0px;">');
                HTML.push('<p class="text-danger" id="err-' + codigo + '></p>');
                HTML.push('</div></div></div>');
                HTML.push('<div class="row col-md-7" style="margin-top:20px; margin-left:0px;">');
                HTML.push('<div class="col-md-6" style="margin-top:10px;padding-left:0px;">');
                HTML.push('<label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>');
                HTML.push('<div class="display-flex">');
                HTML.push('<input type="file" name="file_graduate[]" class="file_graduate" accept="application/pdf"/>');
                HTML.push('</div></div><br />');
                HTML.push('<div class="col-md-3" style="margin-top:0px;">');
                HTML.push('<button type="button" class="btn btn-success btn-sm novo" novo='+ codigo +'>Novo</button>');
                HTML.push('<button type="button" class="btn btn-danger btn-sm remove" remove=' + codigo + '>Remover</button>');
                HTML.push('</div></div>');

                $("#father").append(HTML.join(''));

                $('.tier').on('change', function() {
                    CERTIFICADOS[$(this).attr('id')] = $(this).val();

                    if (CERTIFICADOS.includes("1") && CERTIFICADOS.includes("2") && CERTIFICADOS.includes("3")) {
                        $('.submit').prop('disabled',false);
                    } else {
                        $('.submit').prop('disabled',true);
                    }
                });

                $('.inputDataConclusao').on('blur', function() {
                    var field = $(this).val();
                    var date = new Date(field);
                    var today = new Date();
                    today.setHours(0,0,0,0);
                    if (date >= today) {
                        $(this).val('');
                        $(this).parents('.row').find('.text-danger').text('Coloque apenas graduações já finalizadas!');
                    } else {
                        $(this).parents('.row').siblings('.row').find('.text-danger').text('');
                    }
                });
            }

            function getSelectData() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: "area",
                    type: 'get',
                    success: function (result) {
                        result = JSON.parse(result);
                        Object.keys(result).forEach(function (key) {
                            $('.areas').append(`<option value="${key}">${result[key]}</option>`)
                        });
                    },
                    error: function (errors) {
                    }
                });
            }

            $(document).ready(function(){

                getSelectData();

                var today = new Date().toISOString().split('T')[0];
                document.getElementsByClassName("inputDataConclusao")[0].setAttribute('max', today);

                $("#cadlettters").focus();

                $(".file_graduate").change(function () {
                    validateExtension($(this));

                });

                $('.tier').on('change', function() {
                    CERTIFICADOS[$(this).attr('id')] = $(this).val();
                });

                $("#area").change(function(){
                    $(".area_id").val($(this).val());
                });

            });

            $(document).on('click', '.remove', function(){

                var id = $(this).attr('remove');
                delete CERTIFICADOS[id];

                if (CERTIFICADOS.includes("1") && CERTIFICADOS.includes("2") && CERTIFICADOS.includes("3")) {
                    $('.submit').prop('disabled',false);
                } else {
                    $('.submit').prop('disabled',true);
                }
                $("#grad_" + id).remove();
            });

            $(document).on('click', '.novo', function(){

                var id = $(this).attr('novo');


                getSelectData();

                mount_form_graduation(id);

            });

            $(document).on('change', '.graduate_dinamic', function(){

                //$(".area_id").val($(this).val());

            });

            $(document).on('change', '.areas', function(e){

                if($(this).val() == '') {

                } else {
                    console.log($(this).val());

                    $(".area_id").val($(this).val());

                    $(".subarea").prop('disabled',false);
                    //$('.subarea').children().not(':first').remove();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url: `subarea/${e.target.value}`,
                        type: 'get',
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (result) {
                            result = JSON.parse(result);
                            Object.keys(result).forEach(function (key) {
                                $('.subarea').append(`<option value="${key}">${result[key]}</option>`)
                            });

                            $(".subarea").prop('disabled',false);

                        },
                        error: function (errors) {
                        }
                    });
                }
            });

            $('.inputDataConclusao').on('blur', function() {
                var field = $(this).val();
                var date = new Date(field);
                var today = new Date();
                today.setHours(0,0,0,0);
                if (date >= today) {
                    $(this).val('');
                    $(this).parents('.row').siblings('.row').find('.text-danger').text('Coloque apenas graduações já finalizadas!');
                } else {
                    $(this).parents('.row').siblings('.row').find('.text-danger').text('');
                }
            });

            $('#area').on('change', function(e) {
                //$(".area_id").val($('#area').val());

                if($(this).val() == '') {
                    $("#subarea").prop('disabled',true);
                } else {
                    $('#subarea').children().not(':first').remove();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url: `subarea/${e.target.value}`,
                        type: 'get',
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (result) {
                            result = JSON.parse(result);
                            Object.keys(result).forEach(function (key) {
                                $('#subarea').append(`<option value="${key}">${result[key]}</option>`)
                            });

                            $("#subarea").prop('disabled',false);
                        },
                        error: function (errors) {
                        }
                    });
                }
            });
        });
    </script>
@endsection
