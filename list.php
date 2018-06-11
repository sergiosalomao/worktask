<html>
<body>
<br>
    <div id="relatorio" style="display: none">
        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th class="campo-obs" scope="col">Observação</th>
                <th colspan="2" scope="col" width="100px" style="text-align: center">Opções</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php

                $tipoUsuarioController = new TiposUsuarioController();
                $tiposUsuario = new TiposUsuario();

                foreach ($tipoUsuarioController->ListarTodos() as $key => $value): ?>

                <td><?php echo $value->id ?></td>

                <td><?php echo $value->descricao ?></td>

                <td class= "campo-obs" ><?php echo $value->obs ?></td>

                <td width="50px" style="text-align: center">

                    <button id="<?php echo $value->id ?>"class="btn-edit btn btn-info" ><img src="<?php echo BTN_EDIT?>"></img></button>
                </td>

                <td width="50px" style="text-align: center">
                    <button id="<?php echo $value->id ?>"class="btn-delete btn btn-danger" data-toggle="modal" data-target="#modal_confirma_exclusao"><img src="<?php echo BTN_DELETE?>"></img></button>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>