<?php
namespace class;
class Client{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;

    public function __construct($id,$name,$surname,$email,$phone,$address) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }  
}