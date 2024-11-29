<?php
namespace classes;

use mysqli;

class Db{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $dataBase = "tshirtshop";
    private $conection;

    public function __construct(){
        $this->conection = new mysqli($this->server,$this->user,$this->password,$this->dataBase);
        $this->conection->query("SET NAMES 'utf8'");
    }

    public function insertDB($table,$postData,$pic="",$folder=""){
        $keys = array();
        $values = array();

        foreach ($postData as $key => $value) {
            $keys[] = $key;
            $values[] = "'" . $value . "'";
        }

        if($pic != ""){
            $route = uploadPic($pic,$folder,5000000);
            $keys[] = "picture";
            $values[] = "'" . $route . "'";
        }

        $sql = "INSERT INTO " . $table . " (" . implode(",",$keys) . ") VALUES (" . implode(",",$values) . ")";
        $this->conection->query($sql);
    }

    public function consult($sql){
        $res = $this->conection->query($sql);
        return $res;
    }

    public function updateDB($id, $table, $data, $pic = "", $folder = ""){
        $query = array();
        foreach ($data as $field => $value) {
            if ($field != "id" && $field != "x" && $field != "y") {
                $query[] = $field . "='".addslashes($value)."'";
            }
        }

        if($pic!= "" && strlen($pic['name'])>0){
            $rute= uploadPic($pic, $folder,5000000);
            $query[] = "picture='".$rute."'";
        }

        $fields = implode(",", $query);
        $sql = "UPDATE " . $table . " SET " . $fields . " WHERE id=" . $id;
        $conection = new Db();
        echo $sql;
        $conection->consult($sql);
    }
}