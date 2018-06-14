<?php

Class Comp_LinkScreen
{
    #Propriedades do componente
    private $id = 'linkscreen';
    private $style = null;

    public function __construct()
    {
        $this->style = (array(
            /*Estilos Padrão*/
            "margin:5px",
            "padding:7px",
            "background-color:#ddd7",
            "color:blue",
            "width:98%",
            "font-weight: light"));

        $this->styles($this->style);
    }

    public function styles($style)
    {
        $this->style = str_replace(",", ";", implode(",", $style));
    }

    public function render($rotasArray)
    {
        $nRotas = count($rotasArray);
        $contador = 1;
        $rotas = null;
        foreach ($rotasArray as $value) {
            if ($contador < $nRotas) {
                $rotas .= $value . " > ";
            } else if ($contador = $nRotas) {
                $rotas .= $value;
            }
            $contador++;
        }
        echo $linkscreen = "<p style='$this->style' id='$this->id'>$rotas</p>";
    }
}
