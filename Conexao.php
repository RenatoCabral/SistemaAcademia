<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "estudo";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_error){
    echo "conectou";
}else{
    echo "Falha na conexão: (".$mysqli->connect_error.") ".$mysqli->connect_error;
}

/*function anti_injection($sql){
    $sql = preg_replace("/( from |select|insert|delete|where|drop table|show tables|#|--|\\\\)/", "" ,$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
    return $sql;
}
*/


?>