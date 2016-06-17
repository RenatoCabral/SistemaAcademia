<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

?>
<div id="wrapper">

  <?php include 'sidebar.php';?>
   <?php include 'header-admin.php'; ?>

<div class="container">
    <?php

    include_once 'persistence/DaoLocalDeTreino.php';

    if(isset($_GET['logout'])) {
        unset($_SESSION["localtreino"]);

        if (!isset($_SESSION['localtreino'])) {
        } else {
            $localtreino = DaoLocalDeTreino::carregarDados(($_SESSION["localtreino"]));
            if (isset($_GET['op'])) {
                if ($_GET['op'] == "excluir") {

                    if (DaoLocalDeTreino::excluir($_GET['id'])) {
                        ?>

                        <script>
                            swal({
                                    title: "Excluido",
                                    text: "Usuário excluido!",
                                    type: "success"
                                },
                                function () {
                                    window.location.href = 'OpLocalDeTreino.php';
                                });
                        </script>
                        <?php
                    }
                }
            }
        }
    }
    ?>

    <h3 class="pager title_opLocalTreino">Locais de Treino</h3>

    <?php
    $listarLocalTreino = DaoLocalDeTreino::listarLocalTreino();
    if(!empty($listarLocalTreino)) {?>
    <div class="input-group"> <span class="input-group-addon">Busca</span>
        <input id="filter" type="text" class="form-control" placeholder="Pesquisar...">
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody class="searchable">

        <?php  foreach ((array)$listarLocalTreino as $lt) {
            $newId = $lt->getId();
            echo "<tr><td>ID:  ". $newId." - ".  utf8_decode($lt->getNome()) . "</td>";
            echo "<td>" . utf8_decode($lt->getEndereco()) . "</td>";
            echo "<td>" . utf8_decode($lt->getCidade()) . "</td>";
            echo "<td>" . utf8_decode($lt->getEstado()) . "</td>";

            echo "<td>
                    <a class='btn btn-danger' href='OpLocalDeTreino.php?id=" . $newId . "&op=excluir'>Excluir</a>
                     <a class='btn btn-primary'  data-toggle=\"modal\" data-target=\"#alterar\" href='#?id={$newId}'>Alterar</a>
                     <!--<a class='btn btn-default' data-toggle=\"modal\" data-target=\"#contact\" href='CadastroLocalTreino'>Cadastrar</a>-->
         
                    </td>
                    
                    </tr>";

        }
        echo " </tbody></table>";
        }else{
            ?>
            <div class="jumbotron">
                <h2>Atenção!</h2>
                <p>Não existe usuários cadastrados no momento. Para efetuar o cadastro clique no botão Cadastre-se!</p>
            </div>

            <?php
        }
        ?>
        <a class='btn btn-default' data-toggle="modal" data-target="#cadastro" href='CadastroLocalTreino.php'>Cadastrar</a>

        <?php include 'modal-cadastro-local-treino.php'; ?>

        <?php include 'modal-altera-local-treino.php'; ?>


<?php include ("footer.php");?>
