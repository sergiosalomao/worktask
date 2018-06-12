<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../model/TiposUsuario.php";
require_once "../../../../../../appConfig.php";

#Instancia o Controller
$tipoUsuarioController = new TiposUsuarioController();

#Pega total de registros atuais
$tot_reg = $tipoUsuarioController->ContaRegistros();

$lista = null;
foreach ($tipoUsuarioController->ListarTodos() as $dados) {
    $lista .= "<tr>";
    $lista .= "<td>$dados->id</td>";
    $lista .= "<td>$dados->descricao</td>";
    $lista .= "<td>$dados->obs</td>";
    $lista .= "<td width='50px' style='text-align: center'>";
    $lista .= "<button type='button' id='btn-edit[$dados->id]' class='btn btn-info' onclick='editar($dados->id)'><img src='" . BTN_EDIT . "'></img></button>";
    $lista .= "</td>";
    $lista .= "<td width='50px' style='text-align: center'>";
    $lista .= "<button type='button' id='btn-delete[$dados->id]' class='btn btn-danger'data-toggle='modal' data-target='#modal_confirma_exclusao' onclick='deletaPorId($dados->id)'><img src='" . BTN_DELETE . "'></img></button>";
    $lista .= "</td>";
    $lista .= "</tr>";
}
$array = array(
    'retorno' => 'ListarTodos',
    'classe' => '',
    'mensagem' => '',
    'lista' => $lista,
    'registros'=>$tot_reg);
echo json_encode($array);
