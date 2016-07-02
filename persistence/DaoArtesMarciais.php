<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/ArtesMarciais.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/TipoPrograma.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';

class DaoArtesMaciais{

    public static function inserir(ArtesMarciais $artesMarciais) {
        $query = "insert into artesmarciais (nome, id_tipoprograma) values (:nome, :id_tipoprograma)";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($artesMarciais->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(':id_tipoprograma', ($artesMarciais->getTipodeprograma()->getId()));

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function alterar (ArtesMarciais $artesMarciais){
        $query = "UPDATE artesmarciais set nome=:nome, id_tipoprograma=:id_tipoprograma where id=:id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue('nome', utf8_decode($artesMarciais->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(':id_tipoprograma', $artesMarciais->getTipodeprograma()->getId());
        $stmt->bindValue(':id', $artesMarciais->getId(), PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function carregarDados($id){
        $sql = "SELECT am. *, tp.nome as nometipoprograma FROM artesmarciais as am INNER JOIN tipodeprograma as tp ON 
                tp.id = am.idtipoprograma WHERE am. id = :id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_artesmarciais = $stmt->fetch(PDO::FETCH_ASSOC);
            $artesmarciais = new ArtesMarciais();
            $tipoPrograma = new TipoPrograma();
            $tipoPrograma->setId($vetor_artesmarciais['idtipoprograma'])
                         ->setNome($vetor_artesmarciais['nometipoprograma']);
            $artesmarciais->setId($vetor_artesmarciais['id'])
                          ->setNome($vetor_artesmarciais['nome'])
                          ->setTipodeprograma($tipoPrograma);
            return $artesmarciais;
        }
    }

    public static function listarArtesMarciais($coluna = "id") {
        $sql = "SELECT id, nome, id_tipoprograma FROM artesmarciais ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_artesmarciais = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach (Conexao::getInstance()->query($sql) as $linha){
            $artesmarciais = new ArtesMarciais();
            $artesmarciais->setId($linha['id']);
            $artesmarciais->setNome($linha['nome']);
            $artesmarciais->setTipodeprograma($linha['id_tipoprograma']);
            $vetor_artesmarciais[]= $artesmarciais;
        }
        return $vetor_artesmarciais;
    }

    public static function delete($id) {
        $query = "delete from artesmarciais where id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }



}