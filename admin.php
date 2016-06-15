<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
echo  "pagina do admin!";

echo "Olá, " . $_SESSION['usuarioNome'];
?>

<!--<a href="login/deslogar.php" >Logout</a>

<nav class="navbar navbar-inverse navbar-fixed-top menu" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
         <!--Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="index.html">Cadas</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Entrar</a></li>
                <li><a href="contact.html">Contato</a></li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<?php include ("footer.php");?>



