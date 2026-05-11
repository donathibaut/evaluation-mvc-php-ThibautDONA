<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Init dotenv for the Config class
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../env');
$dotenv->load();

use Routeur\Routeur;

$routeur = new Routeur();
$routeur->run();

?>