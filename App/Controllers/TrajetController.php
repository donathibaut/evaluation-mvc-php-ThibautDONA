<?php

namespace App\Controllers;

use App\Services\TrajetService;
use Core\Config;

/**
 * Controller of the data from the trajets table
 */
class TrajetController {

    /**
     * Manage the relation between the webpage and the data from the database
     * 
     * + include -> webpage
     */
    public function linkDataView() {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : no access to the database");
        } else {
            $trajetService = new TrajetService($db);
            $trajet = $trajetService->getTrajetsList();

            include __DIR__ . '/../../templates/home.php';
        }
    }
}

?>