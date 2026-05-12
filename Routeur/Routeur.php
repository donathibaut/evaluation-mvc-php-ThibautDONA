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

            case 'dashboard' :
                // if admin connected -> can access to the dashboard
                if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                    $adminAccess = new UserController();
                    $adminAccess->displayDashboard();
                } else {
                    header('Location: index.php?page=login');
                    exit;
                }
                break;

            default :
            header('HTTP/1.0 404 Not Found', true, 404);
            break;
        }
    }
}

?>