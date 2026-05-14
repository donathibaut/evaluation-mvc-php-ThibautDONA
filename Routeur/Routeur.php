<?php

namespace Routeur;

use App\Controllers\TrajetController;
use App\Controllers\UserController;

/**
 * Routing of the website
 */
class Routeur {
    /**
     * Manage the routes by cases
     */
    public function run() {
        session_start();

        //PAGES
        $page = $_GET['page'] ?? 'home';

        switch($page) {
            case 'home' :
                $ctrlTrajet = new TrajetController();

                //CRUD
                $crud = $_GET['crud'] ?? null;
                if($crud === 'create') {
                    $ctrlTrajet->ctrlCreateTrajet($_POST);
                }

                /**
                 * Routing request for '?form='|null.
                 * Manage the agences list for the form <select> (form-create)
                 * @var string|null $form
                 */
                $form = $_GET['form'] ?? null;

                // Display trajet data and, if necessary, the form-create
                $ctrlTrajet->linkDataView($form);

                break;

            case 'login' :
                $login = new UserController();
                $login->login();
                break;

            case 'logout' :
                $logout = new UserController();
                $logout->logout();
                break;

            default :
            header('HTTP/1.0 404 Not Found', true, 404);
            break;
        }
    }
}

?>