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
            echo "Dentro en DB";
            $route = uploadPic($pic,$folder,5000000);
            $keys[] = "picture";
            $values[] = "'" . $route . "'";
        }

        $sql = "INSERT INTO " . $table . " (" . implode(",",$keys) . ") VALUES (" . implode(",",$values) . ")";
        $this->conection->query($sql);
    }
}