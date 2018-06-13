<?php

Class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipoUsuarioId;
    private $status;
    private $criadoEm;
    private $modificadoEm;

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

    public function getNome()
    {
        return $this->nome;
    }

     public function setNome($nome)
    {
        $this->nome = $nome;
    }

   public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getTipoUsuarioId()
    {
        return $this->tipoUsuarioId;
    }

    public function setTipoUsuarioId($tipoUsuarioId)
    {
        $this->tipoUsuarioId = $tipoUsuarioId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

   public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    public function setCriadoEm($criadoEm)
    {
        $this->criadoEm = $criadoEm;
    }

   public function getModificadoEm()
    {
        return $this->modificadoEm;
    }

    public function setModificadoEm($modificadoEm)
    {
        $this->modificadoEm = $modificadoEm;
    }
}