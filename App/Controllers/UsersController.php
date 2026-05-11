<?php
namespace App\Controllers;

use Core\Config;
use App\Models\userModel;
use PDO;

class UserController {

    public function readUser() {
        $newDb = new Config();
        $db = $newDb->getConnection();

        $user = new userModel($db);
        $read = $user->read();
        $rowCount = $read->rowCount();

        if($rowCount > 0) {
            $array = array();

            while($result = $read->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    "ID_USER" => $result['ID_USER'],
                    "nom_user" => $result['nom_user'],
                    "prenom_user" => $result['prenom_user']
                );
                array_push($array, $item);
            }
            http_response_code(200);
            echo json_encode($array);
        } else {
            http_response_code(404);
            echo "Error : NO ELEMENT";
        }
    }
}

?>