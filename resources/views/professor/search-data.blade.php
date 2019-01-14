
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
                <div class="input-group col-md-6" style="float:right;">
                     <input class="form-control" type="text" placeholder="Digite um CPF Válido" />
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" onClick='insereTexto()'>Pesquisar por CPF</button>
                </div>
            </div>
            <div class="row" id="divTeste" style="display:none;">
               <div class="col-md-12 border-right">
                    <div class="col-md-4 " >
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Nome</h6>
                                <h2 class="text-right">
                                    <img class="f-left icon" src="../img/person.svg"/>
                                    <span class="ng-tns-c5-1">Lorem Ipsum </span>
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
                                    <span class="ng-tns-c5-1">456.132.123-5</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Tipo de Documento</h6>
                                <h2 class="text-right">
                                    <img class="f-left icon" src="../img/clip.svg"/>
                                    <span class="ng-tns-c5-1">Lorem Ipsum </span>
                                </h2>
                            </div>
                        </div>
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


    <script type="text/javascript">
        function insereTexto()
        {document.getElementById('divTeste').style.display = "block";}
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
