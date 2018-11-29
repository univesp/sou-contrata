<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>LOGIN</title>
	<link href="css/style-login.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body class="login">
    <header>
		<div class="container">
			<a class="logo" href="#">
				<img class="img-responsive" alt="" src="../img/logo-univesp.png">
			</a>
			<div class="clearfix"></div>
		</div>
	</header>

<main class="centeredContent block">
	<div class="centered">


<section id="login">
	<div class="container">
		<div class="loginBox">
			<img class="logo" alt="#SOU" src="../img/logo-sou2.png">
			<div class="login-header">
				<h1>Sistema Operacional Univesp</h1>
				<h2>Login</h2>
			</div>
            <form name="form" action="login" method="post">
                {{ csrf_field() }}
				<div class="step stepUsername" style="display: block;">
					<div class="form-group">
                    <input type="email" id="email" name="email" class="form-control"  required oninvalid="this.setCustomValidity('Digite o email')" onchange="try{setCustomValidity('')}catch(e){}">
						<label class="form-control-placeholder" for="username">Usuário</label>
					</div>
					<div class="step-footer">
						<a href="">Esqueci minha senha</a>
						<button class="btn-red btn-danger" type="button">Próxima</button>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="step stepPassword">
					<div class="form-group">
                    <input type="password" id="inputPassword" name="password" class="form-control" required>
						<label class="form-control-placeholder" for="password">Senha</label>
						<button class="showPassword" type="button">
							<i class="material-icons show">visibility</i>
							<i class="material-icons hide">visibility_off</i>
						</button>
					</div>
					<div class="step-footer">
						<a href="" target="_blank">Esqueci minha senha</a>
						<button class="btn-red btn-danger" id="btnSubmit" type="submit">Enviar</button>
						<div class="clearfix"></div>
					</div>
				</div>
				<input name="AuthState" type="hidden" value="">
			</form>
		</div>
	</div>
</section>

	<!-- #content -->
</div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$("#email").focus();
	$("#password").focus();
    $("#btnSubmit").click(function(){
        $("#btnSubmit").submit();
    })
var login = (function() {
    return {
        vars: {
            windowWidth: $(window).width(),
            mobile: ( $(window).width() > 768 ) ? false : true,
        },
        init: function() {
            this.initFeatures();
        },
        initFeatures: function() {
            var that = this;

            $('.stepUsername button').click(function() {
                $('.stepUsername').hide();
                $('.stepPassword').fadeIn();
            });

            $('.showPassword').click(function() {
                if( !$(this).hasClass('active') ) {
                    $('input#password').prop('type', 'text').addClass('active');
                } else {
                    $('input#password').prop('type', 'password').removeClass('active');
                }
                $(this).toggleClass('active');
            });

            $('form').submit(function(e) {
                if($(this).is('[action="login"]')) return true;
                if( $('.stepUsername').is(':visible') ) {
                    $('.stepUsername').hide();
                    $('.stepPassword').fadeIn();
                  /*return false; */  
                  window.location.href = "/login";
                }
                if( !$('#email').val() || !$('#password').val() ) return false;
            });

        },
    }
})();

login.init();
});
</script>