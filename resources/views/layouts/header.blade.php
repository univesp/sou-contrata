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
            <div  class="col-sm-6 col-xs-6 col-md-6">
                <div class="imagem-topo-sou">
                    <img src="../img/logo-sou.png">
                </div>
                <div class="text-pequeno">
                    <span>Credenciamento</span>
                </div>
                <div class="text-big">
                    <span>@yield('cabecalho')</span>
                </div>
                <div class="imagem-topo-sou">
                    <img src="../img/logo-abaixo.jpg">
                </div>
            </div>
            <div style="color:white;" class="col-sm-6 col-xs-6 col-md-6 imagem-univesp float-right">
                <img src="../img/univesp.png">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="col-sm-12 col-xs-12 col-md-10">
                        <span class="float-right text-user">@yield('username')</span>
                    </div>
                    @if (Session::get('user')['user'])
                        <div class="col-md-2">
                            <button class="btn btn-danger sair" >Sair</button>
                        </div>                        
                    @endif
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
