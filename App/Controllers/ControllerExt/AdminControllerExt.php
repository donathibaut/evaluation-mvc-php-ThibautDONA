<?php
// Manage the display of ADMIN TABLES => users table & agences table

use App\Controllers\UserController;
use App\Controllers\AgenceController;
use App\Services\AgenceService;
use Core\Config;

// USERS
$ctrlUser = new UserController();
$user = $ctrlUser->linkDataView();

// AGENCES
$ctrlAgence = new AgenceController();
$agence = $ctrlAgence->linkDataView();

$config = new Config();
$db = $config->getConnection();

if ($db === null) {
    exit("Connection Error : Pas d'accès à la base de données");
} else {
    $agenceService = new AgenceService($db);
    $agence = $agenceService->getAgencesList();

    if(isset($_GET['form-goal']) && $_GET['form-goal'] === 'update' && isset($_GET['agence_id'])) {
        $oneAgence = $agenceService->getOneAgence($_GET['agence_id']);
    }
}

?>