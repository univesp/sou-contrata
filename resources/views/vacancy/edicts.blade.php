@extends('layouts.header')
@section('title')
    EDITAL
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
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
        <span class="texto-formatacao">{{ date_format(date_create($data->edict->date_end), 'd/m/Y') }}
            @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') > '0')
                (em {{date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') }} dias)
            @elseif(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') == '0')
                Hoje é o ultimo dia
            @endif
        </span>
        @if(!Session::get('user'))
            <div class="botao-posicao">
                <a href="{{route('login')}}"><button type="button" class="btn btn-danger">Login</button></a>
            </div>
            <div class="botao-posicao">

            <a href="{{route('form')}}"><button type="button" class="btn btn-danger">QUERO ME CADASTRAR</button></a>
            </div>
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
@endsection

