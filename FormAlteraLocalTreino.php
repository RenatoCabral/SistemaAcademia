<?php

include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
include 'header.php';

$db_host="localhost";
$db_usuario="root";
$db_password="";
$db_name="sistema_academia";
$conection = mysqli_connect($db_host, $db_usuario, $db_password, $db_name) or die(mysqli_error($conection));
$db = mysqli_select_db( $conection, $db_name) or die(mysqli_error($conection));


$id = $_GET['id'];

$result = mysqli_query($conection, "SELECT * FROM localdetreino WHERE id =" . $id) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysqli_fetch_array($result)) {

    $nome = $linha["nome"];
    $endereco = $linha["endereco"];
    $cidade = $linha["cidade"];
    $estado = $linha["estado"];

?>

<div id="wrapper">

    <?php include 'sidebar.php';?>
    <?php include 'header-admin.php'; ?>

    <div class="container">

        <div class="row">

            <form action="altera-local-treino.php" class="form-horizontal" method="post">
                <fieldset class="altera_cadastro_local_treino">

                    <legend class="title_altera_local_treino">Alterar Local de Treino</legend>

                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Descrição</label>
                        <div class="col-md-6">
                            <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" value="<?php echo $nome; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Endereço</label>
                        <div class="col-md-6">
                            <input id="endereco" name="endereco" type="text" placeholder="endereço" class="form-control input-md" value="<?php echo $endereco; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12">
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

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cidade">Cidade</label>
                        <div class="col-md-6">
                            <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required="" value="<?php echo $cidade; ?>">
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <a href="tabela-local-treino.php" class="btn btn-danger" name="cancelar">Cancelar</a>
                            <button id="salvar" name="Salvar" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
        <?php } ?>
    </div>

    <?php include 'footer.php'; ?>



