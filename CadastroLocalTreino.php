<?php


include_once 'persistence/DaoLocalDeTreino.php';
//include_once 'beans/LocalTreino.php';

if (isset($_POST['Salvar'])){
    $localtreino = new LocalTreino();
    $localtreino->setNome($_POST['nome']);
    $localtreino->setEndereco($_POST['endereco']);
    $localtreino->setEstado($_POST['estado']);
    $localtreino->setCidade($_POST['cidade']);
    if (DaoLocalDeTreino::inserir($localtreino)){
            echo "inserido";
        
    }
}
