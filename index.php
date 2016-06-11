<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

include 'header.php';
echo "Olá, " . $_SESSION['usuarioNome'];


?>
<a href="logout.php" >Logout</a>
<div class="container">
    <div class="row">
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Cadastro de usuário</legend>

                <!-- Appended Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="matricula">Matricula</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input id="matricula" name="matricula" class="form-control" placeholder="matricula" type="text" required="">
                            <span class="input-group-addon">Pesquisar</span>
                        </div>
                        <p class="help-block">(digite a sua matricula da SEMEC)</p>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="fullname">Nome</label>
                    <div class="col-md-6">
                        <input id="fullname" name="fullname" type="text" placeholder="seu nome" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cpf">CPF</label>
                    <div class="col-md-6">
                        <input id="cpf" name="cpf" type="text" placeholder="seu CPF" class="form-control input-md">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Senha</label>
                    <div class="col-md-6">
                        <input id="password" name="password" type="password" placeholder="senha" class="form-control input-md" required="">
                        <span class="help-block">(crie uma senha)</span>
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="confirmpassword">Confirmar senha</label>
                    <div class="col-md-6">
                        <input id="confirmpassword" name="confirmpassword" type="password" placeholder="senha" class="form-control input-md" required="">
                        <span class="help-block">(Confirme sua senha)</span>
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rad">Tipo de usuário</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label for="rad-0">
                                <input type="radio" name="rad" id="rad-0" value="1" checked="checked">
                                Operador
                            </label>
                        </div>
                        <div class="radio">
                            <label for="rad-1">
                                <input type="radio" name="rad" id="rad-1" value="2">
                                Administrador
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-success">Cadastrar</button>
                        <button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
                        <a href="teste.php" class="btn btn-primary">Teste</a>
                        <a href='deslogar.php' class='btn btn-danger'>Deslogar</a>

                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>
<?php
if (isset($_SESSION['usuario']) OR isset($_SESSION['senha'])){
    echo "<a href='deslogar.php' class='btn btn-primary'>Deslogar</a>";
    echo "<a href='deslogar.php' class='btn btn-danger'>Deslogar</a>";
}

?>

<?php include 'footer.php'; ?>
