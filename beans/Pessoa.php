<?php

include 'Estados.php';

class Pessoa{
    private $id;
    private $nome;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;
    private $foto;
    private $data_cadastro;
    private $estados;

    /**
     * Pessoa constructor.
     * @param $id
     * @param $nome
     * @param $endereco
     * @param $numero
     * @param $complemento
     * @param $bairro
     * @param $estado
     * @param $cidade
     * @param $foto
     * @param $data_cadastro
     * @param $estados
     */
    public function __construct()
    {
        $this->id = 0;
        $this->nome = "";
        $this->endereco = "";
        $this->numero = "";
        $this->complemento = "";
        $this->bairro = "";
        $this->estado = "";
        $this->cidade = "";
        $this->foto = "";
        $this->data_cadastro = "";
        $this->estados = new Estados();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
        return $this;
    }

    /**
     * @return Estados
     */
    public function getEstados()
    {
        return $this->estados;
    }

    /**
     * @param Estados $estados
     */
    public function setEstados($estados)
    {
        $this->estados = $estados;
    }

    /**
     * @return mixed
     */
}