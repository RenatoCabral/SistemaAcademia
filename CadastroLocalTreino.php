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

        <form class="form-horizontal" name="formCadastro" method="post">
            <fieldset class="tela_cadastro">

                <!-- Form Name -->
                <legend class="title_cadUser">Cadastro Local de Treino</legend>

                <!-- Appended Input-->

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

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <label class="col-md-4 control-label" for="estado">Estado:</label>
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

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cidade">Cidade</label>
                    <div class="col-md-6">
                        <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">

                        <!--<button  href="index.html" id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>-->
                        <a href="funcoes-local-treino.php" class="btn btn-danger" name="cancelar">Cancelar</a>
                        <button id="salvar" name="Salvar" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

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
    $localtreino->setCidade($_POST['cidade']);
    $localtreino->setEstado($_POST['estado']);
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
                    window.location.href = 'funcoes-local-treino.php';
                });
        </script>
        <?php
    }
}
?>


