<?php

/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02/06/2018
 * Time: 16:29
 */
Class PageHeader
{
    public static $instance;

    private function __construct()
    {

        $this->Title = 'TITULO DA PAGINA';
        $this->Headers = null;
        $this->Metas   = null;
        $this->Styles  = null;
        $this->Scripts = null;

    }
    // INSTANCIA ==========================================================================
    public static function getInstance()
    {
        if( !isset(self::$instance) )
        {
            self::$instance = new PageHeader();
        }
        return self::$instance;
    }

    // PROPRIEDADES =======================================================================

    public function setTitle( $newTitle ) { $this->Title = $newTitle; }

    #Escreve as funcoes
    public function write()
    {


        // Title ---------------------------------------------------------------------------------
        echo '<title>', $this->Title, '</title>', "\r\n";

        // Styles ---------------------------------------------------------------------------------
        for($i = 0; $i < count($this->Styles); $i++)
        {
            $css = $this->Styles[$i]['file'];


            echo '<link rel="stylesheet" type="text/css" href="', $css,'" />', "\r\n";
        }

        // Scripts --------------------------------------------------------------------------------
        for($i = 0; $i < count($this->Scripts); $i++)
        {
            $js = $this->Scripts[$i]['file'];


            echo '<script type="text/javascript" src="', $js,'"></script>', "\r\n";
        }
    }

    public function addStyle( $css, $cacheable = true )
    {
        // Check if file is local or url
        if( strpos($css, "http") === false )
        {
            // File is local. Check if file exists.
            if( !file_exists($css) )
            {
                App::error("Arquivo [$css] inexistente.", 0x0010);
                return;
            }
        }

        if( is_null($this->Styles) )
            $this->Styles = array();

        $this->Styles[] = array('file'=>$css, 'cache'=>$cacheable);
    }

    public function addScript( $js, $cacheable = true )
    {
        // Check if JS is local or url
        if( strpos($js, "http") === false )
        {
            // File is local. Check if file exists
            if( !file_exists($js) )
            {
                App::error("Arquivo [$js] inexistente.", 0x0011);
                return;
            }
        }

        if( is_null($this->Scripts) )
            $this->Scripts = array();

        $this->Scripts[] = array('file'=>$js, 'cache'=>$cacheable);
    }

}