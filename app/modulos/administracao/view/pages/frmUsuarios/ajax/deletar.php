<?php
require_once "../../../../controller/UsuarioController.php";
require_once "../../../../model/Usuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST))
{
   $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($id))
    {
        $array = array(
            'retorno' => 'error',
            'classe' => 'bg-danger',
            'mensagem' => 'ID nao identificado ou nulo',
            'lista' => '');

        echo json_encode($array);
    }
    else
        {
        #Apaga
        #Instancia o Controller
        $UsuarioController = new UsuarioController();

        #Instancia o Model
        $UsuarioModel = new Usuario();

        #Pega total de registros atuais
        $tot_reg = $UsuarioController->ContaRegistros();

        $UsuarioController->deletar($id);
        $UsuarioController->ListarTodos();

        $array = array(
            'retorno' => 'excluido',
            'classe' => 'bg-warning',
            'mensagem' => 'Registro excluido com sucesso',

            'registros'=>$tot_reg);
        echo json_encode($array);
    }
}