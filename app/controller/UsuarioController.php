<?php

/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 28/05/2018
 * Time: 21:29
 */

require_once 'Conexao.php';

Class UsuarioController
{
    protected $_table = 'worktask.usuarios';
    protected $_alias = 'usuarios';

    public function __construct()
    {
        $this->conexao = Conexao::conexao();
    }

    public function ListarTodos()
    {
        $sql = "SELECT * FROM {$this->_table} AS {$this->_alias}";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function procurar($id)
    {

        $sql = "SELECT * FROM {$this->_table} AS {$this->_alias} 
        WHERE {$this->_alias}.id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function gravar($usuarioModel)
    {
        try {
            $sql = "INSERT INTO {$this->_table} AS {$this->_alias}
        (id,nome,email,senha,tipo_usuario_id, status,criado_em, modificado_em) VALUES 
        (default, :nome, :email, :senha, :tipo,:status, :criadoEm, :modificadoEm )";


            $nome = $usuarioModel->getNome();
            $email = $usuarioModel->getEmail();
            $senha = $usuarioModel->getSenha();
            $tipo = $usuarioModel->getTipoUsuarioId();
            $status = $usuarioModel->getStatus();
            $criadoEm = $usuarioModel->getCriadoEm();
            $modificadoEm = $usuarioModel->getModificadoEm();
            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(
                ':nome' => $nome, ':email' => $email, ':senha' =>   sha1($senha), ':tipo' => $tipo, ':status' => $status, ':criadoEm' => $criadoEm, ':modificadoEm' => $modificadoEm,));
        }
        catch (exception $e)
        {
            var_dump($stmt->errorInfo());
        }
    }

    public function atualizar($id, $entidade)
    {

        $sql = "UPDATE {$this->_table} AS {$this->_alias} SET 
		nome = :nome,
		email = :email,
		senha = :senha,
		tipo = :tipo,
		status = :status
		criado_em = :criadoEm,
		modificado_em = :modificadoEm    
        WHERE id = :id";

        $nome = $entidade->getNome();
        $email = $entidade->getEmail();
        $senha = $entidade->getSenha();
        $tipo = $entidade->getTipoUsuarioId();
        $status = $entidade->getStatus();
        $criadoEm = $entidade->getCriadoEm();
        $modificadoEm = $entidade->getModificadoEm();
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id,
            ':nome' => $nome, ':email' => $email, ':senha' => $senha, ':tipo' => $tipo, ':status' => $status, ':criado_em' => $criadoEm, ':modificado_em' => $modificadoEm));

    }

    public function deletar($id)
    {
        $sql = "DELETE FROM {$this->_table} AS {$this->_alias} WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }

}

