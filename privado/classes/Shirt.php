<?php
namespace classes;

class ShirtList{
    private $list;
    private $table = "shirt";

    public function __construct(){
        $this->list = array();
    }

    public function getShirt(){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table;
        $res = $conection->consult($sql);
        
        while(list($id,$ref,$name,$color,$price,$size,$category,$pic) = mysqli_fetch_array($res)){
            $row = new Shirt();
            $row->fillObj($id,$ref,$name,$color,$price,$size,$category,$pic);
            array_push($this->list,$row);
        }
    }

    public function listOfShirts(){
        $txt = "";

        for($i=0;$i<count($this->list);$i++){
            $txt .= $this->list[$i]->getRow();
        }

        return $txt;
    }
}

class Shirt{
    private $id;
    private $ref;
    private $name;
    private $color;
    private $price;
    private $size;
    private $category;
    private $pic;
    private $table = "shirt";
    private $folder = "../img/";

    public function __construct($ref="",$name="",$color="", $price="", $size="", $category="", $pic="") {
        $this->ref = $ref;
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;        
        $this->size = $size;
        $this->category = $category;
    }

    public function getId(){
        return $this->id;
    }

    public function getRef(){
        return $this->ref;
    }

    public function getName(){
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getSize(){
        return $this->size;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getPic(){
        return $this->pic;
    }

    public function insert($form,$pic=""){
        $conection = new Db();
        $conection->insertDB($this->table,$form,$pic,$this->folder);
    }

    public function fillObj($id,$ref,$name,$color, $price, $size, $category,$pic) {
        $this->id = $id;
        $this->ref = $ref;
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;        
        $this->size = $size;
        $this->category = $category;      
        $this->pic = $pic;
    }

    public function getRow(){
        $txt = "<div class='product'>
            <div class='picture'>
                <img class='shirt' src='../img/" . $this->pic . "'>
                <span class='heart'>♡</span>
            </div>
            <div class='especification'>
                <p>" . $this->name . "</p>
                <p class='price'>" . $this->price . "€</p>
                <div class='color'>
                    <span style='color: ". $this->color . ";'>▀</span>
                </div>
                <a href='newShirt.php?id=". $this->id.";'>Modificar producto</a> 
            </div>
        </div>";

        return $txt;
    }

    public function getByID($id){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        $res = $conection->consult($sql);
        
        list($id,$ref,$name,$color, $price, $size, $category,$pic) = mysqli_fetch_array($res);
        $this->id = $id;
        $this->ref = $ref;
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;        
        $this->size = $size;
        $this->category = $category;      
        $this->pic = $pic;
    }

    public function update($id,$data,$pic){
        $conection = new Db();
        $conection->updateDB($id,$this->table,$data,$pic,$this->folder);
        header("catalog.php");
    }
}

