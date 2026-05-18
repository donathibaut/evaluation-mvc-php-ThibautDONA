<?php

namespace App\Controllers;

use App\Middlewares\AgenceMiddleware;
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

    /**
     * Manage the relation between the webpage and the data from the database
     * 
     * + include -> webpage
     */
    public function linkDataView() {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $agenceService = new AgenceService($db);
            return $agenceService->getAgencesList();
        }
    }

    /**
     * Control the agence creation path
     */
    public function ctrlCreateAgence(array $formCreate) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $agenceMiddleware = new AgenceMiddleware($db);
            $mw = $agenceMiddleware->createAgenceMW($formCreate);

            // Avoid duplicated sql INSERT on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }

    /**
     * Control the agence deletion path
     */
    public function ctrlDeleteAgence(string $agenceID) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $agenceMiddleware = new AgenceMiddleware($db);
            $mw = $agenceMiddleware->deleteAgenceMW($agenceID);

            // Avoid duplicated sql DELETE attempts on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }

    /**
     * Control the agence update path
     */
    public function ctrlUpdateAgence(array $formUpdate, string $agenceID) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $agenceMiddleware = new AgenceMiddleware($db);
            $mw = $agenceMiddleware->updateAgenceMW($formUpdate, $agenceID);

            // Avoid duplicated sql INSERT on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }
}

?>