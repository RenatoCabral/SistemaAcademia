<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php

include 'header.php';
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

?>
<div id="wrapper">

    <?php include 'sidebar.php';?>
    <?php include 'header-admin.php'; ?>


    <div class="container principal_tela_tabela">
        <?php

        include_once 'persistence/Daopessoa.php';

        ?>

        <h3 class="pager title_opLocalTreino">Lista de Pessoas</h3>

        <?php
        $listarpessoa = DaoPessoa::listarpessoa();
        if(!empty($listarpessoa)) {?>
        <div class="input-group"> <span class="input-group-addon">Busca</span>
            <input id="filter" type="text" class="form-control" placeholder="Pesquisar...">
        </div>
        <br>

        <div class="col-lg-12">
            <a class='btn btn-primary button-add-pessoa' href='./view/cadastropessoa.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>
        </div>
        <br>

        <table class="table table-striped">
            <thead>

            <tr>

                <th>Nome</th>
                <th>Endereco</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Data de Cadastro</th>
                <th>Foto</th>
                <th>Ações</th>

            </tr>
            </thead>
            <tbody class="searchable">

            <?php  foreach ((array)$listarpessoa as $lp) {
                /*echo "<tr><input type=\"hidden\" name=\"id\" class=\"id\" value=\"<?php echo $lp->getId(); ?>\"/>";*/
                echo "<tr><td>" .$lp->getNome()."</td>";
                echo "<td>" . $lp->getEndereco(). "</td>";
                echo "<td>" . $lp->getNumero(). "</td>";
                echo "<td>" . $lp->getComplemento(). "</td>";
                echo "<td>" . $lp->getBairro(). "</td>";
                echo "<td>" . $lp->getCidade(). "</td>";
                echo "<td>" . $lp->getEstado(). "</td>";
                echo "<td>" . $lp->getDataCadastro(). "</td>";
                echo "<td>" . $lp->getFoto(). "</td>";
                $newId = ($lp->getId());
                echo "<td>
                    <a href='tabelaPessoa.php?id=" . $newId . "&op=excluir'><button class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\" ></span>Excluir</button></a>
                    <a href='AlterarCadastroPessoa.php?id=" . $newId . "&op=atualizar'><button class='btn btn-info'><span class=\"glyphicon glyphicon-pencil\"></span>Editar</button></a>
                                 
                    </td>
                    
                    </tr>";

            }
            echo " </tbody></table>";
            }else{
                ?>
                <div class="jumbotron">
                    <h2>Atenção!</h2>
                    <p class="msg-jumbotron">Não existe usuários cadastrados no momento. Para efetuar o cadastro clique no botão Adicionar!</p>
                </div>

                <a class='btn btn-primary' href='./view/cadastropessoa.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>

                <?php
            }
            ?>

            <?php
            if (isset($_GET['op'])) {
                if ($_GET['op'] == 'excluir') {
                    if (DaoPessoa::delete($_GET['id'])) {

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
                        window.location.href = 'tabelaPessoa.php';
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
            <!--<a class='btn btn-primary' href='./view/CadastroPessoa.php'><span class="glyphicon glyphicon-plus"></span>Adicionar</a>-->


            <?php /*include 'CadastroLocalTreino.php'; */?>

            <?php include 'footer.php'; ?>
