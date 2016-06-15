<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
//echo  "pagina do admin!";

//echo "Olá, " . $_SESSION['usuarioNome'];
?>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="admin-menu-lateral">
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
                <a href="administrador.php">Administrativo</a>
            </li>
            <li>
                <a href="index.html">Sair</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="admin-menu-superior">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>
                    <h1>Escolas de Artes Marciais</h1>
                    <p>Página Principal - Cadastros</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->


   <div class="container-fluid">
       <div class="row">
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2>Cadastro de Alunos</h2>
                   </div>

               </div>

           <div>
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2>Cadastro de professores</h2>
                   </div>

               </div>
           </div>

           <div>
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2>Cadastro da Escola</h2>
                   </div>

               </div>
           </div>
           <div class="col-xs-6 col-md-4 div-fora">
               <div class="div-dentro">
                   <h2><a href="OpLocalDeTreino.php">Cadastro de Locais de Treino</a></h2>
               </div>

           </div>

           <div>
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2>Cadastro de Programas de Lutas</h2>
                   </div>

               </div>
           </div>

           <div>
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2>Cadastro de Turmas</h2>
                   </div>

               </div>
           </div>

       </div>
   </div>

<?php include ("footer.php");?>



