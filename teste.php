<?php

/*$nivel = 2;

include ("seguro.php");
include ("Conexao.php");
*/
include 'header.php';
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

echo "<p>teste</p>";


?>
<a href='login/deslogar.php' class='btn btn-danger'>Deslogar</a>
<?php
if (isset($_SESSION['usuario']) OR isset($_SESSION['senha'])){
    echo "<a href='login/deslogar.php' class='btn btn-primary'>Deslogar</a>";
}

?>


<?php include 'footer.php'; ?>


