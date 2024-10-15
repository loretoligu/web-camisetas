<?php
namespace classes;

class Shirt{
    private $ref;
    private $color;
    private $price;
    private $size;
    private $category;
    private $pic;

    public function __construct($ref,$color, $price, $size, $category, $pic) {
        $this->ref = $this->setRef($ref);
        $this->color = $color;
        $this->price = $price;        
        $this->size = $size;
        $this->category = $category;
        
        if($pic !=""){
            $this->savePic($pic);
        }
    }

    public function getRef(){
        return $this->ref;
    }

    public function setRef($ref){
        if(is_numeric($ref)){
            $this->ref = $ref;
        }
    }

    private function savePic($pic){
        $this->pic = uploadPic($pic,"../img/",5000000);
    }

    public function printTable(){
        $tablaHTML = "<table border='1'>";
        $tablaHTML .= "<tr>
            <th>Referencia</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Talla</th>
            <th>Tematica</th></tr>";
        $tablaHTML .= "<tr>
            <td>" . $this->ref . "</td>
            <td>" . $this->color . "</td>
            <td>" . $this->price . "</td>
            <td>" . $this->size . "</td>
            <td>" . $this->category . "</td></tr>";
        $tablaHTML .= "</table>";

        return $tablaHTML;
    }
}
