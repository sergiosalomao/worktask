<form id="formulario-usuario" method="post">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="nome">Nome (*)</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome Usuario" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="email">Email (*)</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com"
                       required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="senha">Senha (*)</label>
                <input name="senha" type="password" class="form-control" id="senha" placeholder="password" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="senha">Confirma (*)</label>
                <input name="senha2" type="password" class="form-control" id="senha2" placeholder="password" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
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
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="status">Status (*)</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="" selected="Selecione">Selecione</option>
                    <option value="ATIVO">Ativo</option>
                    <option value="INATIVO">Inativo</option>
                </select>
            </div>
        </div>
    </div>
</form>
