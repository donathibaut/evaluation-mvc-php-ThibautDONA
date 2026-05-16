<?php

namespace App\Services;

use App\Models\AgenceModel;

class AgenceService {
    private $agenceModel;

    /**
     * Constructor
     * 
     * @param PDO $db call the model
     */
    public function __construct($db)
    {
        $this->agenceModel = new AgenceModel($db);
    }

    /**
     * Get data from the agences table
     * 
     * @return array data from the table
     */
    public function getAgencesList() {
        return $this->agenceModel->read();
    }
}

?>