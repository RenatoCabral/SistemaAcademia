<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaAcademia/beans/TipoPrograma.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoTipoPrograma{

    public static function inserir (TipoPrograma $tipoPrograma){
        $query = "insert into tipodeprograma (nome)value (:nome)";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($tipoPrograma->getNome()), PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function update(TipoPrograma $tipoPrograma){
        $query = "update tipodeprograma set nome=:nome where id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($tipoPrograma->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(':id', $tipoPrograma->getId(), PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function listarTipoPrograma($coluna = "id"){
        $sql = "SELECT id, nome FROM tipodeprograma ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_tipoprograma = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach (Conexao::getInstance()->query($sql) as $linha){
            $tipoPrograma = new TipoPrograma();
            $tipoPrograma->setId($linha['id'])
                         ->setNome($linha['nome']);
            $vetor_tipoprograma[]=$tipoPrograma;
        }
        return $vetor_tipoprograma;
    }

    public static function carregarDados($id){
        $sql = "SELECT *FROM tipodeprograma WHERE id =:id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_tipoprograma = $stmt->fetch(PDO::FETCH_ASSOC);
            $tipoprograma = new TipoPrograma();
            $tipoprograma->setId($vetor_tipoprograma['id'])
                         ->setNome($vetor_tipoprograma['nome']);
            return $tipoprograma;
        }
    }

    public static function delete($id){
        $query = "delete from tipodeprograma where id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


}

