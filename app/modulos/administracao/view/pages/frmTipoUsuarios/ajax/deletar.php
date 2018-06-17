<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../model/TiposUsuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST)):
   $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($id)):
        $array = array(
            'retorno' => 'error',
            'classe' => 'bg-danger',
            'mensagem' => 'ID nao identificado ou nulo',
            'lista' => '');

        echo json_encode($array);

    else:
        #Apaga
        #Instancia o Controller
        $tipoUsuarioController = new TiposUsuarioController();

        #Instancia o Model
        $tipoUsuarioModel = new TiposUsuario();

        #Pega total de registros atuais
        $tot_reg = $tipoUsuarioController->ContaRegistros();

        $tipoUsuarioController->deletar($id);

        $array = array(
            'retorno' => 'excluido',
            'classe' => 'bg-warning',
            'mensagem' => 'Registro excluido com sucesso',
            'registros'=>$tot_reg);
        echo json_encode($array);
    endif;
endif;