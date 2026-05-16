<?php

namespace App\Controllers;

use App\Services\AgenceService;
use Core\Config;

/**
 * Controller of the data from the agences table
 */
class AgenceController {

    /**
     * Manage the relation between the webpage and the data from the database
     * 
     * + include -> webpage
     */
    public function linkAgence() {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : no access to the database");
        } else {
            $agenceService = new AgenceService($db);
            $agence = $agenceService->getAgencesList();

            include __DIR__ . '/../../templates/home.php';
        }
    }
}

?>