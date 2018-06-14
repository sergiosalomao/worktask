<?php

Class Comp_StatusBar
{
    #Propriedades do componente
    private $id = 'statusbar';
    private $style = null;

    public function __construct()
    {

        $this->style = (array(
            /*Estilos Padrão*/
            "margin:3px",
            "padding:5px",
            "background-color:#e1e1e1",
            "color:black",
            "width:100%",
            "height:35px",
            "text-aling:left",
            "font-weight: light"));

        $this->styles($this->style);
    }

    public function styles($style)
    {
        $this->style = str_replace(",", ";", implode(",", $style));
    }

    public function render($col1)
    {
        $totalArrayCol1 = count($col1);
        $c1 = null;

        foreach ($col1 as $value) {
             $c1.= $value;
        }

        $statusbar = "<div style='$this->style'>";
        $statusbar.= $c1;
        echo  $statusbar.= "</div>";


    }

}
