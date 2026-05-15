<?php 

namespace App\Middlewares;

use App\Services\TrajetService;

/**
 * Check consistency
 */
class TrajetMiddleware {
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
     * + Check if the user is connected before saving the new trajet
     * + Check if nb_users <= nb_max_users
     * + Check if nb_users & nb_max_users have a positive value
     * + Check if date_debut < date_fin
     * + Check if a_dep != a_dest
     * 
     * @return bool success of the sql request : true/false
     */
    public function createTrajetMW($formCreate) {
        if(!isset($_SESSION['ID_USER'])) {
            exit("Connection Error : Vous n'êtes pas connecté");
        }

        if($formCreate['nb_users'] > $formCreate['nb_max_users']) {
            exit("Value Error : Le nombre de personnes inscrites ne peut pas être supérieur au nombre maximum de places !");
        }

        if($formCreate['nb_users'] < 1 || $formCreate['nb_max_users'] < 2) {
            exit("Value Error : Les réservations et le nombre maximum de places doivent être supérieurs à 0 ! 
            (! Nombre de places maximum => au moins 2 !)");
        }

        if($formCreate['date_debut'] > $formCreate['date_fin']) {
            exit("Date Error : L'arrivée ne peut survenir avant le départ !");
        }

        if($formCreate['a_dep'] === $formCreate['a_dest']) {
            exit("Destination Error : Un trajet ne peut pas se faire de la même agence à la même à agence !");
        }

        $trajetService = new TrajetService($this->connect);
        return $trajetService->createTrajet($formCreate);
    }

    /**
     * + Check if the user is the author of the trajet
     * 
     * @return bool success of the sql request : true/false
     */
    public function deleteTrajetMW(string $trajetID, string $authorID) {
        if($_SESSION['ID_USER'] != $authorID && $_SESSION['is_admin'] === 0) {
            exit("Author Error : Vous n'êtes pas l'auteur de ce trajet !");
        }

        $trajetService = new TrajetService($this->connect);
        return $trajetService->deleteTrajet($trajetID);
    }
}

?>