<?php
namespace App\Controllers;

use App\Services\UserService;
use Core\Config;

class UserController {

    /**
     * Verify and create the session of the connecting user
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
                    $_SESSION['prenom_user'] = $user['prenom_user'];

                    // Login succeeded
                    $_SESSION['successMess'] = "Vous êtes connecté !";

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

    /**
     * Dismantle the user session
     */
    public function logout() {

        /** Delete the session array */
        $_SESSION = array();

        // Logout succeeded
        $_SESSION['successMess'] = "Vous êtes déconnecté !";

        header('Location: index.php?page=home');
        exit;
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
            $userService = new UserService($db);
            return $userService->getUsersList();
        }
    }
}

?>