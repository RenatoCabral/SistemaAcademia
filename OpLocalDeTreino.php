<?php

include ("header.php");
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

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
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
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
                    <p>Gerencie suas Academias de Artes Marciais</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

<div class="container">
    <?php

    //include_once './aes.class.php';

    // $Key = "f37030f08c66f4b28b46b6c99608df5a";
    //echo AES:: keygen(AES::KEYGEN_256_BITS, "TESTE DE CHAVE PLW");

    //$aes = new AES($key);

    //error_reporting(0);
    //session_start();

    //include_once $_SERVER['DOCUMENT_ROOT'].'/studies/php/ifg/bancodedados/persistence/DaoUsuario.php';
    include_once 'persistence/DaoLocalDeTreino.php';

    if(isset($_GET['logout'])) {
        unset($_SESSION["usuario"]);

        if (!isset($_SESSION['usuario'])) {
            header('Location: cadastrar.php');
        } else {
            $localtreino = DaoLocalDeTreino::carregarDados(($_SESSION["usuario"]));
            if (isset($_GET['op'])) {
                if ($_GET['op'] == "excluir") {

                    if (DaoLocalDeTreino::excluir($_GET['id'])) {
                        ?>
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
    <!--<h3 class="page-header">Bem vindo(a)</h3>-->

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
            echo "<tr><td>" . utf8_decode($lt->getNome()) . "</td>";
            echo "<td>" . utf8_encode($lt->getEndereco()) . "</td>";
            echo "<td>" . utf8_encode($lt->getCidade()) . "</td>";
            echo "<td>" . utf8_encode($lt->getEstado()) . "</td>";
            $newId = base64_encode($lt->getId());
            echo "<td>
                    <a class='btn btn-danger' href='OpLocalDeTreino.php?id=" . $newId . "&op=excluir'>Excluir</a>
                     <a class='btn btn-primary'  data-toggle=\"modal\" data-target=\"#contact\" href='CadLocalTreino.php?id=" . $newId . "'>Alterar</a>
                      <a class='btn btn-default' data-toggle=\"modal\" data-target=\"#contact\" href='CadLocalTreino.php?id=" . $newId . "'>Cadastrar</a>
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
        
<!----------modal cadastro---------------->
        <div class="container">
            <div class="row">
                <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="panel-title" id="contactLabel">Cadastro de Locais de Treino</h4>
                            </div>
                            <form action="#" method="post" accept-charset="utf-8">
                                <div class="modal-body" style="padding: 5px;">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                            <input class="form-control" name="nome" id="nome" placeholder="Nome" type="text" required autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                            <input class="form-control" name="endereco" id="endereco" placeholder="Endereco" type="text" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                            Estado:
                                            <select name="estado">
                                                <option>Selecione</option>
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapa</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceara</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espirito Santo</option>
                                                <option value="GO">Goias</option>
                                                <option value="MA">Maranhao</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Para</option>
                                                <option value="PB">Paraiba</option>
                                                <option value="PR">Parana</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piaui</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondonia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">Sao Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <input class="form-control" name="cidade" id="cidade" placeholder="Cidade" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer" style="margin-bottom:-14px;">
                                    <input type="submit" class="btn btn-success" value="Salvar"/>
                                    <!--<span class="glyphicon glyphicon-ok"></span>-->
                                    <input type="reset" class="btn btn-danger" value="Limpar" />
                                    <!--<span class="glyphicon glyphicon-remove"></span>-->
                                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Fechar</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include ("footer.php");?>
