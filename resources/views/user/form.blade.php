@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('cabecalho')
    FORMULÁRIO DE INSCRIÇÃO
@endsection
@section('username')

@endsection

@section('content')
    <body>
    <div class="container">
        <div class="formatacao-campos">
            *Obrigatório
        </div>
        <form action="{{route('store')}}" method="post">
            {{ csrf_field() }}
            <div id="msgError" class="alert alert-danger none" role="alert">
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="textNome" class="control-label, fonte-campos">Nome<span class="cor-campo">*</span></label>
                    <input id="textNome" class="form-control" type="text" name="name" required oninvalid="this.setCustomValidity('Digite seu Nome')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
            </div>

            <div class="row">
                <div class="form-group form-group col-md-3">
                    <label for="textSenha" class="control-label, fonte-campos">Senha<span class="cor-campo">*</span></label>
                    <input id="textSenha" class="form-control" type="password" name="password" required  onchange="validadePasswordConfirmation();">
                </div>
                <div class="form-group form-group col-md-3">
                    <label for="textConfirm" class="control-label, fonte-campos">Confirmar senha<span class="cor-campo">*</span></label>
                    <input id="textConfirm" class="form-control" type="password" name="passwordConfirm" required onchange="validadePasswordConfirmation();">
                </div>
            </div>

            <div class="row">
                <div class="form-group form-group col-md-3">
                    <label for="textLogin" class="control-label, fonte-campos">Login<span class="cor-campo">*</span></label>
                    <input id="textLogin" class="form-control" type="text" name="login" required oninvalid="this.setCustomValidity('Digite seu Login')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group col-md-6">
                    <label for="textEmail" class="control-label, fonte-campos">Email<span class="cor-campo">*</span></label>
                        <input id="textEmail" class="form-control" type="Email" name="email" required oninvalid="this.setCustomValidity('Digite seu Email')" onchange="checkEmail();" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    </label>
                </div>
            <div>

            <div class="row">
                <div class="form-group form-group col-md-7">
                    <label>
                        <input type="radio" name="confirmation" required> Ao me cadastrar, confirmo que sou docente da <b>USP</b>, <b>UNICAMP</b> ou <b>UNESP</b><span class="cor-campo">*</span>
                    </label>
                </div>
            </div>

            <hr />
            <div class="row">
                <button type="submit" name="save" id="save" class="btn btn-danger float-right">SALVAR</button></p>
            </div>
            <br /><br />
        </form>
    </div>
    @endsection
    @section('scripts')
        <script>
            function validadePasswordConfirmation(){
                var senha = document.getElementById('textSenha');
                var confirma = document.getElementById('textConfirm');
                if(senha.value != confirma.value){
                    $("#msgError").css({
                        "display": "block",
                    })
                    $('#msgError').text('Senhas não conferem, por favor corrija para prosseguir');
                }else{
                    $("#msgError").css({
                        "display": "none",
                    })
                    $('#msgError').text('');
                }
                validadeButton();
            }

            function checkEmail() {
                $.ajax({
                    // Call url
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: "email-check",
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',

                        // Call values of fields candidates table
                        email: $('#textEmail').val()
                    },
                    success: function (result) {
                        if(result === 'Nok'){
                            $("#msgError").css({
                                "display": "block",
                            })
                            $('#msgError').text('Email já cadastrado, não pode ser usado.');
                        }else if(result === 'Eok'){
                            $("#msgError").css({
                                "display": "block",
                            })
                            $('#msgError').text('Email inválido.');
                        }else{
                            $("#msgError").css({
                                "display": "none",
                            })
                            $('#msgError').text('');
                        }
                        validadeButton();
                    },


                    error: function (errors) {
                        console.log(errors)
                    }
                });
            }
            function validadeButton(){
                    if ($("#msgError").css('display') != 'none') {
                        $('#save').attr("disabled", true);
                    } else {
                        $('#save').attr("disabled", false);
                    }
            }

        </script>
@endsection
