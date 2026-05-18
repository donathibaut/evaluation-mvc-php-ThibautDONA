<?php

namespace App\Models;

use PDO;

/**
 * Model of the users table
 */
class UserModel {
    private $connect;
    private $table = "users";

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
     * @return array read data from the database
     */
    public function read(){
        $query = "SELECT ID_USER, nom_user, prenom_user, 
        tel, mail FROM "
        .$this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find the matching user by email address
     * 
     * @param string $mail
     * @return array read the corresponding user
     */
    public function findOne($mail) {
        $query = "SELECT ID_USER, nom_user, prenom_user, password, is_admin FROM "
        .$this->table
        ." WHERE mail = :mail";
        $data = $this->connect->prepare($query);
        $data->execute([
            ':mail' => $mail
        ]);
        return $data->fetch(PDO::FETCH_ASSOC);
    }
}

?>