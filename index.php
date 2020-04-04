<?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];

        switch($msg){
            case 1:
            ?>
                <div class="message">
                    <div class="alert alert-danger" style="margin-bottom: 0px;" id="alert">
                        <a href="index.php" class="close" data-dismiss="alert">&times</a>
                        Usuário ou Senha errados tente outra vez. Somente usuários cadastrados.
                    </div>
                </div>
            <?php
            break;
            case 2:
            ?>
                <div class="message">
                    <div class="alert alert-danger" style="margin-bottom: 0px;" id="alert">
                        <a href="index.php" class="close" data-dismiss="alert">&times</a>
                        Você não tem permissão para acessar esta página ou sua sessão expirou.
                    </div>
                </div>
            <?php
            break;
            case 3:
            ?>
                <div class="message">
                    <div class="alert alert-success" style="margin-bottom: 0px;" id="alert">
                        <a href="index.php" class="close" data-dismiss="alert">&times</a>
                        Logout realizado com sucesso.
                    </div>
                </div>
            <?php
            break;
            case 4:
            ?>
                <div class="message">
                    <div class="alert alert-info" style="margin-bottom: 0px;">
                        <strong style="display: inline-block;">Primeiro Acesso. Senha nova.</strong>&nbsp<p style="display: inline-block;">Por segurança, vamos criar uma nova senha, preencha os campos:</p>&nbsp
                        <form action="primeiro_login.php" method="post" role="form" class="form-login" style="display: inline-block;">
                            <input style="display: inline-block;" name="user" placeholder="Seu Usuário"  required/>
                            <input style="display: inline-block;" name="pwd1" placeholder="Nova Senha" type="password" required/> 
                            <input style="display: inline-block;" name="pwd2" placeholder="Repetir Nova Senha" type="password" required/>
                            <button type="submit" class="btn btn-default">Alterar</button>
                        </form>
                    </div>
                </div>
            <?php
            break;
            case 5:
            ?>
                <div class="message">
                    <div class="alert alert-success" style="margin-bottom: 0px;" id="alert">
                        <a href="index.php" class="close" data-dismiss="alert">&times</a>
                        Senha alterada com sucesso, liberado pra fazer login.
                    </div>
                </div>
            <?php
            break;
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="cover">
            <div class="background-image-fixed cover-image bg-index"></div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="#"><img src="assets/images/logo.png" class="center-block img-responsive"></a>
                        <p class="color">Seja bem vindo! Faça seu login.</p>

                        <form action="src/includes/AutenticaLogin.php" method="post" role="form" class="form-login">
                            <div class="form-group has-feedback alinhamento" id="ph-login">
                                <input class="form-control input-lg placeholder" id="inputUser" name="inputUser" placeholder="Usuário" type="text">
                            </div>
                            <div class="form-group alinhamento placeholder">
                                <input class="form-control input-lg" id="inputPassword" name="inputPassword" placeholder="Senha" type="password">
                            </div>
                            <button type="submit" class="btn btn-default btn-lg">Logar<i class="fa fa-fw fa-chevron-circle-right"></i></button>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#alert").fadeTo(5500, 500).slideUp(500, function(){
                $("#alert").slideUp(500);
            });
        </script>
    </body>
</html>