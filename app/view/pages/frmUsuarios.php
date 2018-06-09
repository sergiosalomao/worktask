<?php
require_once "../../controller/TiposUsuarioController.php";
?>

<!--jquery-->
<script src="../../../library/jquery/jquery-3.3.1.min.js"></script>
<p class="breadcrumb">Painel de Controle > Usuarios</p>
<h3 class="font-weight-light">Usuarios</h3>
<hr>

<div id="tela-aguarde" hidden>
    <div id="imagem-aguarde">
        <img src="img/loading.gif">
    </div>
</div>

<form id="formulario-usuario" action="frmUsuarios/salvaUsuario.php" method="post">

    <div id="msginfo" class=""></div>
    <div class="form-group">
        <label for="inputUser">Nome (*)</label>
        <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome Usuario" required>
    </div>

    <div class="form-group">
        <label for="inputMail">Email (*)</label>
        <input name="email" type="email" class="form-control" id="inputMail" placeholder="name@example.com" required>
    </div>

    <div class="form-group">
        <label for="inputPass">Password (*)</label>
        <input name="password" type="pass" class="form-control" id="inputPass" placeholder="password" required>
    </div>

    <div class="form-group">
        <label for="tipoUsuario">Tipo de usuario (*)</label>
        <select class="form-control" id="tipoUsuario" name="tipoUsuario" required>
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
        <label for="statusUsuario">Status (*)</label>
        <select class="form-control" id="statusUsuario" name="statusUsuario" required>
            <option value="" selected="Selecione">Selecione</option>
            <option value="ATIVO">Ativo</option>
            <option value="INATIVO">Inativo</option>
        </select>
    </div>
    <button id="botao-salvar" type="submit" class="btn btn-sucess">Salvar</button>
    <button type="button" class="btn btn-default">Voltar</button>
</form>
<script>

    $(document).ready(function () {

        $('#formulario-usuario').submit(function () {
            $("#tela-aguarde").show();
            $.ajax({
                url: "frmUsuarios/salvaUsuario.php",
                type: "post",
                data: $('#formulario-usuario').serialize(),
                success:
            function (result) {
                if ($.parseJSON(result)['status'] == 'incompleto') {
                    $("#tela-aguarde").hide();
                    $('#msginfo').addClass($.parseJSON(result)['classe'])
                        .html($.parseJSON(result)['mensagem'])
                        .css({"padding": "10px"})

                  

                } else if ($.parseJSON(result)['status'] == 'salvo') {
                    $("#tela-aguarde").hide();
                    $('#msginfo').removeClass();
                    $('#msginfo').addClass($.parseJSON(result)['classe'])
                        .html($.parseJSON(result)['mensagem'])
                        .css({"padding": "10px"})
                } else {
                    $("#tela-aguarde").hide();
                    $('#msginfo').removeClass();
                    $('#msginfo').addClass($.parseJSON(result)['classe'])
                        .html($.parseJSON(result)['mensagem'])
                        .css({"padding": "10px"})

                }
            }
        })
            return false;	//Evita que a página seja atualizada
        })
    })
</script>


