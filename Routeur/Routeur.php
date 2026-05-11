<?php

namespace Routeur;

use App\Controllers\TrajetController;

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
                echo "nothing here";
                break;

            case 'edition' :
                echo "nothing here";
                break;

            case 'admin_dashboard' :
                echo "nothing here";
                break;

            default :
            header('HTTP/1.0 404 Not Found', true, 404);
            break;
        }
    }
}

?>