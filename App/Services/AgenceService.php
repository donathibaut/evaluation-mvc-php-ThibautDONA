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

    /**
     * Get one agence from the table
     * 
     * @return array data from the table
     */
    public function getOneAgence(int $thisOne) {
        return $this->agenceModel->readOne($thisOne);
    }

    /**
     * Send the form array to the create function
     * 
     * @return bool success of the sql request : true/false
     */
    public function createAgence(string $securedInput) {
        return $this->agenceModel->create($securedInput);
    }

    /**
     * Send the agence ID to the delete function
     * 
     * @return bool success of the sql request : true/false
     */
    public function deleteAgence(int $agenceID) {
        return $this->agenceModel->delete($agenceID);
    }

    /**
     * Send the agence ID + the form to the update function
     * 
     * @return bool success of the sql request : true/false
     */
    public function updateAgence(string $securedInput, int $agenceID) {
        return $this->agenceModel->update($securedInput, $agenceID);
    }
}

?>