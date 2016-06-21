<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<?php

include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//include 'header.php';
//echo "Olá, " . $_SESSION['usuarioNome'];

include_once '../persistence/DaoPessoa.php';
$pessoa = new Pessoa();
$alterar = false;
if(isset($_POST['Salvar'])) {

    $pessoa->setFoto($_POST['foto']);
    $pessoa->setNome($_POST['nome']);
    $pessoa->setEndereco($_POST['endereco']);
    $pessoa->setNumero($_POST['numero']);
    $pessoa->setBairro($_POST['bairro']);
    $pessoa->setComplemento($_POST['complemento']);
    $pessoa->setCidade($_POST['cidade']);
    $pessoa->setEstado($_POST['estado']);
    $pessoa->setDataCadastro($_POST['data_cadastro']);
    if (DaoPessoa::inserir($pessoa)) {

        $redirect = "../tabelaPessoa.php";
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

        $pessoa = DaoPessoa::carregarDados($_GET['id']);
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

    <title>Sistema Acadêmia</title>

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

            <form class="form-horizontal" name="formCadastro" method="post">
                <fieldset class="tela_cadastro">

                    <!-- Form Name -->
                    <legend class="title_cadPessoa">Cadastro de Pessoas</legend>

                    <!-- Appended Input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="../tabelaPessoa.php" class="btn btn-default" name="voltar"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="foto">Foto</label>
                        <div class="col-md-6">
                            <input id="foto" name="foto" type="file" placeholder="Foto" class="form-control input-md" value="<?php echo $pessoa->getFoto(); ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Nome</label>
                        <div class="col-md-6">
                            <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" value="<?php echo $pessoa->getNome(); ?>"/>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="endereco">Endereço</label>
                        <div class="col-md-6">
                            <input id="endereco" name="endereco" type="text" placeholder="endereço" class="form-control input-md" value="<?php echo $pessoa->getEndereco(); ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="numero">Número</label>
                        <div class="col-md-2">
                            <input id="numero" name="numero" type="text" placeholder="número" class="form-control input-md" value="<?php echo $pessoa->getNumero(); ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="bairro">Bairro</label>
                        <div class="col-md-6">
                            <input id="bairro" name="bairro" type="text" placeholder="bairro" class="form-control input-md" value="<?php echo $pessoa->getBairro(); ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="complemento">Complemento</label>
                        <div class="col-md-6">
                            <input id="complemento" name="complemento" type="text" placeholder="complemento" class="form-control input-md" value="<?php echo $pessoa->getComplemento(); ?>"/>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <label class="col-md-4 control-label" for="estado">Estado:</label>
                            <select name="estado" id="appearance-select">
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

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cidade">Cidade</label>
                        <div class="col-md-6">
                            <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required="" value="<?php echo $pessoa->getCidade(); ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="data_cadastro">Data Cadastro</label>
                        <div class="col-md-6">
                            <input id="data_cadastro" name="data_cadastro" type="date" placeholder="data cadastro" class="form-control input-md" required="" value="<?php echo $pessoa->getDataCadastro(); ?>"/>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <a href="../tabelaPessoa.php" class="btn btn-danger" name="cancelar"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                            <button id="salvar" name="Salvar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span>Salvar</button>
                        </div>
                    </div>
                    <hr>

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


<?php
/*
    include_once '../persistence/DaoPessoa.php';
    $pessoa = new Pessoa();
    $alterar = false;
        if(isset($_POST['Salvar'])) {

            $pessoa->setFoto($_POST['foto']);
            $pessoa->setNome($_POST['nome']);
            $pessoa->setEndereco($_POST['endereco']);
            $pessoa->setNumero($_POST['numero']);
            $pessoa->setBairro($_POST['bairro']);
            $pessoa->setComplemento($_POST['complemento']);
            $pessoa->setCidade($_POST['cidade']);
            $pessoa->setEstado($_POST['estado']);
            $pessoa->setDataCadastro($_POST['data_cadastro']);
            if (DaoPessoa::inserir($pessoa)) {


                ?>
                <br/><br/>
                <script>
                    swal({
                            title: "Cadastro feito com sucesso!",
                            /*text: "Você será redirecionado para a página principal, para acessar clicar em Entrar!",*/
/*                            timer: 1000,
                            showConfirmButton: false
                        },
                        function(){
                            //*window.location.href = 'funcoes-local-treino.php';*/
 /*                           window.location.href = 'CadastroPessoa.php';
                        });
                </script>
                <?php
            }
        }
        if (isset($_GET)){
            if (isset($_GET['op'])== 'atualizar'){
                $alterar = true;

                $pessoa = DaoPessoa::carregarDados($_GET['id']);
                /*echo "alterado";*/
            //}
       // }
    ?>


