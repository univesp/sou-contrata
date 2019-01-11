
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
                <div class="input-group col-md-4" style="float:right;">
                     <input class="form-control" type="text" placeholder="Search" />
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12 border-right">
                    <div class="col-md-4 " >
                        <fieldset class="border">
                            <span class="title-box">Nome</span>
                            <p class="search-data">TITU</p>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="border">
                            <span class="title-box">CPF</span>
                            <p class="search-data">TITU</p>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="border">
                            <span class="title-box">Tipo de Documento</span>
                            <p class="search-data">TITUvf</p>
                        </fieldset>
                    </div>
               </div>
            </div>
            <div class="row col-md-12 wrap">
                <div class="btn-group float-right" role="group" aria-label="...">
                    <button type="button" class="btn btn-success" >BAIXAR</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
