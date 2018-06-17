<?php
    require_once 'CrudGenerico.php';

Class UsuarioController implements CrudGenerico
{
    protected $_table = 'administracao.usuarios';
    protected $_alias = 'usu';

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

    public function procurarPorId($id)
    {
        $sql = "SELECT * FROM {$this->_table} AS {$this->_alias} 
        WHERE {$this->_alias}.id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function gravar($usuarioModel)
    {
        try
        {
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
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => sha1($senha),
                ':tipo' => $tipo,
                ':status' => $status,
                ':criadoEm' => $criadoEm,
                ':modificadoEm' => $modificadoEm));
        }
        catch (exception $error)
        {
            echo 'Error: ' . $error->getMessage();
        }
    }

    public function atualizar($id, $usuarioModel)
    {
        try
        {
            $sql = "UPDATE {$this->_table} AS {$this->_alias} SET 
            
            nome = :nome,
            email = :email,
            senha = :senha,
            tipo_usuario_id = :tipo,
            status = :status,
            modificado_em = :modificadoEm    
            WHERE id = $id";

            $nome = $usuarioModel->getNome();
            $email = $usuarioModel->getEmail();
            $senha = $usuarioModel->getSenha();
            $tipo = $usuarioModel->getTipoUsuarioId();
            $status = $usuarioModel->getStatus();
            $modificadoEm = $usuarioModel->getModificadoEm();

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(
                ':nome' => $nome,
                ':email' => $email,
                ':senha' =>sha1($senha),
                ':tipo' => $tipo,
                ':status' => $status,
                ':modificadoEm' => $modificadoEm));
        }

        catch (exception $error)
        {
            echo 'Error: ' . $error->getMessage();
        }
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM {$this->_table} AS {$this->_alias} WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }

    public function contaRegistros()
    {
        $sql = "SELECT * FROM {$this->_table} AS {$this->_alias}";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return count($stmt->fetchAll(PDO::FETCH_OBJ));
    }

    public function procurarPorEmail($email)
    {
        try
        {
            $sql = "SELECT * FROM {$this->_table} AS {$this->_alias} 
            WHERE {$this->_alias}.email = :email";

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(':email' => $email));
        }

        catch (exception $error)
        {
            print_r($error->getMessage());
        }

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}

