<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
//echo  "pagina do admin!";

//echo "Olá, " . $_SESSION['usuarioNome'];
?>

<div id="wrapper">

    <?php include 'sidebar.php'; ?>
    <?php include 'header-admin.php'; ?>

    <!-- Sidebar -->
    <!--<div id="sidebar-wrapper" class="admin-menu-lateral">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
   <!-- <div id="page-content-wrapper" class="admin-menu-superior">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>
                    <h1>Escolas de Artes Marciais</h1>
                    <p>Gerencie suas Academias de Artes Marciais</p>
                </div>
            </div>
        </div>
    </div>-->
    <!-- /#page-content-wrapper -->

    <div class="col-sm-6 col-md-4 admin-cad-escola">
        <div class="admin-title-escola">
            <a href="CadastrosAdmin.php" class="nome-escola">S.I.G.L.A - Nome da Escola de Artes Marciais</a>

        </div>

    </div>

</div>




<?php include ("footer.php");?>



