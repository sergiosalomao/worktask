<!--carrega css default-->
<link rel="stylesheet" type="text/css" href="frmUsuarios/css/default.css">

<?php
$linkscreen = new Comp_LinkScreen();
$linkscreen->render(array(
    'Painel de Controle',
    'Usuarios'));
?>

<div class="container">
    <h3 id="titulo" class="font-weight-light">Usuarios</h3>
    <hr>
    <div class="container">
        <!--Chama o componente msginfo-->
        <?php
        $msgInfo = new Comp_MsgInfo();
        $msgInfo->render();
        ?>

        <?php include 'frmUsuarios/frames/form.php' ?>

        <div id="menu">
            <button id="btn-salvar" type="submit" class="btn btn-sucess" onclick="salvar()">Salvar</button>
            <button id="btn-lista" type="button" class="btn btn-info" onclick="mostrarLista()">Listar
            </button>
            <button id="btn-pncontrole" type="button" class="btn btn-default" onclick="window.location.href = 'frmDashboard.php'">Painel Controle</button>
        </div>

        <?php include 'frmTipoUsuarios/frames/list.php' ?>

        <?php
        $statusbar = new Comp_StatusBar();
        $statusbar->render(array(
            "<p class='font-weight-light' id='totalReg'></p>"));
        ?>
    </div>
</div>


<!--Carrega os scripts da pagina-->
<script src="frmUsuarios/js/scripts.js"></script>

<!--Carrega o arquivo que chama o ajax do formulario-->
<script src="frmUsuarios/js/carregaAjax.js"></script>


