<?php

namespace App\Controllers;

use App\Middlewares\TrajetMiddleware;
use App\Services\TrajetService;
use App\Services\AgenceService;
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
    public function linkDataView($form = null) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $trajetService = new TrajetService($db);
            $trajet = $trajetService->getTrajetsList();

            // Init the agence array
            $agence = [];
            // Get the Agences List for the form-create
            if($form === 'form-create') {
                $agenceService = new AgenceService($db);
                $agence = $agenceService->getAgencesList();
            }

            include __DIR__ . '/../../templates/home.php';
        }
    }

    /**
     * Control the trajet creation path
     */
    public function ctrlCreateTrajet(array $formCreate) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $trajetMiddleware = new TrajetMiddleware($db);
            $sent = $trajetMiddleware->createTrajetMW($formCreate);

            // Avoid duplicated sql INSERT on refresh
            if($sent) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }
}

?>