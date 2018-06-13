<?php
require_once "../../controller/TiposUsuarioController.php";
?>

<!--jquery-->
<script src="../../../../../library/jquery/jquery-3.3.1.min.js"></script>
<p class="breadcrumb">Painel de Controle > Usuarios</p>
<h3 class="font-weight-light">Usuarios</h3>
<hr>

<div id="tela-aguarde" hidden>
    <div id="imagem-aguarde">
        <img src="img/loading.gif">
    </div>
</div>

<!--Chama o componente msginfo-->
<?php include '../../../../componentes/msginfo.php' ?>

<form id="formulario-usuario" action="frmUsuarios/salvaUsuario.php" method="post">


    <input name="criado_em" type="hidden" id="criado_em" value="<?php

    echo date('d-m-Y H:i:s');

    ?>">

    <input name="modificado_em" type="hidden" id="modificado_em" value="<?php

    echo date('d-m-Y H:i:s');

    ?>">


    <div class="form-group">
        <label for="nome">Nome (*)</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome Usuario" required>
    </div>

    <div class="form-group">
        <label for="email">Email (*)</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
    </div>

    <div class="form-group">
        <label for="senha">Senha (*)</label>
        <input name="senha" type="pass" class="form-control" id="senha" placeholder="password" required>
    </div>

    <div class="form-group">
        <label for="tipo_usuario_id">Tipo de usuario (*)</label>
        <select class="form-control" id="tipo_usuario_id" name="tipo_usuario_id" required>
            <option value="" selected="Selecione">Selecione</option>
            <?php
            $tipoUsuario = new TiposUsuarioController();
            foreach ($tipoUsuario->ListarTodos() as $linha): ?>
                <option value="<?php echo $linha->id; ?>">
                    <?php echo $linha->descricao; ?>
                </option>
            <?php endforeach;
            ?>

        </select>
    </div>

    <div class="form-group">
        <label for="status">Status (*)</label>
        <select class="form-control" id="status" name="status" required>
            <option value="" selected="Selecione">Selecione</option>
            <option value="ATIVO">Ativo</option>
            <option value="INATIVO">Inativo</option>
        </select>
    </div>

    <button id="botao-salvar" type="submit" class="btn btn-sucess">Salvar</button>
    <button type="button" class="btn btn-default">Voltar</button>
</form>
<script src="frmUsuarios/js/carregaAjax.js"></script>


