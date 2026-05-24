<?php

namespace App\Services;

use App\Models\TrajetModel;

class TrajetService {
    private $trajetModel;

    /**
     * Constructor
     * 
     * @param \PDO $db call the model
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
     * Get one trajet from the table
     * 
     * @return array data from the table
     */
    public function getOneTrajet(int $thisOne) {
        return $this->trajetModel->readOne($thisOne);
    }

    /**
     * Send the form array to the create function
     * 
     * @return bool success of the sql request : true/false
     */
    public function createTrajet(array $formCreate) {
        return $this->trajetModel->create($formCreate);
    }

    /**
     * Send the trajet ID to the delete function
     * 
     * @return bool success of the sql request : true/false
     */
    public function deleteTrajet(int $trajetID) {
        return $this->trajetModel->delete($trajetID);
    }

    /**
     * Send the trajet ID + the form to the update function
     * 
     * @return bool success of the sql request : true/false
     */
    public function updateTrajet(array $formUpdate, int $trajetID) {
        return $this->trajetModel->update($formUpdate, $trajetID);
    }
}

?>