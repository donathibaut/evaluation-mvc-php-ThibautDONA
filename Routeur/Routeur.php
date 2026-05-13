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

        $page = $_GET['page'] ?? 'home';

        switch($page) {
            case 'home' :
                $control = new TrajetController();
                $control->linkDataView();
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