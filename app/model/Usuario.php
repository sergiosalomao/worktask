<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 28/05/2018
 * Time: 21:15
 */

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
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuarioId()
    {
        return $this->tipoUsuarioId;
    }

    /**
     * @param mixed $tipoUsuarioId
     */
    public function setTipoUsuarioId($tipoUsuarioId)
    {
        $this->tipoUsuarioId = $tipoUsuarioId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
     * @param mixed $criadoEm
     */
    public function setCriadoEm($criadoEm)
    {
        $this->criadoEm = $criadoEm;
    }

    /**
     * @return mixed
     */
    public function getModificadoEm()
    {
        return $this->modificadoEm;
    }

    /**
     * @param mixed $modificadoEm
     */
    public function setModificadoEm($modificadoEm)
    {
        $this->modificadoEm = $modificadoEm;
    }



}