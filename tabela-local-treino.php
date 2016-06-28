<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

?>
<div id="wrapper">

  <?php include 'sidebar.php';?>
   <?php include 'header-admin.php'; ?>


<div class="container principal_tela_tabela">
    <?php

    include_once 'persistence/DaoLocalDeTreino.php';

    ?>

    <h3 class="pager title_opLocalTreino">Locais de Treino</h3>

    <?php
    $listarLocalTreino = DaoLocalDeTreino::listarLocalTreino();
    if(!empty($listarLocalTreino)) {?>
    <div class="input-group"> <span class="input-group-addon">Busca</span>
        <input id="filter" type="text" class="form-control" placeholder="Pesquisar...">
    </div>

    <div class="col-lg-12">
        <a class='btn btn-primary button-add-local-treino' href='CadastroLocalTreino.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>
    </div>
    <br>

    <table class="table table-striped">
        <thead>
        <tr>
            
            <th>Nome</th>
            <th>Endereco</th>
            <!--<th>Cidade</th>
            <th>Estado</th>-->
            <th>Ações</th>
        </tr>
        </thead>
        <tbody class="searchable">

        <?php  foreach ((array)$listarLocalTreino as $lt) {

            echo "<tr><td>" .utf8_decode($lt->getNome()) ."</td>";
            echo "<td>" . utf8_decode($lt->getEndereco()) . "</td>";
            /*echo "<td>" . utf8_decode($lt->getCidade()) . "</td>";
            echo "<td>" . utf8_decode($lt->getEstado()) . "</td>";*/
            $newId = ($lt->getId());

            echo "<td>
                    <!--<a class='btn btn-danger' href='tabela-local-treino.php?id=". $newId . "&op=excluir'>Excluir</a>-->
                    <!--<a class='btn btn-primary'  href='FormAlteraLocalTreino.php?id=/*" .$newId. "'*/>Editar</a>-->
                    <a href='tabela-local-treino?id=" . $newId . "&op=excluir'><button class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\" ></span>Excluir</button></a>
                    <a href='altera-local-treino.php?id=" . $newId . "&op=atualizar'><button class='btn btn-info'><span class=\"glyphicon glyphicon-pencil\"></span>Editar</button></a>
                              
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

            <a class='btn btn-primary' href='CadastroLocalTreino.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>

            <?php
        }
        ?>

        <?php include 'CadastroLocalTreino.php'; ?>

        <?php include 'FormAlteraLocalTreino.php'; ?>


<?php include 'footer.php'; ?>
