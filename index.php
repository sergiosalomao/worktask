<?php
session_start();
$_SESSION['Nome'] = 'anonimo';

set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] );
error_reporting( E_ALL & (~E_NOTICE | ~E_USER_NOTICE) );
ini_set( 'error_log', '/log/php_erros.log' );
ini_set( 'ignore_repeated_source', true );
ini_set( 'ignore_repeated_errors', true );
ini_set( 'display_errors', true);
ini_set( 'log_errors', true );


/*Carrega Componentes*/
require_once('AutoLoad.php');
require_once "app/appConfig.php";
//require_once "app/ErrorControl.php";
//require_once "app/modulos/administracao/controller/Conexao.php";
//require_once "app/componentes/Comp_StatusBar.php";
//require_once "app/componentes/Comp_LinkScreen.php";
//require_once "app/componentes/Comp_MsgInfo.php";


?>

<script>
    window.location.href = 'app/modulos/administracao/view/pages/login.php';
</script>

