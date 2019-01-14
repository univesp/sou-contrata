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
{{ "Bem vindo ". Session::get('user')['user'] }}
@endsection

@section('content')

    <div class="container">
        {{-- Nav Tabs --}}
        <?php $diff = date_diff(date_create($data->date_end), date_create(now()));?>
        <p class="formatacao-resumo">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#edital" aria-controls="edital" role="tab" data-toggle="tab">Edital</a></li>
                @if(!empty($data->link_classification))
                    <li role="presentation"><a href="#classificacao" aria-controls="classificacao" role="tab" data-toggle="tab">Classificação</a></li>
                @endif
              </ul>
        </p>


        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="edital">
                <h2 class="text-uppercase text-center">Edital de credenciamento de banco de docentes da Univesp</h2>
                <iframe src="<?=$data->link_edital ?>"
                            class="iframe-pdf" frameborder="0"></iframe>
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{--<img src="img/conteudo.jpg"  class="img-responsive, posicao-imagem" alt="conteudo"/>
                        <img src="img/calendario.jpg"  class="img-responsive" alt="calendario"/>--}}
                        <span class="texto-formatacao">
                        Prazo de Inscrição:</span>
                        {{-- <span class="texto-formatacao">{{ date_format(date_create($data->edict->date_end), 'd/m/Y') }}
                            @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') > '0')
                                (em {{date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') }} dias)
                            @elseif(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') == '0')
                                Hoje é o ultimo dia
                            @endif
                        </span> --}}

                        @if($diff->format("%R%a") > 0)
                            <span class="texto-formatacao">Encerrado</span>
                        @else
                            <span class="texto-formatacao">{{$diff->d}} dias para o encerramento</span>
                        @endif

                    </div>
                    <br /><br />
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(!Session::get('user'))
                            <div class="botao-posicao">
                                <a href="{{route('login')}}"><button type="button" class="btn btn-danger">LOGIN</button></a>
                            </div>
                            @if($diff->format("%R%a") < 0)
                                <div class="botao-posicao">
                                    <a href="{{route('form')}}"><button type="button" class="btn btn-danger">QUERO ME CADASTRAR</button></a>
                                </div>
                            @endif
                        @else
                            @if($diff->format("%R%a") < 0)
                                <div class="botao-posicao">
                                    <a href="{{route('professorPersonalData')}}"><button type="button" class="btn btn-danger">PROSSEGUIR</button></a>
                                </div>
                            @else
                                <div class="botao-posicao">
                                    <a href="{{route('home')}}"><button type="button" class="btn btn-danger">VOLTAR</button></a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="classificacao">
                <h2 class="text-uppercase text-center">Lista de credenciados para disciplinas 2019.1</h2>
                <iframe src="{{$data->link_classification}}"
                    class="iframe-pdf" frameborder="0"></iframe>
                                <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{--<img src="img/conteudo.jpg"  class="img-responsive, posicao-imagem" alt="conteudo"/>
                    <img src="img/calendario.jpg"  class="img-responsive" alt="calendario"/>--}}
                    <span class="texto-formatacao">
                    Prazo de Inscrição:</span>
                    {{-- <span class="texto-formatacao">{{ date_format(date_create($data->edict->date_end), 'd/m/Y') }}
                        @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') > '0')
                            (em {{date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') }} dias)
                        @elseif(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') == '0')
                            Hoje é o ultimo dia
                        @endif
                    </span> --}}
                    <span class="texto-formatacao">Encerrado</span>
                </div>
                <br /><br />
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(!Session::get('user'))
                        <div class="botao-posicao">
                            <a href="{{route('login')}}"><button type="button" class="btn btn-danger">LOGIN</button></a>
                        </div>
                        @if($diff->format("%R%a") < 0)
                            <div class="botao-posicao">
                                <a href="{{route('form')}}"><button type="button" class="btn btn-danger">QUERO ME CADASTRAR</button></a>
                            </div>
                        @endif
                    @else
                        <div class="botao-posicao">
                            <a href="{{route('professorPersonalData')}}"><button type="button" class="btn btn-danger">PROSSEGUIR</button></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="float-right">
                    <a class="texto-formatacao" target="_blank" href="{{$data->link_disciplines}}" title="Confira aqui as disciplinas para este edital !"><i class="far fa-file-pdf"></i> Confira aqui as disciplinas para este edital</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
