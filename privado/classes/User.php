<?php
namespace classes;

class UserList{
    private $list;
    private $table = "user";

    public function __construct(){
        $this->list = array();
    }

    public function getUser(){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table;
        $res = $conection->consult($sql);
        
        while(list($id,$name, $surname, $email, $password, $permission) = mysqli_fetch_array($res)){
            $row = new User();
            $row->fillObj($id,$name, $surname, $email, $password, $permission);
            array_push($this->list,$row);
        }
    }

    public function listOfusers(){
        $txt = "<div class='grid'>
            <div class='row header'>
                <p>ID</p>
                <p>Nombre</p>
                <p>Apellidos</p>
                <p>Email</p>
                <p>Permisos</p>
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

class User{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $permission;
    private $table = "user";

    public function __construct($name="",$surname="", $email="", $password="",$permission="") {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
        $this->permission = $permission;
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

    public function getPermission(){
        return $this->permission;
    }

    public function insert($form){
        $conection = new Db();
        $conection->insertDB($this->table,$form);
    }

    public function fillObj($id,$name,$surname, $email, $password, $permission) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
        $this->permission = $permission;
    }

    public function getRow(){
        $txt = "<div class='row'>
        <p>" . $this->id . "</p>
            <p>" . $this->name . "</p>
            <p>" . $this->surname . "</p>
            <p>" . $this->email . "</p>
            <p>" . $this->permission . "</p>
            <p><a href='newUser.php?id=" . $this->id . ";'>Modificar</a></p>
        </div>";

        return $txt;
    }

    public function getByID($id){
        $conection = new Db();
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        $res = $conection->consult($sql);
        
        list($id,$name,$surname, $email, $password, $permission) = mysqli_fetch_array($res);
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
        $this->password = $password;
        $this->permission = $permission;
    }

    public function update($id,$data){
        $conection = new Db();
        $conection->updateDB($id,$this->table,$data);
        header("users.php");
    }
}

