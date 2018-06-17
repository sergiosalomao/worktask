<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../controller/UsuarioController.php";
require_once "../../../../model/Usuario.php";
require_once "../../../../../../appConfig.php";

#Instancia o Controller
$UsuarioController = new UsuarioController();

#Instancia o Controller
$TipoUsuarioController = new TiposUsuarioController();

#Pega total de registros atuais
$tot_reg = $UsuarioController->ContaRegistros();
echo
$lista = null;
foreach ($UsuarioController->ListarTodos() as $dados) {

    $tipo = $TipoUsuarioController->procurarPorId($dados->tipo_usuario_id)->descricao;
    $lista .= "<tr>";
    $lista .= "<td>$dados->id</td>";
    $lista .= "<td id='td-nome'><b>$dados->nome</b>(<span id='td-tipo-usuario'>" . $tipo . "</span>)
        <br><b>Email : </b><span id='td-email'>$dados->email</span>
        <br><b>Status : </b><span id='td-status'>$dados->status</span></td>";

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
