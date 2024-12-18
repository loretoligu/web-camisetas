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

    public function catalogShirt(){
        $txt = "";

        for($i=0;$i<count($this->list);$i++){
            $txt .= $this->list[$i]->getShirt();
        }

        return $txt;
    }

    public function catalogView(){
        $txt = "";

        for($i=0;$i<count($this->list);$i++){
            $txt .= $this->list[$i]->getShirtView();
        }

        return $txt;
    }

    public function listOfShirts(){
        $txt = "<div class='grid'>
            <div class='row header'>
                <p>ID</p>
                <p>Referencia</p>
                <p>Nombre</p>
                <p>Color</p>
                <p>Precio</p>
                <p>Talla</p>
                <p>Temática</p>
                <p>Foto</p>
                <p>Modificar</p>
            </div>";

        for($i=0;$i<count($this->list);$i++){
            $txt .= $this->list[$i]->getRow();
        }

        $txt .= "</div>";
        echo $txt;
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

    public function getShirt(){
        $txt = "<div class='product'>
            <div class='picture'>
                <img class='shirt' src='../img/" . $this->pic . "'>
            </div>
            <div class='especification'>
                <p>" . $this->name . "</p>
                <p>Referencia: " . $this->ref . "</p>
                <p class='price'>" . $this->price . "€</p>
                <div class='color'>
                    <span style='color: ". $this->color . ";'>▀</span>
                </div>
                <a href='newShirt.php?id=". $this->id.";'>Modificar producto</a> 
            </div>
        </div>";

        return $txt;
    }

    public function getShirtView(){
        $txt = "<div class='product'>
            <div class='card'>
                <div class='picture'>
                    <img class='shirt' src='../img/" . $this->pic . "'>    
                </div>
                <span id='heart' class='material-symbols-outlined'>favorite</span>
            </div>
            <div class='especification'>
                <p>" . $this->name . "</p>
                <p class='price'>" . $this->price . "€</p>
                <div class='color'>
                    <span style='color: ". $this->color . ";'>▀</span>
                </div>
                <a>Añadir a la cesta</a> 
            </div>
        </div>";

        return $txt;
    }

    public function getRow(){
        $category = new Category(); 
        $category->getByID($this->category);
        $txt = "<div class='row'>
            <p>" . $this->id . "</p>
            <p>" . $this->ref . "</p>
            <p>" . $this->name . "</p>
            <p>" . $this->color . "</p>
            <p>" . $this->price . "</p>
            <p>" . $this->size . "</p>
            <p>" . $category->getName() . "</p>
            <img src='../img/" . $this->pic . "'>
            <p><a href='newShirt.php?id=". $this->id.";'>Modificar</a></p>
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

