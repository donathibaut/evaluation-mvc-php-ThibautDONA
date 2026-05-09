<?php

namespace App\Models;

use PDO;

/**
 * Model of the grpUsers table
 */
class grpUsersModel {
    private $connect;
    private $table = "grpUsers";

    /** Table properties */
    public $id;
    public $id_user;

    /**
     * Constructor
     * 
     * @param PDO connection instance to the database
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * Read the data from the columns in the grpUsers table
     * 
     * @return PDOStatement read data from the database
     */
    public function read(){
        $query = "SELECT ID_GRPUSERS, ID_USER FROM ".$this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data;
    }
}

?>