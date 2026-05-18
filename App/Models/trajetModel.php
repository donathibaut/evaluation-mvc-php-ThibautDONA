<?php

namespace App\Models;

use PDO;

/**
 * Model of the trajet table
 */
class TrajetModel {
    private PDO $connect;
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
        LEFT JOIN agences a_dest ON t.ID_DESTINATION = a_dest.ID_AGENCE
        WHERE t.date_debut >= NOW()
        ORDER BY t.date_debut ASC";
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Read one trajet from the trajets table
     * 
     * @return array read data from the database
     */
    public function readOne(int $thisOne){
        $query = "SELECT t.ID_TRAJET, t.date_debut, t.date_fin, t.nb_users, t.nb_max_users, 
            t.ID_DEPART, t.ID_DESTINATION,
            a_dest.ville_agence AS ville_destination, 
            a_dep.ville_agence AS ville_depart, 
            u.ID_USER,
            u.nom_user,
            u.prenom_user FROM ".
        $this->table.
        " t LEFT JOIN users u ON t.ID_USER = u.ID_USER
        LEFT JOIN agences a_dep ON t.ID_DEPART = a_dep.ID_AGENCE
        LEFT JOIN agences a_dest ON t.ID_DESTINATION = a_dest.ID_AGENCE
        WHERE t.ID_TRAJET = :trajet_id";
        $data = $this->connect->prepare($query);
        $data->execute([
            ':trajet_id' => $thisOne
        ]);
        return $data->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Create new data in the trajet table
     * 
     * @return bool create a new trajet
     */
    public function create(array $formCreate){
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

    /**
     * Delete a trajet in the table
     * 
     * @return bool delete a trajet
     */
    public function delete(int $trajetID){
        $query = "DELETE FROM trajets WHERE ID_TRAJET = :id";

        $delete = $this->connect->prepare($query);

        return $delete->execute([':id' => $trajetID]);
    }

    /**
     * Update data in the trajet table
     * 
     * @return bool update a trajet
     */
    public function update(array $formUpdate, int $trajetID){
        $query = "UPDATE trajets 
        SET nb_users = :nb_users, 
        nb_max_users = :nb_max_users, 
        date_debut = :date_debut, 
        ID_DEPART = :a_dep, 
        date_fin = :date_fin, 
        ID_DESTINATION = :a_dest, 
        ID_USER = :id_user
        WHERE ID_TRAJET = :id";

        $update = $this->connect->prepare($query);

        return $update->execute([
            ':nb_users' => $formUpdate['nb_users'],
            ':nb_max_users' => $formUpdate['nb_max_users'],
            ':date_debut' => $formUpdate['date_debut'],
            ':a_dep' => $formUpdate['a_dep'],
            ':date_fin' => $formUpdate['date_fin'],
            ':a_dest' => $formUpdate['a_dest'],
            ':id_user' => $_SESSION['ID_USER'],
            ':id' => $trajetID
        ]);
    }
}

?>