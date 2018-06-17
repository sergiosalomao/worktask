<?php
# Configurações do Banco
#=============================
CONST DB_DRIVER  = "pgsql";           #driver usado na conexao
CONST DB_HOST    = "localhost";       #nome do servidor
CONST DB_PORTA   = "5432";            #numero da porta de conexao do servidor
CONST DB_NAME    = "sismod_worktask"; #nome do database (nao é o schema)
CONST DB_USUARIO = "postgres";        #nome do usuario do banco
CONST DB_SENHA   = "postgres";        #senha de acesso do banco

#link montado com as informações do banco
define("DB_LINK_CONEXAO", DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORTA . ";dbname=" . DB_NAME . ";user=" . DB_USUARIO . ";password=" . DB_SENHA);

Class Conexao extends ErrorControl
{
    # Variável que guarda a conexão PDO.
    protected static $dsn;

    # Private construct - garante que a classe só possa ser instanciada internamente.
    public function __construct()
    {

        self::$dsn = new PDO(DB_LINK_CONEXAO);
    }

    # Método estático - acessível sem instanciação.
    public static function conexao()
    {
echo "tenta conexao";
# Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$dsn) {
            new Conexao();

            # Retorna a conexão.
            return self::$dsn;
        }
    }
}

$con = new Conexao();