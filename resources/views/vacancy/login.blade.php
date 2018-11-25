@extends('layouts.header')
@section('title')
    Login de Acesso
@endsection
@section('css')
    <link href="css/style-login.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection
@section('content')



  <body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="{{ asset('img/safe_image.php.png')}}" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin"action="/login" method="post">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Digite o email')" onchange="try{setCustomValidity('')}catch(e){}">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar-me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Logar</button>
            </form>
            <a href="#" class="forgot-password">
                Esqueceu sua senha?
            </a>
        </div>
    </div>
@endsection
