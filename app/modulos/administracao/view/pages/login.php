<?php
require_once "../../../../../app/appConfig.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo APP_TITULO_CAPTION ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos_default.css">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="../../../../../library/bootstrap-4.0.0/dist/css/bootstrap.css">
    <script src="../../../../../library/bootstrap-4.0.0/dist/js/bootstrap.js"></script>
    <!--Leaf Framework-->
    <link rel="stylesheet" type="text/css" href="../../../../../library/leafs/css/leaf-all-1.0.css">
    <script src="../../../../../library/leafs/js/leaf-all-1.0.js"></script>
</head>

<body class="bg-light">
<!-- login -->

<div class="boxspace login">
    <div>
        <h1 class="text-center">ADMIN<span class="warning">WorkTask</span></h1>
    </div>
    <div class="boxspace lg bg-white">
        <p class="dark text-center font-weight-normal">Autenticação</p>
        <form action=painelControle.php>
            <div class="form-group input-icon">
                <span class="fa fa-envelope dark"></span>
                <input type="pass" class="form-control" id="inputUser" placeholder="User Name">
            </div>
            <div class="form-group input-icon">
                <span class="fa fa-key dark"></span>
                <input type="password" class="form-control" id="inputPass" placeholder="Password">
            </div>
            <div class="form-group">
            </div>
            <div class="aling-item-end">
                <div>
                    <a href="#" class="active font-weight-light">Esqueci minha senha</a>
                </div>
                <div>
                    <input type="submit" class="btn btn-active " value="Entrar">
                </div>
        </form>
    </div>

</body>
</html>