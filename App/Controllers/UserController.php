<?php
namespace App\Controllers;

use App\Services\UserService;
use Core\Config;

class UserController {

    /**
     * Verify and create the web session of the connecting user
     */
    public function login() {
        $err = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Inputs from the connection form
            $mail = $_POST['mail'];
            $password = $_POST['password'];

            $config = new Config();
            $db = $config->getConnection();

            if ($db === null) {
                exit("Connection Error : no access to the database");
            } else {
                $userService = new UserService($db);
                $user = $userService->auth($mail, $password);

                if($user) {
                    $_SESSION['ID_USER'] = $user['ID_USER'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    $_SESSION['nom_user'] = $user['nom_user'];

                    header('Location: index.php?page=home');

                    exit;
                } else {
                    $err = "Adresse Mail ou Mot de Passe incorrect..";
                }
            }
        }

        // Necessary to get the $err message
        include __DIR__ . '/../../templates/login.php';
    }

    public function displayDashboard() {
        include __DIR__ . '/../../templates/dashboard.php';
    }
}

?>