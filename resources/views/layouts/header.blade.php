<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
    <div class="fonte-cabecalho">
        <div class="container">
            <div  class="col-md-6">
                <div class="imagem-topo-sou">
                    <img src="../img/logo-sou.png">
                </div>
                <div class="text-pequeno">
                    <span>Processos Seletivos</span>
                </div>
                <div class="text-big">
                    <span>@yield('cabecalho')</span>
                </div>
                <div class="imagem-topo-sou">
                    <img src="../img/logo-abaixo.jpg">
                </div>
            </div>
            <div style="color:white;" class="col-md-6 imagem-univesp float-right">
                <img src="../img/univesp.png">
                <div class="col-md-12">
                    <div class="col-md-10">
                        <span class="float-right text-user">Ola, eu sou @yield('username')</span>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger sair" >Sair</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both;"></div>
        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        @yield('scripts')

        <script>
            $(function() {
                $(document).ready(function(){

                    $(".sair").click(function(){

                        window.location.href = "/logoff";
                    });
                });
            });
        </script>
    </body>
</html>
