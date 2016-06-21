<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/Estados.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoEstados{


    public static function listarEstados($coluna = "id"){
        $sql = "SELECT id, nome FROM estados ORDER BY  " . $coluna;
        foreach (Conexao::getInstance()->query($sql) as $linha){
            $estados = new Estados();
            $estados->setId($linha['id'])
                    ->setNome(utf8_encode($linha['nome']));

            $vetor_estados[] = $estados;
        }
        return $vetor_estados;
    }
}