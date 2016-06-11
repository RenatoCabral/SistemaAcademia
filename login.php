<?php
include 'header.php'; ?>

<!--<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudo</title>
    <!--<script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="_css/sweetalert.css"/>
</head>
<body>-->


<div style="display: block; margin: 0 auto; background:#337ab7; padding: 10px">
    <a style="text-align:center; display: block; color: #fff" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <form method="post" action="valida.php">
                <input required type="text" name="usuario" placeholder="Usuário" maxlength="50"/>
                <input required type="password" name="senha" maxlength="50"/>
                <input type="submit" name="login" class="login loginmodal-submit" value="Login"/>
            </form>

            <div class="login-help">
                <a href="#">Registrar</a> - <a href="#">Esqueceu a Senha</a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!--
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>-->


