<?php

include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/Pessoa.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/beans/Estados.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/SistemaAcademia/persistence/bd/Conexao.php';

class Daopessoa{



    public  static function inserir(Pessoa $pessoa){
        $sql = "INSERT INTO pessoa (nome, endereco, numero, complemento, bairro, cidade, foto, data_cadastro, id_estado) 
                VALUES (:nome, :endereco, :numero, :complemento, :bairro, :cidade, :foto, :data_cadastro, :id_estado)";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt ->bindValue(':nome', utf8_encode($pessoa->getNome()), PDO::PARAM_STR);
        $stmt ->bindValue(':endereco', utf8_encode($pessoa->getEndereco()), PDO::PARAM_STR);
        $stmt ->bindValue(':numero', utf8_encode($pessoa->getNumero()), PDO::PARAM_STR);
        $stmt ->bindValue(':complemento', utf8_encode($pessoa->getComplemento()), PDO::PARAM_STR);
        $stmt ->bindValue(':bairro', utf8_encode($pessoa->getBairro()), PDO::PARAM_STR);
        $stmt ->bindValue(':cidade', utf8_encode($pessoa->getCidade()), PDO::PARAM_STR);
        $stmt ->bindValue(':foto', utf8_encode($pessoa->getFoto()), PDO::PARAM_STR);
        $stmt ->bindValue(':data_cadastro', utf8_encode($pessoa->getDataCadastro()), PDO::PARAM_STR);
        $stmt->bindValue('id_estado', ($pessoa->getEstados()->getId()));

        if($stmt->execute()){

            return true;
        }else{
            return false;
        }

    }

    public static function alterar(Pessoa $pessoa) {
        $query = "UPDATE pessoa SET nome=:nome, endereco=:endereco, numero=: numero, complemento=:complemento, bairro=:bairro,
                  cidade=:cidade, ,data_nascimento=:data_nascimento,foto=:foto, data_cadastro=:data_cadastro, id_estado=:id_est WHERE id=:id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':nome', utf8_decode($pessoa->getNome()), PDO::PARAM_STR);
        $stmt->bindValue(':endereco', utf8_decode($pessoa->getEndereco()), PDO::PARAM_STR);
        $stmt->bindValue(':numero', utf8_decode($pessoa->getNumero()), PDO::PARAM_STR);
        $stmt->bindValue(':complemento', utf8_decode($pessoa->getComplemento()), PDO::PARAM_STR);
        $stmt->bindValue(':bairro', utf8_decode($pessoa->getBairro()), PDO::PARAM_STR);
        //$stmt->bindValue(':estado', utf8_decode($pessoa->getEstado()), PDO::PARAM_STR);
        $stmt->bindValue(':cidade', utf8_decode($pessoa->getCidade()), PDO::PARAM_STR);
        $stmt ->bindValue(':foto', utf8_encode($pessoa->getFoto()), PDO::PARAM_STR);
        $stmt ->bindValue(':data_cadastro', utf8_encode($pessoa->getDataCadastro()), PDO::PARAM_STR);
        $stmt->bindValue('id_est', ($pessoa->getEstados()->getId()));
        $stmt->bindValue(':id', $pessoa->getId(), PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public static function carregarDados($id){
       // $sql = "SELECT * FROM pessoa WHERE id = :id";
        $sql = "SELECT p. *, e.nome as nomeest FROM pessoa as p INNER JOIN estados as e ON e.id = p.idestado
                WHERE p. id = :id";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->bindValue(":id", $id , PDO::PARAM_INT);
        if($stmt->execute()){
            $vetor_pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
            $pessoa = new Pessoa();
            $estados = new Estados();
            $estados->setId($vetor_pessoa['idestados'])
                    ->setNome($vetor_pessoa['nomeestados']);
            $pessoa->setId($vetor_pessoa['id'])
                   ->setNome($vetor_pessoa['nome'])
                   ->setEndereco($vetor_pessoa['endereco'])
                   ->setNumero($vetor_pessoa['numero'])
                   ->setComplemento($vetor_pessoa['complemento'])
                   ->setBairro($vetor_pessoa['bairro'])
                   ->setCidade($vetor_pessoa['cidade'])
                   ->setFoto($vetor_pessoa['foto'])
                   ->setDataCadastro($vetor_pessoa['data_cadastro'])
                   ->setEstados($estados);
            return $pessoa;
        }
    }

    public static function listarpessoa($coluna = "id"){
        $sql = "SELECT id, nome, endereco, numero, complemento, bairro, cidade, foto, data_cadastro FROM pessoa ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach(Conexao::getInstance()->query($sql) as $linha){
            $pessoa = new Pessoa();
            $pessoa ->setId($linha['id']);
            $pessoa->setNome($linha['nome']);
            $pessoa->setEndereco($linha['endereco']);
            $pessoa->setNumero($linha['numero']);
            $pessoa->setComplemento($linha['complemento']);
            $pessoa->setBairro($linha['bairro']);
            $pessoa->setCidade($linha['cidade']);
            $pessoa->setFoto($linha['foto']);
            $pessoa->setDataCadastro($linha['data_cadastro']);
            $vetor_pessoa[] = $pessoa;
        }
        return $vetor_pessoa;
    }

    public static function listarPessoaEstado($coluna = "id"){
        $sql = "SELECT id, nome, endereco, numero, complemento, bairro, cidade, foto, data_cadastro FROM pessoa ORDER BY ". $coluna;
        $stmt = Conexao::getInstance()->prepare($sql);
        $vetor_pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach(Conexao::getInstance()->query($sql) as $linha){
            $pessoa = new Pessoa();
            $pessoa ->setId($linha['id']);
            $pessoa->setNome($linha['nome']);
            $pessoa->setEndereco($linha['endereco']);
            $pessoa->setNumero($linha['numero']);
            $pessoa->setComplemento($linha['complemento']);
            $pessoa->setBairro($linha['bairro']);
            $pessoa->setCidade($linha['cidade']);
            $pessoa->setFoto($linha['foto']);
            $pessoa->setDataCadastro($linha['data_cadastro']);
            $vetor_pessoa[] = $pessoa;
        }
        return $vetor_pessoa;
    }

    public static function delete($id) {
        $query = "DELETE FROM pessoa WHERE id = :id";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}