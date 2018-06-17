<?php
require_once "../../../../controller/UsuarioController.php";
require_once "../../../../model/Usuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST)){

    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($id))
    {
        $array = array(
            'status' => 'error',
            'classe' => 'bg-danger',
            'mensagem' => 'ID nao identificado ou nulo');

        echo json_encode($array);
    }
    else
        {
            #Instancia o Controller
            $UsuarioController = new UsuarioController();

            #Pega total de registros atuais
            $tot_reg = $UsuarioController->ContaRegistros();

            echo json_encode($UsuarioController->procurarPorId($id));
        }
    }