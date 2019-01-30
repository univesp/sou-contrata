@extends('layouts.header')

@section('title')
    DADOS ACADÊMICOS
@endsection

@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
@endsection



@section('content')
    @section('cabecalho')
        DADOS ACADÊMICOS
    @endsection

    @section('username')
        {{ "Bem vindo, ". Session::get('user')['user'] }}
    @endsection
    {{--  {{dd($candidate, $scholarity[0], $scholarity[0]_type)}}  --}}
    <div class="container">
        <div id="msgFail"></div>

        <ul class="nav nav-tabs">
            <li class="enabled"><a href="{{route('admin/personal-data/edit', $user->id)}}">Dados Pessoais</a></li>
            <li class="enabled"><a href="{{route('admin/academic-data/edit', $user->id)}}">Dados Academicos</a></li>
            <li class="active"><a href="{{route('admin/password/edit', $user->id)}}">Senha</a></li>
        </ul>

       <form action="{{ route('admin/password/update', $id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="login-body">
                    <article class="container-login center-block">
                        <section>
                            <ul id="top-bar" class="nav nav-tabs nav-justified">
                                <li><a href="#">Esqueci minha Senha</a></li>
                            </ul>
                            <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                                <div id="login-access" class="tab-pane fade active in">
                                    <h2 style="margin-top:0px;"><i class="glyphicon glyphicon-log-in"></i> Accesso</h2>
                                    <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal">
                                        <div class="form-group ">
                                            <label for="login" >Digite sua Senha Antiga</label>
                                               <input type="text" class="form-control" name="login" id="login_value"
                                                    placeholder="Digite sua Senha Antiga" tabindex="1" value="" />
                                        </div>

                                        <div class="form-group ">
                                            <label for="password" >Digite uma Nova Senha</label>
                                                <input type="password" class="form-control" name="password" id="password"
                                                    placeholder="Digite uma Nova Senha" value="" tabindex="2" />
                                        </div>

                                        <div class="form-group ">
                                            <label for="password" >Confirme a nova Senha</label>
                                                <input type="password" class="form-control" name="password" id="password"
                                                    placeholder="Confirme a nova Senha" value="" tabindex="2" />
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                                <button style="border:none;" type="submit" name="log-me-in" id="submit" tabindex="5" >Confirmar alteração de Senha</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
        </form>

       </div>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{URL::asset('/js/admin/academic-data.js')}}"></script>
@endsection
