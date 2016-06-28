<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/LocalTreino.php';

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoLocalDeTreino{

    public  static function inserir(LocalTreino $localtreino){
        $sql = "INSERT INTO localdetreino (nome, endereco) VALUES (:nome, :endereco)";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt ->bindValue(':nome', utf8_encode($localtreino->getNome()), PDO::PARAM_STR);
        $stmt ->bindValue(':endereco', utf8_encode($localtreino->getEndereco()), PDO::PARAM_STR);

        if($stmt->execute()){

            return true;
        }else{
            return false;
        }

    }

    public static function carregarDados($id){
        $sql = "SELECT *FROM localdetreino WHERE id =: id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_localtreino = $stmt->fetch(PDO::FETCH_ASSOC);
            $localtreino = new LocalTreino();
            $localtreino->setId($vetor_localtreino['id'])
                        ->setNome($vetor_localtreino['nome'])
                        ->setEndereco($vetor_localtreino['endereco']);
            return $localtreino;
        }
    }

    public static function listarLocalTreino($coluna = "id"){
        $sql = "SELECT id, nome, endereco FROM localdetreino ORDER BY ". $coluna;
        foreach(Conexao::getInstance()->query($sql) as $linha){
            $localtreino = new LocalTreino();
            $localtreino ->setId($linha['id'])
                         ->setNome($linha['nome'])
                         ->setEndereco($linha['endereco']);
            $vetor_localtreino[] = $localtreino;
        }
        return $vetor_localtreino;
    }

    public static function excluir($id) {
        $sql = "DELETE FROM localdetreino WHERE id = :id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        $retorno = $stmt->execute();
        if ($retorno){
            if ($retorno -> rowCount()>0){
                return true;
            }
            return false;
        }
    }

//    public static function alterar(LocalTreino $localtreino) {
//        $sql = "UPDATE localdetreino SET nome ='".$nome."', endereco= '".$endereco."' cidade= '".$cidade."' estado= '".$estado."' WHERE id=".$id;
//        $stmt = Conexao::getInstance()->prepare($sql);
//        $stmt->bindValue(":nome", utf8_decode($localtreino->getNome()), PDO::PARAM_STR);
//        $stmt->bindValue(":endereco", utf8_decode($localtreino->getEndereco()), PDO::PARAM_STR);
//        $stmt->bindValue(":cidade", utf8_decode($localtreino->getCidade()), PDO::PARAM_STR);
//        $stmt->bindValue(":estado", utf8_decode($localtreino->getEstado()), PDO::PARAM_STR);
//        $stmt->bindValue(":id", $localtreino->getId(), PDO::PARAM_INT);
//        if ($stmt->execute()){
//            return true;
//        }else{
//            return false;
//        }
//    }


}

