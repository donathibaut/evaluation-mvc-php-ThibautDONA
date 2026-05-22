<?php
use PHPUnit\Framework\TestCase;

use App\Models\AgenceModel;
use Core\Config;

/**
 * Tests of CRUD reliability for AgenceModel.php
 * + Create
 * + Update
 * + Delete
 */
class AgenceTest extends TestCase {
    private $agenceModel;
    private $connect;

    /**
     * Set up the connection to the database => then we can run the tests
     */
    protected function setUp() : void {
        $config = new Config();
        $db = $config->getConnection();

        $this->connect = $db;

        $this->agenceModel = new AgenceModel($this->connect);
    }

    /**
     * Execute different scenarios 
     */
    public function testCUDAgence() {
        // CREATE
        $agenceTest = "Test-City";

        $this->agenceModel->create($agenceTest);

        $stmt = $this->connect->prepare("SELECT * FROM agences WHERE ville_agence = :ville");
        $stmt->execute([':ville' => $agenceTest]);
        $agence = $stmt->fetch();

        $this->assertNotEmpty($agence, "Agence non trouvée pour création");

        // UPDATE
        $stmt = $this->connect->prepare("SELECT ID_AGENCE FROM agences WHERE ville_agence = :ville");
        $stmt->execute([':ville' => $agenceTest]);
        $agenceID = $stmt->fetch();

        $newName = "Update-Town";

        $this->agenceModel->update($newName, $agenceID['ID_AGENCE']);

        $stmt = $this->connect->prepare("SELECT * FROM agences WHERE ville_agence = :ville");
        $stmt->execute([':ville' => $newName]);
        $agence = $stmt->fetch();

        $this->assertNotEmpty($agence, "Agence non trouvée pour mise à jour");

        //DELETE
        $this->agenceModel->delete($agenceID['ID_AGENCE']);

        $stmt = $this->connect->prepare("SELECT * FROM agences WHERE ville_agence = :ville");
        $stmt->execute([':ville' => $newName]);
        $agence = $stmt->fetch();

        $this->assertEmpty($agence, "Agence supprimée");
    }
}

?>