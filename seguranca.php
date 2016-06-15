<?php


$_SG['conectaServidor'] = true;
$_SG['abreSessao'] = true;

$_SG['caseSensitive'] = false;
$_SG['validaSempre'] = true;

$_SG['servidor'] = 'localhost';
$_SG['usuario'] = 'root';
$_SG['senha'] = '';
$_SG['permissao'] = '';
$_SG['banco'] = 'sistema_academia';

$_SG['paginaLogin'] = 'index.html';
$_SG['tabela'] = 'usuarios';

// Verifica se precisa fazer a conexão com o MySQL

if ($_SG['conectaServidor'] == true){

    $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'],$_SG['banco']) or die("MYSQL: Não foi possível conectar-se ao servidor[".$_SG['servidor']."].");
    mysqli_select_db($_SG['link'],$_SG['banco']) or die("MYSQL: Não foi possível conectar-se ao banco de dados[".$_SG['banco']."].");
}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true)
    session_start();

/**
 * Função que valida um usuário e senha
 *
 * @param string $usuario - O usuário a ser validado
 * @param string $senha - A senha a ser validada
 *
 * @return bool - Se o usuário foi validado ou não (true/false)
 */



function validaUsuario($usuario, $senha){
    global $_SG;

    $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

    // Usa a função addslashes para escapar as aspas

    $nusuario = addslashes($usuario);
    $nsenha = addslashes($senha);

    // Monta uma consulta SQL (query) para procurar um usuário
    $_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'],$_SG['banco']) or die("MYSQL: Não foi possível conectar-se ao servidor[".$_SG['servidor']."].");

    $sql = "SELECT id, nome FROM ".$_SG['tabela']." WHERE ".$cS." usuario = '".$nusuario."' AND ".$cS." senha= '".$nsenha."' LIMIT 1";
    $query = mysqli_query($_SG['link'], $sql);
    $resultado = mysqli_fetch_assoc($query);
    

    if (empty($resultado)){
        // Nenhum registro foi encontrado => o usuário é inválido
        return false;
    }else{
        //tem usuario
        $_SESSION['usuarioID'] = $resultado['id'];
        $_SESSION['usuarioNome'] = $resultado['nome'];

        if ($_SG['validaSempre'] == true){

            $_SESSION['usuarioLogin'] = $usuario;
            $_SESSION['usuarioSenha'] = $senha;

        }

        return true;
    }
}


/**
 * Função que protege uma página
 */
function protegePagina(){
    global $_SG;

    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])){
        expulsaVisitante();
    }elseif (isset($_SESSION['usuarioID']) AND isset($_SESSION['usuarioNome'])){
        if ($_SG['validaSempre'] == true){
            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])){
                expulsaVisitante();
            }
        }
    }
}


/**
 * Função para expulsar um visitante
 */

function expulsaVisitante(){
    global $_SG;

    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

    header("Location: ". $_SG['paginaLogin']);
}

