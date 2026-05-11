<?php

namespace App\Services;

use App\Models\TrajetModel;

class TrajetService {
    private $trajetModel;

    /**
     * Constructor
     * 
     * @param PDO $db call the model
     */
    public function __construct($db)
    {
        $this->trajetModel = new TrajetModel($db);
    }

    /**
     * Get data from the trajets table
     * 
     * @return array data from the table
     */
    public function getTrajetsList() {
        return $this->trajetModel->read();
    }
}

?>