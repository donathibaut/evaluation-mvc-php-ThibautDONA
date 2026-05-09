<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../env');
$dotenv->load();

$readUser = new \App\Controllers\UserController();
$readUser->readUser();

?>