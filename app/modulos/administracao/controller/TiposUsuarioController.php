<?php
    require_once 'CrudGenerico.php';

Class TiposUsuarioController implements CrudGenerico
{
    protected $_table = 'administracao.tipos_usuario';
    protected $_alias = 'tusu';

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

    public function gravar($tipoUsuarioModel)
    {
        try
        {
            $sql = "INSERT INTO {$this->_table} AS {$this->_alias}
            (id,descricao,obs) VALUES (default, :descricao,:obs)";

            $descricao = $tipoUsuarioModel->getDescricao();
            $obs = $tipoUsuarioModel->getObs();

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(
                ':descricao' => $descricao,
                ':obs' => $obs));
        }

        catch (exception $error)
        {
            echo 'Error:' . $error->errorInfo();
        }
    }

    public function atualizar($id, $tipoUsuarioModal)
    {
        try
        {
            $sql = "UPDATE {$this->_table} AS {$this->_alias} SET 
            descricao = :descricao, obs = :obs,  
            WHERE id = $id";

            $descricao = $tipoUsuarioModal->getDescricao();
            $obs = $tipoUsuarioModal->getObs();

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(
                ':obs' => $obs,
                ':descricao' => $descricao));

        }
        catch (exception $error)
        {
            echo 'Error:' . $error->errorInfo();
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


    public function procurarPorDescricao($descricao)
    {
        try
        {
            $sql = "SELECT * FROM {$this->_table} AS {$this->_alias} 
            WHERE {$this->_alias}.descricao = :descricao";

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute(array(':descricao' => $descricao));
        }

        catch (exception $error)
        {
            print_r($error->getMessage());
        }

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
