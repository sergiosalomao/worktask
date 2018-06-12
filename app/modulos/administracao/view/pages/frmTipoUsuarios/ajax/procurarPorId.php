<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../model/TiposUsuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST)):
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($id)):
        $array = array(
            'status' => 'error',
            'classe' => 'bg-danger',
            'mensagem' => 'ID nao identificado ou nulo');

        echo json_encode($array);

    else:

        #Instancia o Controller
        $tipoUsuarioController = new TiposUsuarioController();

        #Instancia o Model
        $tipoUsuarioModel = new TiposUsuario();

        $array = array();

        #Pega total de registros atuais
        $tot_reg = $tipoUsuarioController->ContaRegistros();

        echo json_encode($tipoUsuarioController->procurarPorId($id));

    endif;
endif;