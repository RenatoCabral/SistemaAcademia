<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<?php

include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//include 'header.php';
//echo "Olá, " . $_SESSION['usuarioNome'];

include_once '../persistence/DaoTipoPrograma.php';
$tipoprograma = new TipoPrograma();
$alterar = false;

if(isset($_POST['Salvar'])) {

    $tipoprograma->setNome($_POST['nome']);
    if (DaoTipoPrograma::inserir($tipoprograma)) {

        $redirect = "cadastro-artes-marciais.php";
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

        $tipoprograma = DaoTipoPrograma::carregarDados($_GET['id']);
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

    <title>Cadastro de Pessoas</title>

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

            <form class="form-horizontal" name="formCadastro" method="post" action="cadastro-tipo-programa.php">
                <fieldset class="tela_cadastro">

                    <!-- Form Name -->
                    <legend class="title_cadPessoa">Cadastro de Tipos de Programas</legend>

                    <!-- Appended Input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="cadastro-artes-marciais.php" class="btn btn-default" name="voltar"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Nome</label>
                        <div class="col-md-6">
                            <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" required="" value="<?php echo $tipoprograma->getNome(); ?>"/>
                        </div>
                    </div>
                    <hr>
                    <!-- Button (Double) -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <a href="cadastro-artes-marciais.php" class="btn btn-danger" name="cancelar"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
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

