<?php include 'header.php';?>


<?php
$bd_host = "localhost";
$db_usuario = "root";
$db_password = "";
$db_name = "sistema_academia";

$conection = mysqli_connect($bd_host, $db_usuario, $db_password, $db_name) or die(mysqli_error($conection));
$db = mysqli_select_db($conection, $db_name) or die(mysqli_error($conection));

$id = $_POST['id'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado= $_POST['estado'];

$update_sql = ("UPDATE localdetreino SET nome='".$nome."', endereco= '".$endereco."', cidade= '".$cidade."', estado= '".$estado."' WHERE id=" . $id);
mysqli_query($conection, $update_sql);
?>



<?php include 'footer.php'?>


<script>
    swal({
            title: "Local de Treino Alterado com sucesso!",
            /*text: "Você será redirecionado para a página principal, para acessar clicar em Entrar!",*/
            timer: 1000,
            showConfirmButton: false
        },
        function(){
            window.location.href = 'funcoes-local-treino.php';
        });
    /*swal({
        title: "Alterado",
        text: "Local de treino alterado!",
        type: "success"
    },
    function(){
        window.location.href = 'funcoes-local-treino.php';
    });*/
</script>
