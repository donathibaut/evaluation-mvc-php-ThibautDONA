<?php

namespace App\Models;

use PDO;

/**
 * Model of the users table
 */
class UserModel {
    private $connect;
    private $table = "users";

    /** Table properties */
    public $id;
    public $nomUser;
    public $prenomUser;
    public $phoneNb;
    public $mailAddress;
    public $password;
    public $isAdmin;

    /**
     * Constructor
     * 
     * @param PDO $db connection instance to the database
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * Read the data from the columns in the users table
     * 
     * @return PDOStatement read data from the database
     */
    public function read(){
        $query = "SELECT ID_USER, nom_user, prenom_user, tel, mail, password, is_admin FROM ".$this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data;
    }
}

?>