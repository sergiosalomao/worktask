<?php
require_once 'Conexao.php';
interface CrudGenerico
{
    public function ListarTodos();

    public function procurarPorId($id);

    public function gravar($entidade);

    public function atualizar($id, $entidade);

    public function deletar($id);

    public function contaRegistros();
}