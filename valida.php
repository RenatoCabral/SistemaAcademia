<?php

// Inclui o arquivo com o sistema de segurança

require_once("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';



    // Utiliza uma função criada no seguranca.php pra validar os dados digitados

    if (validaUsuario($usuario, $senha) == true) {
        $sql = "SELECT permissao FROM ".$_SG['tabela']." WHERE usuario = '".$usuario."' AND  senha= '".$senha."' LIMIT 1";
        $query = mysqli_query($_SG['link'], $sql);
        $resultado = mysqli_fetch_assoc($query);

        if (empty($resultado)){
            return false;
        }else{
            echo "tem e permissao é: ".$resultado['permissao'];
            if($resultado['permissao'] == 1)//é admin
                header("Location: admin.php");
            if($resultado['permissao'] == 2)//é user
                header("Location: user.php");
            return true;
        }


    }else{
        
        // O usuário e/ou a senha são inválidos, manda de volta pro form de login
        // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
        expulsaVisitante();
    }
}

?>