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
CONST AMBIENTE = 'PRODUCAO';

#informa o nome da pasta do projeto.
CONST APP_FOLDER = 'worktask';

#informa a versao atual
CONST APP_VERSAO = '1.0';

#informa a nome do caption das telas do sistema
CONST APP_TITULO_CAPTION = 'WorkTask' . ' ' . APP_VERSAO;


#Definicoes
#=============================

If (AMBIENTE == "TESTE")
{
    $param =  'DOCUMENT_ROOT';
    $pasta = null;

} else If (AMBIENTE == "PRODUCAO")
{
    $param =  'SERVER_NAME';
    $pasta =  "/".APP_FOLDER;
    $pathRoot = "app/" ;
}

#Path de Imagens Default
#=============================

#imagem do botao editar
define("BTN_EDIT", $pasta . "/library/glyphicons/png/glyphicons-151-edit.png");

#imagem do botao deletar
define("BTN_DELETE", $pasta . "/library/glyphicons/png/glyphicons-192-minus-sign.png");

/*Path do Endereco Root*/
define('ROOT_DIR', filter_input(INPUT_SERVER, $param) .$pasta. '/');