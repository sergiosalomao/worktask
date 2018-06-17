<?php

class AutoLoad {

    public function __construct() {
        echo "Iniciada Classe Autoload" ?> <br> <?php
        spl_autoload_register('AutoLoad::AppLoader');
        spl_autoload_register('AutoLoad::ComponentesLoader');
        spl_autoload_register('AutoLoad::ControllerLoader');
        spl_autoload_register('AutoLoad::ModelLoader');

        spl_autoload_extensions('.php');
        //spl_autoload_register(array($this, 'load'));

    }

    public static function AppLoader($className)
    {
        $extension = spl_autoload_extensions();

        if (file_exists(__DIR__ . "/app/". $className . $extension))
        {
            echo "Iniciada Classe : " . $className; ?> <br> <?php
            require_once(__DIR__ . "/app/". $className . $extension);
        }
    }

    public static function ComponentesLoader($className)
    {

        echo "Iniciada Classe : " . $className; ?> <br> <?php
        $extension = spl_autoload_extensions();
        if (file_exists(__DIR__ . "/app/componentes/". $className . $extension))
        {
            require_once(__DIR__ . "/app/componentes/". $className . $extension);
        }
    }

    public static function ControllerLoader($className)
    {

        echo "Iniciada Classe : " . $className; ?> <br> <?php


        $extension = spl_autoload_extensions();
        //if (file_exists(__DIR__ . "app/modulos/administracao/controller/". $className . $extension))
       // {
           // echo __DIR__ . "/modulos/administracao/controller/". $className . $extension;
            require_once(__DIR__ . "/app/modulos/administracao/controller/". $className . $extension);
        //}

    }


    public static function ModelLoader($className)
    {

        echo "Iniciada Classe : " . $className; ?> <br> <?php


        $extension = spl_autoload_extensions();
        //if (file_exists(__DIR__ . "app/modulos/administracao/controller/". $className . $extension))
        // {
        // echo __DIR__ . "/modulos/administracao/model/". $className . $extension;
        require_once(__DIR__ . "/app/modulos/administracao/model/". $className . $extension);
        //}

    }


}

$autoload = new Autoload();