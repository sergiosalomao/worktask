<?php
require_once "../../Definicoes.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo APP_TITULO_CAPTION ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Estilos e scripts da pagina-->
    <link rel="stylesheet" type="text/css" href="css/estilos_default.css">
    <script src="painelControle/js/scripts.js"></script>

    <!--Leaf Framework-->
    <link rel="stylesheet" type="text/css" href="../../../library/leafs/css/leaf-all-1.0.css">
    <script src="../../../library/leafs/js/leaf-all-1.0.js"></script>

    <!-- <!--bootstrap-->
    <!--<link rel="stylesheet" type="text/css" href="../../../library/bootstrap-4.0.0/dist/css/bootstrap.css">-->
    <!-- <script src="../../../library/bootstrap-4.0.0/dist/js/bootstrap.js"></script>-->

    <!--jquery-->
    <script src="../../../library/jquery/jquery-3.3.1.min.js"></script>
</head>
<!--Chama o json do menu -->
<script>$(document).ready(function () {
        carregarDados();
    });
</script>

<body>


<div id="div-top">
    <h3 class="font-weight-normal white"><?php echo APP_TITULO_CAPTION ?></h3>
</div>

<div>
    <div class="oculpar-tela-toda row">
        <div class="col-sm-2 bg-dark">
            <div class="" style="height:auto">
                <div id="div-menu-dashboard" class="sidenav sidenav-column"></div>
            </div>
        </div>

        <div class="col-sm bg-light" style="position:relative;top: 0px">
            <div>

                <?php
                if (isset($_POST['link'])){
                    $pagina = $_POST['link'];
                } else {
                    $pagina = "frmDashboard.php"; //pagina padrao
                };

                include $pagina ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

