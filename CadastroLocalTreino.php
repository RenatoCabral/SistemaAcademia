<?php
include ("header.php");

include ("footer.php");

include_once 'persistence/DaoLocalDeTreino.php';


if (isset($_POST['Salvar'])){
    $localtreino = new LocalTreino();
    $localtreino->setNome(utf8_decode($_POST['nome']));
    $localtreino->setEndereco(utf8_decode($_POST['endereco']));
    $localtreino->setEstado(utf8_decode($_POST['estado']));
    $localtreino->setCidade(utf8_decode($_POST['cidade']));
    if (DaoLocalDeTreino::inserir($localtreino)){
        ?>
        <br/><br/>
        <script>
            swal("Good job!", "You clicked the button!", "success")
        </script>
        ?>
        <?php
        $redirect = "OpLocalDeTreino.php";
        header("location:$redirect");

    }
}

?>




