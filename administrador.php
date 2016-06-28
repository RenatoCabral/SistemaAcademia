<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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


    <div class="col-sm-7 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <a class='btn btn-default' href='CadastroLocalTreino.php'><span class="glyphicon glyphicon-pencil"></span>Editar</a>
            <a class="title-qtd-pessoas" href="CadastrosAdmin.php">S.I.G.L.A - Nome da Escola de Artes Marciais</a>
            <form action="" class="form-painel-escola">
                <label class="label-painel" for="">S.I.G.L.A</label>
                <input type="text" name="sigla" id="sigla" class="form-control input-md" placeholder="S.I.G.L.A">
                <label class="label-painel" for="">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control input-md" placeholder="Nome">
            </form>

        </div>
    </div>

    <div class="col-sm-6 col-md-2 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <h2><a class="title-qtd-pessoas" href="tabelaPessoa.php">Pessoas cadastradas</a></h2>
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
            <h2><a class="title-qtd-pessoas" href="tabela-local-treino.php">Locais de treino cadastrados</a></h2>
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



