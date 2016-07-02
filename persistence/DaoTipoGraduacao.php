<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaAcademia/beans/TipoGraduacao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoTipoGraduacao{

    public static function inserir (TipoGraduacao $tipoGraduacao){
        $query = "insert into tipodegraduacao (nome)value (:nome)";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($tipoGraduacao->getNome()), PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function update(TipoGraduacao $tipoGraduacao){
        $query = "update tipodegraduacao set nome=:nome where id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($tipoGraduacao->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(':id', $tipoGraduacao->getId(), PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function listarTipoPrograma($coluna = "id"){
        $sql = "SELECT id, nome FROM tipodegraduacao ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_tipograduacao = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach (Conexao::getInstance()->query($sql) as $linha){
            $tipoGraduacao = new TipoGraduacao();
            $tipoGraduacao->setId($linha['id'])
                         ->setNome($linha['nome']);
            $vetor_tipograduacao[]=$tipoGraduacao;
        }
        return $vetor_tipograduacao;
    }

    public static function carregarDados($id){
        $sql = "SELECT *FROM tipodegraduacao WHERE id =:id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_tipograduacao = $stmt->fetch(PDO::FETCH_ASSOC);
            $tipoGraduacao = new TipoGraduacao();
            $tipoGraduacao->setId($vetor_tipograduacao['id'])
                         ->setNome($vetor_tipograduacao['nome']);
            return $tipoGraduacao;
        }
    }

    public static function delete($id){
        $query = "delete from tipodegraduacao where id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


}

