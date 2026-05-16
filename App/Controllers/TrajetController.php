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
            // Get the Agences List for the form-trajet
            if($form === 'form-trajet') {
                $agenceService = new AgenceService($db);
                $agence = $agenceService->getAgencesList();
            }

            // read one trajet to make the UPDATE form
            if(isset($_GET['form-goal']) && $_GET['form-goal'] === 'update' && isset($_GET['trajet_id'])) {
                $oneTrajet = $trajetService->getOneTrajet($_GET['trajet_id']);
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
            $mw = $trajetMiddleware->createTrajetMW($formCreate);

            // Avoid duplicated sql INSERT on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }

    /**
     * Control the trajet deletion path
     */
    public function ctrlDeleteTrajet(string $trajetID, string $authorID) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $trajetMiddleware = new TrajetMiddleware($db);
            $mw = $trajetMiddleware->deleteTrajetMW($trajetID, $authorID);

            // Avoid duplicated sql DELETE attempts on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }

    /**
     * Control the trajet update path
     */
    public function ctrlUpdateTrajet(array $formUpdate, string $trajetID, string $authorID) {
        $config = new Config();
        $db = $config->getConnection();

        if ($db === null) {
            exit("Connection Error : Pas d'accès à la base de données");
        } else {
            $trajetMiddleware = new TrajetMiddleware($db);
            $mw = $trajetMiddleware->updateTrajetMW($formUpdate, $trajetID, $authorID);

            // Avoid duplicated sql INSERT on refresh
            if($mw) {
                header('Location: index.php?page=home');
                exit;
            }
        }
    }
}

?>