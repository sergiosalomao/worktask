<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 28/05/2018
 * Time: 21:29
 */
require_once 'Conexao.php';
Class TiposUsuarioController
{
    protected $_table = 'worktask.tipos_usuarios';
    protected $_alias = 'tipos_usuarios';

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

    public function procurar($id){

       $sql = "SELECT * FROM {$this->_table} AS {$this->_alias} 
        WHERE {$this->_alias}.id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function gravar($usuario)
    {
        $sql = "INSERT INTO {$this->_table} AS {$this->_alias}
        (id,nome,email,senha,status,criado_em, modificado_em) VALUES 
        (default, :nome, :email, :senha, :status, :criado_em, :modificado_em )";
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $status = $usuario->getStatus();
        $criado_em = $usuario->getCriado_em();
        $modificado_em = $usuario->getModificado_em();
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(
        ':nome' => $nome ,':email' => $email ,':status' => $status, ':criado_em' => $criado_em , ':modificado_em' => $modificado_em ,));
    }

    public function atualizar($id,$cliente)
    {

        $sql = "UPDATE {$this->_table} AS {$this->_alias} SET 
		nome = :nome,
		email = :email,
		senha = :senha,
		criado_em = :criado_em,
		modificado_em = :modificado_em    
        WHERE id = :id";

        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $senha = $cliente->getSenha();
        $criadoEm = $cliente->getCriadoEm();
        $modificadoEm = $cliente->getModificadoEm();
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id,
            ':nome' => $nome ,':email' => $email ,':senha' => $senha ,':criado_em' => $criadoEm,':modificado_em' => $modificadoEm));
    }

    public function deletar($id)
    {
        $sql="DELETE FROM {$this->_table} AS {$this->_alias} WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }
}
?>
