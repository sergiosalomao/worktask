<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../model/TiposUsuario.php";
require_once "../../../../../../appConfig.php";

        #Instancia o Controller
        $tipoUsuarioController = new TiposUsuarioController();

                foreach($tipoUsuarioController->ListarTodos() as $dados) {
                    echo "<tr>";
                    echo "<td>$dados->id</td>";
                    echo "<td>$dados->descricao</td>";
                    echo "<td>$dados->obs</td>";

                    echo "<td width='50px' style='text-align: center'>";
                    echo "<button id='$dados->id' class='btn-edit btn btn-info' ><img src='" . BTN_EDIT . "'></img></button>";
                    echo "</td>";

                    echo "<td width='50px' style='text-align: center'>";
                    echo "<button id='$dados->id' class='btn-delete btn btn-danger'data-toggle='modal' data-target='#modal_confirma_exclusao'><img src='" . BTN_DELETE . "'></img></button>";
                    echo "</td>";

                    echo "</tr>";

                }
