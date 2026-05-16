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

                //CREATE
                if($crud === 'create') {
                    $ctrlTrajet->ctrlCreateTrajet($_POST);
                }

                //DELETE
                if($crud === 'delete') {
                    if(isset($_GET['trajet_id'])) {
                        $trajetID = $_GET['trajet_id'];

                        if(isset($_GET['author_id'])) {
                            $authorID = $_GET['author_id'];
                            $ctrlTrajet->ctrlDeleteTrajet($trajetID, $authorID);            
                        } else {
                            exit("ID Error : Ce trajet n'a pas d'auteur");
                        }
                    } else {
                        exit("ID Error : Ce trajet n'a pas d'identifiant");
                    }
                }

                //UPDATE
                if($crud === 'update') {
                    // verify first if the form has been submitted
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if(isset($_GET['trajet_id'])) {
                            $trajetID = $_GET['trajet_id'];

                            if(isset($_GET['author_id'])) {
                                $authorID = $_GET['author_id'];
                                $ctrlTrajet->ctrlUpdateTrajet($_POST, $trajetID, $authorID);            
                            } else {
                                exit("ID Error : Ce trajet n'a pas d'auteur");
                            }
                        } else {
                            exit("ID Error : Ce trajet n'a pas d'identifiant");
                        }
                    }
                }

                /**
                 * Routing request for '?form='|null.
                 * Manage the agences list for the form <select> (form-trajet)
                 * @var string|null $form
                 */
                $form = $_GET['form'] ?? null;

                // Display trajet data and, if necessary, the form-trajet
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