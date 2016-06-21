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

    /*if(isset($_GET['logout'])) {
       unset($_SESSION["usuario"]);

        if (!isset($_SESSION['usuario'])) {
            header('Location:index.html');
        } else {

            $localtreino = DaoLocalDeTreino::carregarDados(($_SESSION["localdetreino"]));
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
                                    window.location.href = 'funcoes-local-treino.php';
                                });
                        </script>
                        <?php
                    }
                }
            }
        }
    }
    */

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

            echo "<tr><td>" .utf8_decode($lt->getNome()) ."</td>";
            echo "<td>" . utf8_decode($lt->getEndereco()) . "</td>";
            echo "<td>" . utf8_decode($lt->getCidade()) . "</td>";
            echo "<td>" . utf8_decode($lt->getEstado()) . "</td>";
            $newId = ($lt->getId());

            echo "<td>
                    <a class='btn btn-danger' href='funcoes-local-treino.php?id=" . $newId . "&op=excluir'>Excluir</a>
                     <a class='btn btn-primary'  href='FormAlteraLocalTreino.php?id=" .$newId. "'>Editar</a>
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
        <a class='btn btn-default' href='CadastroLocalTreino.php'>Cadastrar</a>

        <?php include 'CadastroLocalTreino.php'; ?>

        <?php include 'FormAlteraLocalTreino.php'; ?>


<?php include 'footer.php'; ?>