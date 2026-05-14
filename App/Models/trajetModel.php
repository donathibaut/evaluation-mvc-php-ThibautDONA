<?php

namespace App\Models;

use PDO;

/**
 * Model of the trajet table
 */
class TrajetModel {
    private $connect;
    private $table = "trajets";

    /**
     * Constructor
     * 
     * @param PDO $db connection instance to the database
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * Read the data from the columns in the trajet table (and foreign keys)
     * 
     * @return array read data from the database
     */
    public function read(){
        $query = "SELECT t.ID_TRAJET, t.date_debut, t.date_fin, t.nb_users, t.nb_max_users, 
            a_dest.ville_agence AS ville_destination, 
            a_dep.ville_agence AS ville_depart, 
            u.ID_USER,
            u.nom_user,
            u.prenom_user FROM ".
        $this->table.
        " t LEFT JOIN users u ON t.ID_USER = u.ID_USER
        LEFT JOIN agences a_dep ON t.ID_DEPART = a_dep.ID_AGENCE
        LEFT JOIN agences a_dest ON t.ID_DESTINATION = a_dest.ID_AGENCE";
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create new data in the trajet table
     * 
     * @return array create a new trajet
     */
    public function create($formCreate){
        $query = "INSERT INTO trajets 
        (nb_users, nb_max_users, date_debut, ID_DEPART, 
        date_fin, ID_DESTINATION, ID_USER)
        VALUES (:nb_users, :nb_max_users, :date_debut, :a_dep, 
        :date_fin, :a_dest, :id_user)";

        $insert = $this->connect->prepare($query);

        return $insert->execute([
            ':nb_users' => $formCreate['nb_users'],
            ':nb_max_users' => $formCreate['nb_max_users'],
            ':date_debut' => $formCreate['date_debut'],
            ':a_dep' => $formCreate['a_dep'],
            ':date_fin' => $formCreate['date_fin'],
            ':a_dest' => $formCreate['a_dest'],
            ':id_user' => $_SESSION['ID_USER']
        ]);
    }
}

?>