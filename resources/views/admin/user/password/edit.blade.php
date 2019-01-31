@extends('layouts.header')

@section('title')
    SENHA
@endsection

@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">    
@endsection

@section('content')
    @section('cabecalho')
        SENHA
    @endsection

    @section('username')
        {{ "Bem vindo, ". Session::get('user')['user'] }}
    @endsection

    <div class="container">

        <ul class="nav nav-tabs">
            <li class="enabled"><a href="{{route('admin/personal-data/edit', $user->id)}}">Dados Pessoais</a></li>
            <li class="enabled"><a href="{{route('admin/academic-data/edit', $user->id)}}">Dados Academicos</a></li>
            <li class="active"><a href="{{route('admin/password/edit', $user->id)}}">Senha</a></li>
        </ul>

        <input type="hidden" id="hidden-id" value="{{ $user->id }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="login-body">
                <article class="container-login center-block">
                    <section>
                        <ul id="top-bar" class="nav nav-tabs nav-justified">
                            <li><a href="#" >Editar Senha</a></li>
                        </ul>
                        <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                            <div id="msgFail"></div><div id="msgSuccess"></div>
                            <div id="login-access" class="tab-pane fade active in">
                                <h2 style="margin-top:0px;"><i class="fa fa-unlock"></i> Accesso</h2>
                                <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal">
                                    <div class="form-group ">
                                        <label for="old_password" >Digite sua Senha Antiga</label>
                                            <input type="password" class="form-control" name="old_password" id="old_password"
                                                placeholder="Digite sua Senha Antiga" tabindex="1" value="" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" >Digite uma Nova Senha</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Digite uma Nova Senha" value="" tabindex="2" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirm" >Confirme a nova Senha</label>
                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm"
                                                placeholder="Confirme a nova Senha" value="" tabindex="2" />
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button style="border:none;" type="button" name="log-me-in" id="submit" tabindex="5" >Confirmar alteração de Senha</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </article>
            </div>
        </div>

    </div>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{URL::asset('/js/admin/password.js')}}"></script>
@endsection
