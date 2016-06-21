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

    
   <div class="container-fluid">
       <div class="row">
               <div class="col-xs-6 col-md-4 div-fora">
                   <div class="div-dentro">
                       <h2><a href="view/CadastroPessoa.php">Cadastro de Pessoas</a></h2>
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
                   <h2><a href="funcoes-local-treino.php">Programas Marciais</a></h2>
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

<?php include 'footer.php';?>



