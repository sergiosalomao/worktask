<?php

/* Configurações do sistema*/
/* =============================*/

/* Ambientes de desenvolvimento*/
/* =============================*/
/* Tipos de Ambientes
/* TESTE    = A configuracao de alguns links do sistema ficam definidas como local
/* PRODUCAO = Configura para uso remoto.
*/

const AMBIENTE = 'TESTE';


#informa o nome da pasta do projeto.
const APP_FOLDER = 'worktask';

#informa a versao atual
const APP_VERSAO = '1.0';

#informa a nome do caption das telas do sistema
const APP_TITULO_CAPTION = 'WorkTask' . ' ' . APP_VERSAO;

/* =====================================================================================*/

/* Configuracao de Links de Imagens*/
/* =============================*/

If (AMBIENTE == "TESTE") {
    $pasta = "";
} else If (AMBIENTE == "PRODUCAO") {
    $pasta =  "/".APP_FOLDER;
}

#botao editar
define("BTN_EDIT", $pasta . "/library/glyphicons/png/glyphicons-151-edit.png");

#botao apagar
define("BTN_DELETE", $pasta . "/library/glyphicons/png/glyphicons-192-minus-sign.png");

