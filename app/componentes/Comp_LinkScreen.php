<?php
Class Comp_LinkScreen
{

    #Propriedades do componente
    private $id = 'linkscreen';
    private $backgroundColor = '#e2e2e2';
    private $color = '#036ddd';
    private $borderRadius = '3';
    private $padding = 10;
    private $margin = 4;


    public function render($rotasArray)
    {
        $obj = null;
        $obj .= "<style>";
        $obj .= "#$this->id" . "{";
        $obj .= "padding:$this->padding" . "px;";
        $obj .= "margin:$this->margin" . "px;";
        $obj .= "background-color:$this->backgroundColor" . ";";
        $obj .= "border-radius:$this->borderRadius" . "px;";
        $obj .= "color:$this->color" . ";";
        $obj .= "};";
        $obj .= "</style>";
        echo $obj;

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
        echo $linkscreen = "<p id='$this->id'>$rotas</p>";
    }
}
