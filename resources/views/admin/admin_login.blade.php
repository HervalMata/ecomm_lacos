<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laços fofos da Cris</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
    <link href="{{ asset('fonts/backend_fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="index.html">
        <div class="control-group normal_text"> <h3><img src="{{ asset('images/backend_images/logo.png') }}" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Nome do Usuário" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Senha" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Esqueceu a senha?</a></span>
            <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" > Entrar</a></span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Entre com seu endereço de e-mail abaixo e será enviado para você instruções para recuperação da senha.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Retornar para o login</a></span>
            <span class="pull-right"><a class="btn btn-info">Recuperar</a></span>
        </div>
    </form>
</div>

<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js//matrix.login.js') }}"></script>
</body>

</html>
