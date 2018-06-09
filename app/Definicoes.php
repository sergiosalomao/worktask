<?php

#versao atual do sistema
define("APP_VERSAO", "1.0",TRUE);

#email para suporte do sistema
define("APP_EMAIL", "salomao.leite@hotmail.com");

#caption com versao do sistema
define("APP_TITULO_CAPTION", "WorkTask" . APP_VERSAO ,TRUE);

#driver usado na conexao
define("DB_DRIVER", "pgsql");

#nome do servidor
define("DB_HOST", "localhost");

#numero da porta de conexao do servidor
define("DB_PORTA", "5432");

#nome do database (nao é o schema)
define("DB_NAME", "sistema");

#nome do usuario do banco
define("DB_USUARIO", "postgres");

#senha de acesso do banco
define("DB_SENHA", "postgres");

#link montado com as informações do banco
define("DB_LINK_CONEXAO",DB_DRIVER.":host=".DB_HOST.";port=".DB_PORTA.";dbname=".DB_NAME.";user=".DB_USUARIO.";password=".DB_SENHA);

#endereco das paginas
define("PATH_PAGES","app/view/pages/");

