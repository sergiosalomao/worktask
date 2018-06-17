<?php
# classe personalizada instanciada
# sempre que um erro ocorrer no sistema
Class ErrorControl extends Exception
{
# email de quem deve receber o aviso de erro
//var $mailAdmin = 'sans.pds@gmail.com';

    function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
        $hoje = date('Y-m-d H:i:s');
        error_log(
            "\n ======== $hoje =========" .
            "\n Erro no arquivo : " . $this->getFile() .
            "\n Linha:      " . $this->getLine() .
            "\n Mensagem:   " . $this->getMessage() .
            "\n Codigo:     " . $this->getCode() .
            "\n Trace(str): " . $this->getTraceAsString()
            , 3
            , 'log_de_erros.txt'
        );
    }

public function teste(){
        echo 'teste funciiona';
}
}
