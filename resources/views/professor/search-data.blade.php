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
             <h1 class="negrito">Baixar documentação do candidato</h1>
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
                        <button type="button" class="btn-red" id="download" onclick="downloadPDF();">GERAR DOCUMENTOS</button>
                    </div>
               </div>

               <div class="row col-md-12 wrap" id="links" style="display: none">
                   <div class="btn-group float-right" role="group" aria-label="...">
                       <a id="info" class="texto-formatacao" target="_blank" href="" title="Veja os dados do candidato."><i class="far fa-file-pdf"></i> Dados</a>
                       <a id="graduate" class="texto-formatacao" target="_blank" href="" title="Veja a graduação."><i class="far fa-file-pdf"></i> Graduação</a>
                       <a id="master" class="texto-formatacao" target="_blank" href="" title="Veja o mestrado."><i class="far fa-file-pdf"></i> Mestrado</a>
                       <a id="doctorate" class="texto-formatacao" target="_blank" href="" title="Veja o doutorado."><i class="far fa-file-pdf"></i> Doutorado</a>

                   </div>
               </div>

            </div>
        </div>
    </div>
        </div>
    </div>
     <script type="text/javascript">

         function downloadPDF() {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             var cpf = $("#txtCpf").val();
             console.log('gerando PDF para : ' + cpf);

             $.ajax({
                 url: "pdf-download/"+cpf,
                 type: "POST",
                 data: cpf,
                 success: function (result) {
                     console.log(result);
                     $("#info").attr("href", result[0])
                     $("#graduate").attr("href", result[1])
                     $("#master").attr("href", result[2])
                     $("#doctorate").attr("href", result[3])
                     $("#links").removeAttr("style")

                 },
                 error: function (result) {
                     console.log(result);
                 }
             });
         }//downloadPDF

         function insereTexto() {
             document.getElementById('divData').style.display = "block";
         }//insereTexto

        function insereTexto() {
            document.getElementById('divData').style.display = "none";
            document.getElementById('divError').style.display = "none";
            $("#links").css("display", "none");
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
                    console.log('testes');
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
                    console.log('teste');
                }
            });

        }//insereTexto

        function mCPF(cpf) {
            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            return cpf
        }//mCPF

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
