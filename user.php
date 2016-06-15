<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

echo "pagina do usuário";

include 'header.php';
echo "Olá, " . $_SESSION['usuarioNome'];
?>
<a href="deslogar.php" >Logout</a>

