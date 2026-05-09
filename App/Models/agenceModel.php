<?php

namespace App\Models;

use PDO;

/**
 * Model of the agences table
 */
class agencesModel {
    private $connect;
    private $table = "agences";

    /** Table properties */
    public $id;
    public $ville;

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
     * Read the data from the columns in the agences table
     * 
     * @return PDOStatement read data from the database
     */
    public function read(){
        $query = "SELECT ID_AGENCE, ville_agence FROM ".$this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data;
    }
}

?>