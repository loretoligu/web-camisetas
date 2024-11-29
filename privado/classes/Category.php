<?php
namespace classes;

class CategoryList{
    private $list;
    private $table = "category";

    public function __construct(){
        $this->list = array();
    }

    public function getCategory(){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table;
        $res = $conection->consult($sql);
        
        while(list($id,$name) = mysqli_fetch_array($res)){
            $row = new Category();
            $row->fillObj($id,$name);
            array_push($this->list,$row);
        }
    }

    public function listOfCategories(){
        $txt = "<div class='grid'>
            <div class='row header'>
                <p>ID</p>
                <p>Temática</p>
                <p>Modificar</p>
            </div>";

        for($i=0;$i<count($this->list);$i++){
            $txt .= $this->list[$i]->getRow();
        }

        $txt .= "</div>";
        echo $txt;
        return $txt;
    }

    public function printSelect($idCategory){
        $this->getCategory();
        $html = "<select name='category'>";

        for($i=0;$i<count($this->list);$i++) {
            $html .= $this->list[$i]->printOption($idCategory);
        }

        $html .= "</select>";
        echo $html;
        return $html;
    }
}

class Category{
    private $id;
    private $name;
    private $table = "category";

    public function __construct($name="") {
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function insert($form){
        $conection = new Db();
        $conection->insertDB($this->table,$form);
    }

    public function fillObj($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getRow(){
        $txt = "<div class='row'>
            <p>" . $this->id . "</p>
            <p>" . $this->name . "</p>
            <p><a href='newCategory.php?id=" . $this->id . ";'>Modificar</a></p>
        </div>";

        return $txt;
    }

    public function printOption($idCategory = "" ){
        if($this->id == $idCategory){
            $html = "<option value='" . $this->id . "' selected>" . $this->name . "</option>";
        }else{
            $html = "<option value='" . $this->id . "'>" . $this->name . "</option>";
        }
        
        return $html;
    }

    public function getByID($id){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        $res = $conection->consult($sql);
        
        list($id,$name) = mysqli_fetch_array($res);
        $this->id = $id;
        $this->name = $name;
    }

    public function update($id,$data){
        $conection = new Db();
        $conection->updateDB($id,$this->table,$data);
        header("categories.php");
    }
}
