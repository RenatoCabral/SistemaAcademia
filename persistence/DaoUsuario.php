<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/Usuario.php';

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';


class DaoUsuario{

    public  static function inserir(Usuario $usuarios){
        $sql = "INSERT INTO usuarios (nome, usuario, email, senha, permissao) VALUES (:nome, :usuario, :email, :senha, :permissao)";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt ->bindValue(':nome', utf8_encode($usuarios->getNome()), PDO::PARAM_STR);
        $stmt ->bindValue(':usuario', utf8_encode($usuarios->getUsuario()), PDO::PARAM_STR);
        $stmt ->bindValue(':email', utf8_encode($usuarios->getEmail()), PDO::PARAM_STR);
        $stmt ->bindValue(':senha', md5($usuarios->getSenha()), PDO::PARAM_STR);
        $stmt ->bindValue(':permissao', ($usuarios->getPermissao()), PDO::PARAM_STR);

        if($stmt->execute()){

            return true;
        }else{
            return false;
        }

    }
}