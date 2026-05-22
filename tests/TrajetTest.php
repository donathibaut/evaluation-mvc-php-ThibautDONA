<?php
use PHPUnit\Framework\TestCase;

use App\Models\TrajetModel;
use Core\Config;

/**
 * Tests of CRUD reliability for TrajetModel.php
 * + Create
 * + Update
 * + Delete
 */
class TrajetTest extends TestCase {
    private $trajetModel;
    private $connect;

    /**
     * Set up the connection to the database => then we can run the tests
     */
    protected function setUp() : void {
        $config = new Config();
        $db = $config->getConnection();

        $this->connect = $db;

        $this->trajetModel = new TrajetModel($this->connect);
    }

    /**
     * Execute different scenarios 
     */
    public function testCUDTrajet() {
        $_SESSION['ID_USER'] = 2;

        // CREATE
        $trajetTest = [
            'nb_users' => 2,
            'nb_max_users' => 4,
            'date_debut' => '2026-12-12 12:12',
            'a_dep' => 1,
            'date_fin' => '2026-12-12 13:12',
            'a_dest' => 2
        ];

        $this->trajetModel->create($trajetTest);

        $stmt = $this->connect->prepare(
            "SELECT * FROM trajets WHERE 
            nb_users = :nb_users AND
            nb_max_users = :nb_max_users AND
            date_debut = :date_debut AND
            ID_DEPART = :a_dep AND
            date_fin = :date_fin AND
            ID_DESTINATION = :a_dest AND
            ID_USER = :ID_USER"
        );
        $stmt->execute([
            ':nb_users' => $trajetTest['nb_users'],
            ':nb_max_users' => $trajetTest['nb_max_users'],
            ':date_debut' => $trajetTest['date_debut'],
            ':a_dep' => $trajetTest['a_dep'],
            ':date_fin' => $trajetTest['date_fin'],
            ':a_dest' => $trajetTest['a_dest'],
            ':ID_USER' => $_SESSION['ID_USER']
        ]);
        $trajet = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($trajet, "Trajet non trouvée pour création");

        // UPDATE
        $stmt = $this->connect->prepare(
        "SELECT ID_TRAJET FROM trajets WHERE 
            nb_users = :nb_users AND
            nb_max_users = :nb_max_users AND
            date_debut = :date_debut AND
            ID_DEPART = :a_dep AND
            date_fin = :date_fin AND
            ID_DESTINATION = :a_dest AND
            ID_USER = :ID_USER
        ");
        $stmt->execute([
            ':nb_users' => $trajetTest['nb_users'],
            ':nb_max_users' => $trajetTest['nb_max_users'],
            ':date_debut' => $trajetTest['date_debut'],
            ':a_dep' => $trajetTest['a_dep'],
            ':date_fin' => $trajetTest['date_fin'],
            ':a_dest' => $trajetTest['a_dest'],
            ':ID_USER' => $_SESSION['ID_USER']
        ]);
        $trajetID = $stmt->fetch(PDO::FETCH_ASSOC);

        $newTrajet = [
            'nb_users' => 3,
            'nb_max_users' => 5,
            'date_debut' => '2027-12-12 12:12',
            'a_dep' => 2,
            'date_fin' => '2027-12-12 13:12',
            'a_dest' => 1
        ];

        $this->trajetModel->update($newTrajet, $trajetID['ID_TRAJET']);

        $stmt = $this->connect->prepare(
            "SELECT * FROM trajets WHERE 
            nb_users = :nb_users AND
            nb_max_users = :nb_max_users AND
            date_debut = :date_debut AND
            ID_DEPART = :a_dep AND
            date_fin = :date_fin AND
            ID_DESTINATION = :a_dest AND
            ID_USER = :ID_USER"
        );
        $stmt->execute([
            ':nb_users' => $newTrajet['nb_users'],
            ':nb_max_users' => $newTrajet['nb_max_users'],
            ':date_debut' => $newTrajet['date_debut'],
            ':a_dep' => $newTrajet['a_dep'],
            ':date_fin' => $newTrajet['date_fin'],
            ':a_dest' => $newTrajet['a_dest'],
            ':ID_USER' => $_SESSION['ID_USER']
        ]);
        $trajet = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($trajet, "Trajet non trouvée pour mise à jour");

        //DELETE
        $this->trajetModel->delete($trajetID['ID_TRAJET']);

        $stmt = $this->connect->prepare(
            "SELECT * FROM trajets WHERE 
            nb_users = :nb_users AND
            nb_max_users = :nb_max_users AND
            date_debut = :date_debut AND
            ID_DEPART = :a_dep AND
            date_fin = :date_fin AND
            ID_DESTINATION = :a_dest AND
            ID_USER = :ID_USER"
        );
        $stmt->execute([
            ':nb_users' => $newTrajet['nb_users'],
            ':nb_max_users' => $newTrajet['nb_max_users'],
            ':date_debut' => $newTrajet['date_debut'],
            ':a_dep' => $newTrajet['a_dep'],
            ':date_fin' => $newTrajet['date_fin'],
            ':a_dest' => $newTrajet['a_dest'],
            ':ID_USER' => $_SESSION['ID_USER']
        ]);
        $trajet = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEmpty($trajet, "Trajet supprimée");
    }
}

?>