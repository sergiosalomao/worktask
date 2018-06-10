<div id="form">
    <form id="formulario-tipo-usuario" action="frmTipoUsuarios/salva.php" method="post">
        <div class="form-group">
            <label for="descricao">Descricao (*)</label>
            <input name="descricao" type="text" class="form-control" id="descricao"
                   placeholder="descricao do tipo de usuario" required>
        </div>

        <div class="form-group">
            <label for="obs">Observações</label>
            <textarea cols="5" rows="5" name="obs" type="text" class="form-control" id="obs"
                      placeholder="Observações"></textarea>
        </div>

    </form>
</div>