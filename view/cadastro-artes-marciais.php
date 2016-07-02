<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<?php

include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//include 'header.php';
//echo "Olá, " . $_SESSION['usuarioNome'];

include_once '../persistence/DaoArtesMarciais.php';
include_once '../persistence/DaoTipoPrograma.php';
$artesmarciais = new ArtesMarciais();
$alterar = false;
$lista_tipoprograma = DaoTipoPrograma::listarTipoPrograma();

if(isset($_POST['Salvar'])) {

    $artesmarciais->setNome($_POST['nome']);
    $artesmarciais->getTipodeprograma()->setId($_POST['tipoprograma']);
    if (DaoArtesMaciais::inserir($artesmarciais)) {

        $redirect = "../tabela-artes-marciais.php";
        header("location: $redirect");

        ?>
<!--
        <br/><br/>
        <script>
            swal({
                    title: "Cadastro feito com sucesso!",
                    text: "Você será redirecionado para a página principal, para acessar clicar em Entrar!",
                    timer: 3000,
                    showConfirmButton: false
                },
                function(){
                    window.location.href = '../tabelaPessoa.php';
                });
        </script>
-->
        <?php
    }
}
if (isset($_GET)){
    if (isset($_GET['op'])== 'atualizar'){
        $alterar = true;

        $artesmarciais = DaoArtesMaciais::carregarDados($_GET['id']);
        /*echo "alterado";*/
    }
}
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de artes marciais</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/modern-business.css">
    <link rel="stylesheet" href="../css/simple-sidebar.css">
    <link rel="stylesheet" href="../css/sweetalert.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


</head>

<body>

<div id="wrapper">

    <?php include '../sidebar.php';?>
    <?php include '../header-admin.php'; ?>

    <div class="container">

        <div class="row">

            <form class="form-horizontal" name="formCadastro" method="post" action="cadastro-artes-marciais.php">
                <fieldset class="tela_cadastro">

                    <!-- Form Name -->
                    <legend class="title_cadPessoa">Cadastro de Artes Marciais</legend>

                    <!-- Appended Input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="../tabela-artes-marciais.php" class="btn btn-default" name="voltar"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Nome</label>
                        <div class="col-md-6">
                            <input id="nome" name="nome" type="text" placeholder="nome da arte marcial" class="form-control input-md"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tipoprograma" class="col-md-4 control-label label-cad-tipoprograma">Tipo de Programa</label>
                        <?php
                        echo "<select class='form-select' name='tipoprograma'>";
                        echo "<option>Selecione</option>";


                        foreach ($lista_tipoprograma as $tp){
                            if ($artesmarciais->getTipodeprograma()->getId() == $tp->getId()){
                                echo "<option value='".$tp->getId()."' selected>".$tp->getNome()."</option>";
                            }else{
                                echo "<option value='".$tp->getId()."'>".$tp->getNome()."</option>";
                            }
                        }

                        echo "</select>";
                        echo "<a href='cadastro-tipo-programa.php'><button type='button' value='Adicionar' class='btn btn-primary'><span class=\"glyphicon glyphicon-plus\"></span></button></a>";

                        ?>
                    </div>

                    <div class="form-group">
                        <label for="tipodegraduacao" class="col-md-4 control-label label-cad-tipoprograma">Tipo de Graduação</label>

                        <?php
                        echo "<select class='form-select' name='tipodegraduacao'>";
                        echo "<option>Selecione</option>";


                        foreach ($lista_tipoprograma as $tp){
                            if ($artesmarciais->getTipodeprograma()->getId() == $tp->getId()){
                                echo "<option value='".$tp->getId()."' selected>".$tp->getNome()."</option>";
                            }else{
                                echo "<option value='".$tp->getId()."'>".$tp->getNome()."</option>";
                            }
                        }

                        echo "</select>";
                        echo "<button type='button' value='Adicionar' class='btn btn-primary'><span class=\"glyphicon glyphicon-plus\"></span></button>";

                        ?>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Cor principal</label>
                        <div class="col-md-2">
                            <input id="nome" name="nome" type="color" placeholder="cor principal" class="form-control input-md"/>

                        </div>

                        <label class="col-md-2 control-label" for="nome">Cor secundária(detalhe)</label>
                        <div class="col-md-2">
                            <input id="nome" name="nome" type="color" placeholder="cor secundária" class="form-control input-md"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Tempo minimo de permanência</label>
                        <div class="col-md-4">
                            <input id="nome" name="nome" type="text" placeholder="valor em dias..." class="form-control input-md"/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Tempo máximo de permanência</label>
                        <div class="col-md-4">
                            <input id="nome" name="nome" type="text" placeholder="valor em dias..." class="form-control input-md"/>

                        </div>
                    </div>

                    <hr>
                    <!--botoes-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="../tabela-artes-marciais.php" class="btn btn-danger" name="cancelar"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                            <button id="salvar" name="Salvar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span>Salvar</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

    <script src="../js/jquery-2.2.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>


    <!-- Script to Activate the Carousel -->

    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })


        <!--busca-->

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

        <!-- Menu Toggle Script -->

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>

