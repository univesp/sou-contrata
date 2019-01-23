@extends('layouts.header')
  @section('title')
      Cadastro de Professores
  @endsection
  @section('css')
      <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
      <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- <style>
      .card-block{
          border:1px solid #ccc;
      }
      </style> -->
  @endsection
  @section('content')

    <div class="container">
          <div class="row">
             <h1 class="negrito">Baixar documentação do candidato</h1>
          </div>

            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Data Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Documentos Academicos?</th>
                        <th scope="col">Documentos Pessoais?</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($candidates as $candidate)
                        <tr>
                            <td>{{$candidate->name}} {{$candidate->last_name}}</th>
                            <td>{{ date_format(date_create($candidate->date_birth),"d-m-Y") }}</td>
                            <td>{{$candidate->cpf_form}}</td>
                            @if($candidate->scholarities)
                                <td class="Success">Sim</td>
                            @else
                                <td class="Danger">Não</td>
                            @endif
                            @if($candidate->document)
                                <td class="Success">Sim</td>
                            @else
                                <td class="Danger">Não</td>
                            @endif
                            <td><button class="btn btn-default" type="submit" onClick='downloadPDF({{$candidate->cpf}})'>Gerar PDF</button></td>
                        </tr>
                    @endforeach
                    {{ csrf_field() }}
                    </tbody>
                </table>
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
     <script type="text/javascript">

         function downloadPDF(cpf) {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
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
                     $("#info").attr("href", result[0])
                     $("#graduate").attr("href", result[1])
                     $("#master").attr("href", result[2])
                     $("#doctorate").attr("href", result[3])
                     $("#links").removeAttr("style")
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
                    // console.log(result);
                    // console.log('teste');
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
