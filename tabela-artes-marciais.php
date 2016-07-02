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

        include_once 'persistence/DaoArtesMarciais.php';

        ?>

        <h3 class="pager title_opLocalTreino">Artes Marciais</h3>

        <?php
        $listarArtesMarciais = DaoArtesMaciais::listarArtesMarciais();
        if(!empty($listarArtesMarciais)) {?>
        <!--
        <div class="input-group"> <span class="input-group-addon">Busca</span>
            <input id="filter" type="text" class="form-control" placeholder="Pesquisar...">
        </div>-->

        <div class="col-lg-12 col-md-8 div-btn-add">
            <a class='btn btn-primary btn-add' title="Adicionar" href='./view/cadastro-artes-marciais.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>
        </div>
        <br>

        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nome - Arte Marcial</th>
                <th>Tipo de Programa</th>
                <th>Tipo de Graduação</th>
                <th>Cor da faixa,corda,bracelete...</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

            <?php  foreach ((array)$listarArtesMarciais as $lam) {
                echo "<tr><td>" . $lam->getNome() . "</td>";
                echo "<td>" . $lam->getTipodeprograma() . "</td>";
                echo "<td></td>";
                echo "<td></td>";
                $newId = ($lam->getId());
                echo "<td>
                    <a href='tabela-artes-marciais.php?id=" . $newId . "&op=excluir'><button class=\"btn btn-danger\" title='Excluir'><span class=\"glyphicon glyphicon-trash\" ></span>Excluir</button></a>
                    <a href='alterar-artes-marciais.php?id=" . $newId . "&op=atualizar'><button class='btn btn-info' title='Editar'><span class=\"glyphicon glyphicon-pencil\"></span>Editar</button></a>
                              
                  </td>
                    
                    </tr>";

            }
            echo " </tbody></table>";
            }else{
                ?>
                <div class="jumbotron">
                    <h2>Atenção!</h2>
                    <p class="msg-jumbotron">Não existe artes marciais cadastradas no momento. Para efetuar o cadastro clicar no botão Adicionar!</p>
                </div>

                <a class='btn btn-primary' href='./view/cadastro-artes-marciais.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>

                <?php
            }
            ?>

            <?php
            if (isset($_GET['op'])) {
                if ($_GET['op'] == 'excluir') {
                    if (DaoArtesMaciais::delete($_GET['id'])) {

                        ?>

                        <br><br>
                        <script>
                            swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file!",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Yes, delete it!",
                                    closeOnConfirm: false
                                },
                                function(){
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                    window.location.href = 'tabela-local-treino.php';
                                });
                        </script>

                        <?php
                    }
                    /*    echo 'excluido com sucesso';
                    } else {
                        echo 'Erro ao excluir';
                    }*/
                }

            }
            ?>


            <?php include 'footer.php'; ?>
