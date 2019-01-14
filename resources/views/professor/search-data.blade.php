@extends('layouts.header')
  @section('title')
      Cadastro de Professores
  @endsection
  @section('css')
      <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
      <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
  @endsection
  @section('content')
    <div class="container">
		<div class=wrap>
          <div class="row">
             <h1 class="negrito">LOREM IPSUM</h1>
          </div>

            <div class="col-md-12">
                <div class="alert alert-danger col-md-12" id="divError" role="alert" style="display:none;">
                    <p id="txtError"></p>
                </div>
                <div class="input-group col-md-6" style="float:right;">
                     <input id="txtCpf" class="form-control" type="text" placeholder="Pesquisar por um CPF Válido" />
                    {{ csrf_field() }}
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" onClick='insereTexto()'>Pesquisar por CPF</button>
                </div>
            </div>


            <div class="row" id="divData" style="display:none;margin-top:130px;">
               <div class="col-md-12 border-right">
                    <div class="col-md-4 " >
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Nome Completo</h6>
                                <h2 class="text-right">
                                    <img class="f-left icon" src="../img/person.svg"/>
                                    <span class="ng-tns-c5-1" id="txtName"></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                    <h6 class="m-b-20">CPF</h6>
                                    <h2 class="text-right">
                                        <img class="f-left icon" src="../img/cpf.svg"/>
                                        <span class="ng-tns-c5-1" id="txtDoc"></span>
                                     </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Data de Nascimento</h6>
                                <h2 class="text-right">
                                    <img class="f-left icon" src="../img/aniversario.svg"/>
                                    <span class="ng-tns-c5-1" id="txtBirthDay"></span>
                                </h2>
                            </div>
                        </div>
                    </div>

               <div class="row col-md-12 wrap">
                    <div class="btn-group float-right" role="group" aria-label="...">
                        <button type="button" class="btn-red" >BAIXAR</button>
                    </div>
               </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        function insereTexto()
        {document.getElementById('divData').style.display = "block";}
    </script>

     <script type="text/javascript">
        function insereTexto() {
            document.getElementById('divData').style.display = "none";
            document.getElementById('divError').style.display = "none";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: "search-data/"+ $("#txtCpf").val(),
                type: "POST",
                data: $("#txtCpf").val(),
                success: function (result) {
                    console.log(typeof result);
                    if(typeof result != 'string'){

                        document.getElementById('divData').style.display = "block";
                        $('#txtName').html(result[0].name +" "+ result[0].last_name);
                        $('#txtBirthDay').html(result[0].date_birth.substr(0, 10).split('-').reverse().join('/'));
                        $('#txtDoc').html(mCPF(result[0].cpf));

                        console.log(result);
                    }else{
                        document.getElementById('divError').style.display = "block";
                        $('#txtError').html(result);
                        console.log(result);
                    }

                },
                error: function (result) {
                    document.getElementById('divError').style.display = "block";
                    console.log(result);
                }
            });

        }
        function mCPF(cpf) {
            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            return cpf
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
