<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
  </head>
  <body>
    <!-- <header> depends on the user auth (Not-Connected/Connected/Connected as an Admin) -->
    <header>
      <h1 class="logo"><a href="index.php?page=home">Touche pas au klaxon</a></h1>

      <!-- NAV -->
      <?php include __DIR__ . '/partials/nav.php'; ?> 
    </header>
    <main>
      <!-- MESSAGE : Login / Logout -->
      <?php include __DIR__ . '/partials/log-message.php'; ?>

      <!-- Creation FORM -->
      <?php include __DIR__ . '/partials/form-create.php'; ?>

      <!-- TABLE -->
      <?php include __DIR__ . '/partials/table.php'; ?>
    </main>
    <footer>
      <p class="copyright">© 2024 - CENEF - MVC PHP</p>
    </footer>
  </body>
</html>
