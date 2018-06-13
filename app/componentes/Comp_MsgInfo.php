<?php
Class Comp_MsgInfo
{
    #Propriedades do componente
    private $id = 'msginfo';
    private $borderRadius = 4;
    private $marginTop = 5;
    private $marginBottom = 5;
    private $marginLeft = 3;
    private $marginRight = 3;
    private $paddingBottom = 10 ;
    private $paddingLeft = 8;
    private $paddingRight = 8 ;
    private $paddingTop = 8;
    private $width = 98;


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    /**
     * @param int $borderRadius
     */
    public function setBorderRadius($borderRadius)
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @return int
     */
    public function getMarginTop()
    {
        return $this->marginTop;
    }

    /**
     * @param int $marginTop
     */
    public function setMarginTop($marginTop)
    {
        $this->marginTop = $marginTop;
    }

    /**
     * @return int
     */
    public function getMarginBottom()
    {
        return $this->marginBottom;
    }

    /**
     * @param int $marginBottom
     */
    public function setMarginBottom($marginBottom)
    {
        $this->marginBottom = $marginBottom;
    }

    /**
     * @return int
     */
    public function getMarginLeft()
    {
        return $this->marginLeft;
    }

    /**
     * @param int $marginLeft
     */
    public function setMarginLeft($marginLeft)
    {
        $this->marginLeft = $marginLeft;
    }

    /**
     * @return int
     */
    public function getMarginRight()
    {
        return $this->marginRight;
    }

    /**
     * @param int $marginRight
     */
    public function setMarginRight($marginRight)
    {
        $this->marginRight = $marginRight;
    }

    /**
     * @return int
     */
    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    /**
     * @param int $paddingBottom
     */
    public function setPaddingBottom($paddingBottom)
    {
        $this->paddingBottom = $paddingBottom;
    }

    /**
     * @return int
     */
    public function getPaddingLeft()
    {
        return $this->paddingLeft;
    }

    /**
     * @param int $paddingLeft
     */
    public function setPaddingLeft($paddingLeft)
    {
        $this->paddingLeft = $paddingLeft;
    }

    /**
     * @return int
     */
    public function getPaddingRight()
    {
        return $this->paddingRight;
    }

    /**
     * @param int $paddingRight
     */
    public function setPaddingRight($paddingRight)
    {
        $this->paddingRight = $paddingRight;
    }

    /**
     * @return int
     */
    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    /**
     * @param int $paddingTop
     */
    public function setPaddingTop($paddingTop)
    {
        $this->paddingTop = $paddingTop;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }


    public function render()
    {
        $obj = null;
        $obj .= "<style>";
        $obj .= "#$this->id" . "{";
        $obj .= "padding-top:$this->paddingTop"."px;";
        $obj .= "padding-bottom:$this->paddingBottom"."px;";
        $obj .= "padding-left:$this->paddingLeft"."px;";
        $obj .= "padding-right:$this->paddingRight"."px;";
        $obj .= "margin-top:$this->marginTop"."px;";
        $obj .= "margin-bottom:$this->marginBottom"."px;";
        $obj .= "margin-left:$this->marginLeft"."px;";
        $obj .= "margin-right:$this->marginRight"."px;";
        $obj .= "border-radius:$this->borderRadius"."px;";
        $obj .= "width:$this->width"."%;";
        $obj .= "};";
        $obj .= "</style>";

        $obj .= "<div id='$this->id'></div>";
        echo $obj;
    }


}



