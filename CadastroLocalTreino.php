<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//include 'header.php';
//echo "Olá, " . $_SESSION['usuarioNome'];

include 'header.php';


?>

<div id="wrapper">

    <?php include 'sidebar.php';?>
    <?php include 'header-admin.php'; ?>

<div class="container">

    <div class="row">

        <form class="form-horizontal" name="formCadastro" method="post" action="CadastroLocalTreino.php">
            <fieldset class="tela_cadastro">

                <!-- Form Name -->
                <legend class="title_cadUser">Cadastro Local de Treino</legend>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="tabela-local-treino.php" class="btn btn-default" name="voltar"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Descrição</label>
                    <div class="col-md-6">
                        <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Endereço</label>
                    <div class="col-md-6">
                        <input id="endereco" name="endereco" type="text" placeholder="endereço" class="form-control input-md">

                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-8">
                        <a href="tabela-local-treino.php" class="btn btn-danger" name="cancelar"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
                        <button id="salvar" name="Salvar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span>Salvar</button>
                    </div>
                </div>
                <hr>

            </fieldset>
        </form>

    </div>
</div>

<?php include 'footer.php';


include_once 'persistence/DaoLocalDeTreino.php';

if(isset($_POST['Salvar'])) {
    $localtreino = new LocalTreino();
    $localtreino->setNome($_POST['nome']);
    $localtreino->setEndereco($_POST['endereco']);
    if (DaoLocalDeTreino::inserir($localtreino)) {


        ?>
        <br/><br/>
        <script>
            swal({
                    title: "Cadastro feito com sucesso!",
                    /*text: "Você será redirecionado para a página principal, para acessar clicar em Entrar!",*/
                    timer: 1000,
                    showConfirmButton: false
                },
                function(){
                    window.location.href = 'tabela-local-treino.php';
                });
        </script>
        <?php
    }
}
?>


