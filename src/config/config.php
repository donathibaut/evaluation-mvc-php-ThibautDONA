<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Config{
    private $host;
    private $database;
    private $username;
    private $password;
    private $connect;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->database = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
    }
    public function getConnection() {
        $this->connect = null;
        try{
            $this->connect = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->database,
                $this->username,
                $this->password
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error : ".$e->getMessage();            
        }
        return $this->connect;
    }
}
?>