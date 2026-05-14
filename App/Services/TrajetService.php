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

    /**
     * Send the form array to the create function
     * 
     * @return bool success of the sql request : true/false
     */
    public function createTrajet($formCreate) {
        return $this->trajetModel->create($formCreate);
    }
}

?>