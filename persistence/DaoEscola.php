<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/Escola.php';

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoEscola{

    public  static function inserir(Escola $escola){
        $sql = "INSERT INTO escola (nome, sigla) VALUES (:nome, :sigla)";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt ->bindValue(':nome', utf8_encode($escola->getNome()), PDO::PARAM_STR);
        $stmt ->bindValue(':sigla', utf8_encode($escola->getSigla()), PDO::PARAM_STR);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function carregarDados($id){
        $sql = "SELECT *FROM escola WHERE id =:id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_escola = $stmt->fetch(PDO::FETCH_ASSOC);
            $escola = new Escola();
            $escola->setId($vetor_escola['id'])
                   ->setSigla($vetor_escola['sigla'])
                   ->setNome($vetor_escola['nome']);
            return $escola;
        }
    }

    public static function alterar(Escola $escola) {
        $sql = "UPDATE escola SET nome =:nome sigla=:sigla WHERE id=:id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":nome", utf8_decode($escola->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(":sigla", utf8_decode($escola->getSigla()), PDO::PARAM_STR);
        $stmt->bindValue(":id", $escola->getId(), PDO::PARAM_INT);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function listarEscola($coluna = "id"){
        $sql = "SELECT id, nome, sigla FROM escola ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_escola = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach(Conexao::getInstance()->query($sql) as $linha){
            $escola = new Escola();
            $escola ->setId($linha['id'])
                    ->setNome($linha['nome'])
                    ->setSigla($linha['sigla']);
            $vetor_escola[] = $escola;
        }
        return $vetor_escola;
    }
}