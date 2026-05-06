<?php

namespace App\Models;

use PDO;

class userModel {
    private $connect;
    private $table = "users";

    public $id;
    public $nomUser;
    public $prenomUser;
    public $phoneNb;
    public $mailAddress;
    public $password;
    public $isAdmin;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function read(){
        $query = "SELECT ID_USER, nom_user, prenom_user, tel, mail, password, is_admin FROM ".$this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data;
    }
}

?>