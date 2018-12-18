@extends('layouts.header')
@section('title')
    EDITAL
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
@endsection

@section('cabecalho')
    EDITAL
@endsection
@section('username')
{{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection

@section('content')

    <div class="container">
        <p class="formatacao-resumo">
            <ul class="nav nav-tabs">
                <li class="active, link"><a href="#">Edital</a></li>
            </ul>
        </p>
        <?php
        $link = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."documents".DIRECTORY_SEPARATOR."pdf".DIRECTORY_SEPARATOR."123456789.pdf";
        ?>
            <iframe src="https://drive.google.com/file/d/0B5Of3N77HFCpb2N2UjhUTDJWSzdhaFlrVkt0Y0JyUktyR1VV/preview"
                    class="iframe-pdf" frameborder="0"></iframe>
        {{--<img src="img/conteudo.jpg"  class="img-responsive, posicao-imagem" alt="conteudo"/>
        <img src="img/calendario.jpg"  class="img-responsive" alt="calendario"/>--}}
        <span class="texto-formatacao">
		Prazo de Inscrição</span><br />
        {{-- <span class="texto-formatacao">{{ date_format(date_create($data->edict->date_end), 'd/m/Y') }}
            @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') > '0')
                (em {{date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') }} dias)
            @elseif(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') == '0')
                Hoje é o ultimo dia
            @endif
        </span> --}}
		<span class="texto-formatacao">Encerrado</span>
        @if(!Session::get('user'))
            <div class="botao-posicao">
                <a href="{{route('login')}}"><button type="button" class="btn btn-danger">Login</button></a>
            </div>
            <div class="botao-posicao">

            {{-- <a href="{{route('form')}}"><button type="button" class="btn btn-danger">QUERO ME CADASTRAR</button></a>
            </div> --}}
        @else
            <div class="botao-posicao">
                <a href="{{route('professorPersonalData')}}"><button type="button" class="btn btn-danger">PROSSEGUIR</button></a>
            </div>
        @endif
        <div class="col-md-12">
        <div class="float-right">
            <a target="_blank" href="https://drive.google.com/a/univesp.br/file/d/11N-1wi5diU8IikcEu3e7or81dhITNf6M/view?usp=sharing" title="Confira aqui as disciplinas para 2019 !">Confira aqui as disciplinas para 2019 !</a>
        </div>
        </div>

    </div><br>
    <p class="copyright">
        <strong>2018. UNIVESP - Universidade Virtual do Estado de São Paulo.</strong><br>Av. Prof. Almeida Prado, 532 - Prédio 1, Térreo. Cid. Universitária - Butantã - São Paulo-SP. CEP 05508-901 - +55 11 3188-6700 |
        <a href="https://www.facebook.com/pages/UNIVESP-Universidade-Virtual-do-Estado-de-S%C3%A3o-Paulo/1506859409552887" target="_blank" title="Facebook">
        <i class="fab fa-facebook-square"></i></a>
        <!--<a href="https://twitter.com/univespoficial" target="_blank" title="Twitter">
        <span class="fa fa-twitter-square"></span></a>-->
        <a href="https://www.instagram.com/univespoficial/" target="_blank" title="Instagram">
        <i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCBL2tfrwhEhX52Dze_aO3zA" target="_blank" title="YouTube">
        <i class="fab fa-youtube"></i></a><br>
        <strong><small>v1.0.10</small></strong>
    </p>
    <br><br>
@endsection

