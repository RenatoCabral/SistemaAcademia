<?php

class ArtesMarciais{
    private $id;
    private $nome;
    private $tipodeprograma;

    /**
     * ArtesMarciais constructor.
     * @param $id
     * @param $nome
     * @param $tipodeprograma
     */
    public function __construct()
    {
        $this->id = "0";
        $this->nome = "";
        $this->tipodeprograma = new TipoPrograma();
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
    public function getTipodeprograma()
    {
        return $this->tipodeprograma;
    }

    /**
     * @param mixed $tipodeprograma
     */
    public function setTipodeprograma($tipodeprograma)
    {
        $this->tipodeprograma = $tipodeprograma;
        return $this;
    }

    /**
     * @return mixed
     */



}