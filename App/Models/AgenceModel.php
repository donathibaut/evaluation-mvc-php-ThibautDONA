<?php

namespace App\Models;

use PDO;

/**
 * Model of the agence table
 */
class AgenceModel {
    private $connect;
    private $table = "agences";

    /**
     * Constructor
     * 
     * @param \PDO $db connection instance to the database
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }

    /**
     * Read the data from the columns in the agence table (and foreign keys)
     * 
     * @return array read data from the database
     */
    public function read(){
        $query = "SELECT ID_AGENCE, ville_agence FROM ".
        $this->table;
        $data = $this->connect->prepare($query);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Read one agence from the agences table
     * 
     * @return array read data from the database
     */
    public function readOne(int $thisOne){
        $query = "SELECT ville_agence FROM ".
        $this->table.
        " WHERE ID_AGENCE = :agence_id";
        $data = $this->connect->prepare($query);
        $data->execute([
            ':agence_id' => $thisOne
        ]);
        return $data->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Create new data in the agence table
     * 
     * @return bool create a new agence
     */
    public function create(string $securedInput){
        $query = "INSERT INTO agences 
        (ville_agence)
        VALUES (:ville_agence)";

        $insert = $this->connect->prepare($query);

        return $insert->execute([
            ':ville_agence' => $securedInput
        ]);
    }

    /**
     * Delete a agence in the table
     * 
     * @return bool delete a agence
     */
    public function delete(int $agenceID){
        try {
        $query = "DELETE FROM agences WHERE ID_AGENCE = :id";

        $delete = $this->connect->prepare($query);

        return $delete->execute([':id' => $agenceID]);

        // Avoid SQL ERROR MESSAGE => clearer message
        } catch(\PDOException $e) {
            if($e->getCode() === '23000') {
                exit("Erreur SQL : Un trajet utilise déjà cette agence !");
            }
        }

        return false;
    }

    /**
     * Update data in the agence table
     * 
     * @return bool update a agence
     */
    public function update(string $securedInput, int $agenceID){
        $query = "UPDATE agences 
        SET ville_agence = :ville_agence
        WHERE ID_AGENCE = :id";

        $update = $this->connect->prepare($query);

        return $update->execute([
            ':ville_agence' => $securedInput,
            ':id' => $agenceID
        ]);
    }
}

?>