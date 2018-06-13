<!--carrega css default-->
<link rel="stylesheet" type="text/css" href="frmTipoUsuarios/css/default.css">



<?php $linkScreen = new Comp_LinkScreen();
$rotas = array(
    '0' => 'Painel de Controle',
    '1' => 'Tipos de Usuarios');
echo $linkScreen->render($rotas);
?>

<h3 id="titulo" class="font-weight-light">Tipos de Usuarios</h3>

<hr>
<div class="container">
    <!--Chama o componente msginfo-->
    <?php
        $msgInfo = new Comp_MsgInfo();
        $msgInfo->render();
    ?>

    <?php include 'frmTipoUsuarios/frames/form.php' ?>

    <div id="menu">
        <button id="btn-salvar" type="submit" class="btn btn-sucess" onclick="salvar()">Salvar</button>
        <button id="btn-lista" type="button" class="btn btn-info" onclick="mostrarLista()">Mostrar Relatorio</button>
        <button id="btn-voltar" type="button" class="btn btn-default">Voltar</button>
    </div>


    <?php include 'frmTipoUsuarios/frames/list.php' ?>

</div>
<!--Carrega os scripts da pagina-->
<script src="frmTipoUsuarios/js/scripts.js"></script>

<!--Carrega o arquivo que chama o ajax do formulario-->
<script src="frmTipoUsuarios/js/carregaAjax.js"></script>


