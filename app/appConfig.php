<?php

#Configurações do sistema
#=============================

/* Ambientes de desenvolvimento*/
/* =============================*/
/* Tipos de Ambientes
/* TESTE    = A configuracao de alguns links do sistema ficam definidas como local
/* PRODUCAO = Configura para uso remoto.
*/

#Informa ambiente atual
CONST AMBIENTE = 'TESTE';

#informa o nome da pasta do projeto.
CONST APP_FOLDER = 'worktask';

#informa a versao atual
CONST APP_VERSAO = '1.0';

#informa a nome do caption das telas do sistema
CONST APP_TITULO_CAPTION = 'WorkTask' . ' ' . APP_VERSAO;


#Inicio das funcoes e condicoes
#======================================================================================

If (AMBIENTE == "TESTE") {
    $pasta = "";
} else If (AMBIENTE == "PRODUCAO") {
    $pasta =  "/".APP_FOLDER;
}

#imagem do botao editar
define("BTN_EDIT", $pasta . "/library/glyphicons/png/glyphicons-151-edit.png");

#imagem do botao deletar
define("BTN_DELETE", $pasta . "/library/glyphicons/png/glyphicons-192-minus-sign.png");

#Componente msginfo (estilos)
define("COMP_INFOMSG", $pasta . "/componentes/css/msginfo.css");
