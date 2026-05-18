<?php 

namespace App\Middlewares;

use App\Services\AgenceService;

/**
 * Check consistency
 */
class AgenceMiddleware {
    private $connect;

    /**
     * Constructor
     * 
     * @param PDO $db call the model
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * + Check if the user is an admin before saving the new agence
     * + Secure the user txt input
     * 
     * @return bool success of the sql request : true/false
     */
    public function createAgenceMW(array $formCreate) {
        if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
            exit("Connection Error : Vous n'êtes pas autorisé à effectuer cette action !");
        }

        $trim = trim($formCreate['ville_agence']);
        $convert = mb_convert_case($trim, MB_CASE_TITLE, "UTF-8");
        $securedInput = htmlspecialchars($convert);

        $agenceService = new AgenceService($this->connect);
        return $agenceService->createAgence($securedInput);
    }

    /**
     * + Check if the user is an admin before saving the new agence
     * 
     * @return bool success of the sql request : true/false
     */
    public function deleteAgenceMW(string $agenceID) {
        if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
            exit("Connection Error : Vous n'êtes pas autorisé à effectuer cette action !");
        }

        $agenceService = new AgenceService($this->connect);
        return $agenceService->deleteAgence($agenceID);
    }

    /**
     * + Check if the user is an admin before saving the new agence
     * + Secure the user txt input
     * 
     * @return bool success of the sql request : true/false
     */
    public function updateAgenceMW(array $formUpdate, string $agenceID) {
        if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
            exit("Connection Error : Vous n'êtes pas autorisé à effectuer cette action !");
        }

        $trim = trim($formUpdate['ville_agence']);
        $convert = mb_convert_case($trim, MB_CASE_TITLE, "UTF-8");
        $securedInput = htmlspecialchars($convert);

        $agenceService = new AgenceService($this->connect);
        return $agenceService->updateAgence($securedInput, $agenceID);
    }
}

?>