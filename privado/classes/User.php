<?php
namespace classes;

class User{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $table = "user";

    public function __construct($name="",$surname="", $email="", $password="") {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function insert($form){
        $conection = new Db();
        $conection->insertDB($this->table,$form);
    }

    public function fillObj($id,$name,$surname, $email, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
    }

    public function getRow(){
        $txt = "<div class='row'>
            <p>" . $this->name . "</p>
            <p>" . $this->surname . "</p>
            <p>" . $this->email . "</p>
            <p><a href='newCategory.php?id=" . $this->id . ";'>Modificar</a></p>
        </div>";

        return $txt;
    }

    public function getByID($id){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        $res = $conection->consult($sql);
        
        list($id,$name,$surname, $email, $password) = mysqli_fetch_array($res);
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
    }

    public function update($id,$data){
        $conection = new Db();
        $conection->updateDB($id,$this->table,$data);
        header("users.php");
    }
}

