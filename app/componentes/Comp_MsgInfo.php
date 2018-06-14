<?php
Class Comp_MsgInfo
{
    #Propriedades do componente
    private $id = 'msginfo';
    private $style = null;

    public function __construct()
    {
        $this->style = (array(
            /*Estilos Padrão*/
            "margin:3px",
            "padding:7px",
            "width:98%",
            "font-weight: light"));

        $this->styles($this->style);
    }

    public function styles($style)
    {
        $this->style = str_replace(",", ";", implode(",", $style));
    }
    public function render()
    {
        $msginfo = "<div id='$this->id' style='$this->style'></div>";
        echo $msginfo;
    }


}



