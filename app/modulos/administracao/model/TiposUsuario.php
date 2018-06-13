<?php

Class TiposUsuario
{
    private $id;
    private $descricao;
    private $obs;

     public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getObs()
    {
        return $this->obs;
    }

   public function setObs($obs)
    {
        $this->obs = $obs;
    }
}