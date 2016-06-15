<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

//include 'header.php';
//echo "Olá, " . $_SESSION['usuarioNome'];

include ("header.php");
?>

<div class="container">
    <div class="row">
        <form class="form-horizontal" name="formCadastro" method="post">
            <fieldset class="tela_cadastro">

                <!-- Form Name -->
                <legend class="title_cadUser">Cadastro de usuário</legend>

                <!-- Appended Input-->

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome</label>
                    <div class="col-md-6">
                        <input id="nome" name="nome" type="text" placeholder="seu nome" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" name="email" type="text" placeholder="seu e-mail" class="form-control input-md">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="usuario">Usuário</label>
                    <div class="col-md-6">
                        <input id="usuario" name="usuario" type="text" placeholder="Usuário" class="form-control input-md">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">Senha</label>
                    <div class="col-md-6">
                        <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
                        <span class="help-block">(crie uma senha)</span>
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha_confirma">Confirmar senha</label>
                    <div class="col-md-6">
                        <input id="senha_confirma" name="senha_confirma" type="password" placeholder="confirmar senha" class="form-control input-md" required="">
                        <span class="help-block">(Confirme sua senha)</span>
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="rad">Tipo de usuário</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label for="user">
                                <input type="radio" name="permissao" id="user" value="2" checked="checked">
                                Usuário
                            </label>
                        </div>
                        <div class="radio">
                            <label for="admin">
                                <input type="radio" name="permissao" id="admin" value="1">
                                Administrador
                            </label>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">

                        <!--<button  href="index.html" id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>-->
                        <a href="index.html" class="btn btn-danger" name="cancelar">Cancelar</a>
                        <button id="Cadastrar" name="Salvar" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>

<?php include 'footer.php';


   include_once 'persistence/DaoUsuario.php';

    if(isset($_POST['Salvar'])) {
        $usuarios = new Usuario();
        $usuarios->setNome($_POST['nome']);
        $usuarios->setUsuario($_POST['usuario']);
        $usuarios->setSenha($_POST['senha']);
        $usuarios->setEmail($_POST['email']);
        $usuarios->setPermissao($_POST['permissao']);
        if (DaoUsuario::inserir($usuarios)) {


            ?>
            <br/><br/>
            <!--
            <script>
                sweetAlert("Inserido!", "Usuário cadastrado!", "success");
            </script>
            -->
            <script>
                swal({
                    title: "Cadastro feito com sucesso!",
                    text: "Você será redirecionado para a página principal, para acessar clicar em Entrar!",
                    timer: 4000,
                    showConfirmButton: false
                },
                    function(){
                        window.location.href = 'index.html';
                    });
            </script>
            <?php
        }
    }
    ?>


