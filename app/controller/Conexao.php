<?php
/**
 * Classe de conexão ao banco de dados usando PDO no padrão Singleton.
 * Modo de Usar:
 * require_once './Conexao.class.php';
 * $db = Conexao::conexao();
 * E agora use as funções do PDO (prepare, query, exec) em cima da variável $db.
 */

require_once  dirname ( __DIR__). "/Definicoes.php";

class Conexao
{
    # Variável que guarda a conexão PDO.
    protected static $dsn;
    # Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct()
    {
        # Informações sobre o banco de dados:
        $db_host = DB_HOST;
        $db_nome = DB_NAME;
        $db_usuario = DB_USUARIO;
        $db_senha = DB_SENHA;
        $db_driver = DB_DRIVER;
        # Informações sobre o sistema:
        $sistema_titulo = APP_TITULO_CAPTION;
        $sistema_email = APP_EMAIL;

        self::$dsn = new PDO("pgsql:host=localhost;port=5432;dbname=sistema;user=postgres;password=postgres");

    }
    # Método estático - acessível sem instanciação.
    public static function conexao()
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$dsn)
        {
            new Conexao();
        }
        # Retorna a conexão.
        return self::$dsn;
    }
}