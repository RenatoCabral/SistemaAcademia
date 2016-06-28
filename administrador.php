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


    <div class="col-sm-6 col-md-4 admin-cad-escola">
        <div class="admin-title-escola">
            <a href="CadastrosAdmin.php" class="nome-escola">S.I.G.L.A - Nome da Escola de Artes Marciais</a>
        </div>
    </div>

    <div class="col-sm-6 col-md-2 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <h2><a class="title-qtd-pessoas" href="tabelaPessoa.php">Quantidade de pessoas cadastradas</a></h2>
        </div>

        <div class=" col-sm-12 painel_qtd">
            <?php
                $con=mysqli_connect("localhost","root","", "sistema_academia");
                $sql = mysqli_query($con, "SELECT *FROM pessoa");
                $total = mysqli_num_rows($sql);
                echo "<p class='vlr_qtd'> $total </p>";
            ?>
        </div>
    </div>

    <div class="col-sm-6 col-md-2 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <h2 class="title-qtd-pessoas">Quantidade de locais de treino</h2>
        </div>

        <div class=" col-sm-12 painel_qtd">
            <?php
                $con=mysqli_connect("localhost","root","", "sistema_academia");
                $sql = mysqli_query($con, "SELECT *FROM localdetreino");
                $total = mysqli_num_rows($sql);
            echo "<p class='vlr_qtd'> $total </p>";
            ?>
        </div>
    </div>

</div>




<?php include ("footer.php");?>



