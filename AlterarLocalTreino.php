<?php


include_once 'persistence/DaoLocalDeTreino.php';



    if (isset($_POST['Alterar'])) {
        $localtreino = new LocalTreino();
        $localtreino->setNome($_POST['nome']);
        $localtreino->setEndereco($_POST['endereco']);
        $localtreino->setEstado($_POST['estado']);
        $localtreino->setCidade($_POST['cidade']);
        if (DaoLocalDeTreino::inserir($localtreino)) {
            echo "alterado";

        }
    }

