<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
//echo  "pagina do admin!";

//echo "Olá, " . $_SESSION['usuarioNome'];

include_once 'persistence/DaoEscola.php';

?>

<div id="wrapper">

    <?php include 'sidebar.php'; ?>
    <?php include 'header-admin.php'; ?>


    <div class="col-sm-6 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <div>
                <!--<a href='altera-escola.php?id=" . $newId . "&op=atualizar'><button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>Editar</button></a>-->

                <a class="title-qtd-pessoas">Informações da Escola</a>
            </div>

            <?php
            $listarescola = DaoEscola::listarEscola();
            if (!empty($listarescola)){
                foreach ((array)$listarescola as $le){
                    $newId = ($le->getId());
                   echo "<a href='altera-escola.php?id=\" . $newId . \"&op=atualizar'><button class=\"btn btn-default\"><span class=\"glyphicon glyphicon-pencil\"></span>Editar</button></a>";

                }

            }
            ?>
            <div class="div-painel-table-escola">
                <table class="table table-striped table-painel-escola">
                    <tbody class="tbody-painel-escola">
                        <tr>
                            <td>Sigla:</td>
                            <?php  echo "<td>" .utf8_decode($le->getSigla()). "</td>"?>
                        </tr>
                        <tr>
                            <td>Nome:</td>
                            <?php  echo "<td>" .utf8_decode($le->getNome()). "</td>"?>
                        </tr>
                    </tbody>

                </table>
            </div>

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

    <div class="col-sm-6 col-md-2 admin-cad-escola">
        <div class="col-sm-12 div-interna-qtd">
            <h2><a class="title-qtd-pessoas" href="tabela-artes-marciais.php">Artes Marciais</a></h2>
        </div>
        <div class=" col-sm-12 painel_qtd">
            <?php
                $con=mysqli_connect("localhost","root","", "sistema_academia");
                $sql = mysqli_query($con, "SELECT *FROM artesmarciais");
                $total = mysqli_num_rows($sql);
                echo "<p class='vlr_qtd'> $total </p>";
            ?>
        </div>
    </div>

</div>








<?php include ("footer.php");?>



