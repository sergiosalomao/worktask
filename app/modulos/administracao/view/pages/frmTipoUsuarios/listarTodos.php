<?php
require_once "../../../controller/TiposUsuarioController.php";
require_once "../../../model/TiposUsuario.php";

$tipoUsuarioController = new TiposUsuarioController();
$lista[] = $tipoUsuarioController->ListarTodos();
print_r($lista);

?>
