<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 28/05/2018
 * Time: 21:23
 */

Class TiposUsuario
{
    private $id;
    private $descricao;

    /**
     * TiposUsuario constructor.
     */

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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }



}