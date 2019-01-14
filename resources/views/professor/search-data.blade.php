
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
                     <input id="txtCpf" class="form-control" type="text" placeholder="Search" />
                    {{ csrf_field() }}
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" onClick='insereTexto()'>Pesquisar por CPF</button>
                </div>
            </div>

            <div class="alert alert-danger col-md-12" id="divError" role="alert" style="display:none;">
                <p id="txtError"></p>
            </div>

            <div class="row" id="divData" style="display:none;">
               <div class="col-md-12 border-right">
                    <div class="col-md-4 " >
                        <fieldset class="border">
                            <span class="title-box">Nome</span>
                            <p class="search-data" id="txtName">TITU</p>
                        </fieldset>
                    </div>
                   <div class="col-md-4">
                       <fieldset class="border">
                           <span class="title-box">Data Nascimento</span>
                           <p class="search-data" id="txtBirthDay">TITUvf</p>
                       </fieldset>
                   </div>
                    <div class="col-md-4">
                        <fieldset class="border">
                            <span class="title-box">CPF</span>
                            <p class="search-data" id="txtDoc">TITU</p>
                        </fieldset>
                    </div>

               </div>
                <div class="row col-md-12 wrap">
                    <div class="btn-group float-right" role="group" aria-label="...">
                        <button type="button" class="btn btn-success" >BAIXAR</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


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
                        $('#txtDoc').html(mCPF(result['0'].cpf));

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
