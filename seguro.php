<?php

if (isset($_POST['usuarios']) == "logar"){

    if (isset($_POST['usuario']) == "" || isset($_POST['senha']) == ""){
        echo "Preencher os campos";
        exit;
    }

    $logar = mysqli_query("SELECT usuarios, senha, permissao FROM usuarios WHERE usuario=".anti_injection($_POST['usuario'])." AND senha=". anti_injection($_SESSION['senha'])." AND permissao=".anti_injection($nivel)." " );
    if (mysqli_num_rows($verifica_nivel) == 2){
        echo "acesso permitido";
    }else{
        echo "<script>
               alert('Você não tem permissao para essa página.');
                history.back();

            </script>";
        exit;
        echo "entrou";
        die;
    }
}

if (!isset($_SESSION['usuario']) OR !isset($_SESSION['senha']) OR $_SESSION['usuario'] == "" OR $_SESSION['senha']==""){
    header("Location:login.php");
}