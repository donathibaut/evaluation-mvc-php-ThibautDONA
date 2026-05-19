<?php

    session_start();

    require_once __DIR__ . '/../vendor/autoload.php';

    /**
     * Init dotenv for the Config class
     */
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../env');
    $dotenv->load();

    use Routeur\Routeur;

    $routeur = new Routeur();

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/style.css">
    <title>
        <?php 
            if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
        ?>
            Tableau de bord
        <?php elseif(isset($_GET['page']) && $_GET['page'] === "login") : ?>
            Me Connecter
        <?php elseif(isset($_GET['page']) && $_GET['page'] === "home") : ?>
            Accueil
        <?php else : ?>
            ...
        <?php endif; ?>
    </title>
  </head>
  <body>

    <?php $routeur->run(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="crossorigin"></script>
  </body>
</html>