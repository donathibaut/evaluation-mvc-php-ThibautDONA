<?php

namespace Core;

use PDO;
use PDOException;

/**
 * Connection to the database
 * 
 * Class that allows to connect to the database
 */
class Config {

    /** Connection props */
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;
    private $connect;

    /**
     * Constructor
     * 
     * Associate connection props to var
     */
    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->database = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    /**
     * Allow to create a connection instance to the database
     * 
     * @return PDO|null return the PDO object. If error -> null
     */
    public function getConnection() {
        $this->connect = null;
        try{
            $this->connect = new PDO(
                "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->database,
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