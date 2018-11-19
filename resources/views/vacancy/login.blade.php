<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Professores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style-login.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>
  <body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="{{ asset('img/safe_image.php.png')}}" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin"action="/process" method="get">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="usuario" class="form-control" placeholder="Usuário" required oninvalid="this.setCustomValidity('Digite o usuário')" onchange="try{setCustomValidity('')}catch(e){}">
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar-me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Logar</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Esqueceu sua senha?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>