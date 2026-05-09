<?php

namespace App\Models;

use PDO;

/**
 * Model of the trajet table
 */
class trajetModel {
    private $connect;
    private $table = "trajets";

    /** Table properties */
    public $id;
    public $dateDebut;
    public $dateFin;
    public $nbUsers;
    public $nbMaxUsers;
    public $idDestination;
    public $idDepart;
    public $idUser;
    public $idGrpUsers;

    /**
     * Constructor
     * 
     * @param PDO connection instance to the database
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * Read the data from the columns in the trajet table (and foreign keys)
     * 
     * @return PDOStatement read data from the database
     */
    public function read(){
        $query = "SELECT t.ID_TRAJET, t.date_debut, t.date_fin, t.nb_users, t.nb_max_users, 
            a_dest.ville_agence AS ville_destination, 
            a_dep.ville_agence AS ville_depart, 
            u.nom_user,
            u.prenom_user, 
            g.ID_GRPUSERS FROM ".
        $this->table.
        " t LEFT JOIN users u ON t.ID_USER = u.ID_USER
        LEFT JOIN agences a_dep ON t.ID_DEPART = a_dep.ID_AGENCE
        LEFT JOIN agences a_dest ON t.ID_DESTINATION = a_dest.ID_AGENCE
        LEFT JOIN grpUsers g ON t.ID_GRPUSERS = g.ID_GRPUSERS";
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data;
    }
}

?>