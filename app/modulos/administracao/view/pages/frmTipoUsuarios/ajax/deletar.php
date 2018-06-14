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

        $array = array();

        #Pega total de registros atuais
        $tot_reg = $tipoUsuarioController->ContaRegistros();

        $tipoUsuarioController->deletar($id);
        $tipoUsuarioController->ListarTodos();
        $lista = null;
        foreach($tipoUsuarioController->ListarTodos() as $dados) {
            $lista.= "<tr>";
            $lista.= "<td>$dados->id</td>";
            $lista .= "<td><b>$dados->descricao</b><br> $dados->obs</td>";
            $lista.= "<td width='50px' style='text-align: center'>";
            $lista.= "<button type='button' id='btn-edit[$dados->id]' class='btn btn-info' onclick='editar($dados->id)'><img src='" . BTN_EDIT . "'></img></button>";
            $lista.= "</td>";
            $lista.= "<td width='50px' style='text-align: center'>";
            $lista.= "<button type='button' id='btn-delete[$dados->id]' class='btn btn-danger'data-toggle='modal' data-target='#modal_confirma_exclusao' onclick='deletaPorId($dados->id)'><img src='" . BTN_DELETE . "'></img></button>";
            $lista.= "</td>";
            $lista.= "</tr>";
        }
        $array = array(
            'retorno' => 'excluido',
            'classe' => 'bg-warning',
            'mensagem' => 'Registro excluido com sucesso',
            'lista' => $lista,
            'registros'=>$tot_reg);
        echo json_encode($array);
    endif;
endif;