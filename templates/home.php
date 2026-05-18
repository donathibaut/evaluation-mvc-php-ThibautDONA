<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php 
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
      ?>
        Tableau de bord
      <?php else : ?>
        Accueil
      <?php endif; ?>
    </title>
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

      <!-- CRUD FORM -->
      <?php 
        // Avoid form conflicts ($form = "form-agence" || "form-trajet")
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
      ?>
        <?php include __DIR__ . '/partials/admin-form/form-agence.php'; ?>
      <?php else : ?>
        <?php include __DIR__ . '/partials/form-trajet.php'; ?>
      <?php endif; ?>

      <!-- TABLES --> 
        <!-- trajets -->
      <?php include __DIR__ . '/partials/table.php'; ?>

      <?php 
        // Verify if it is necessary to load the files (is the user an admin ?)
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
      ?>
          <!-- agences (admin only) -->
        <?php include __DIR__ . '/partials/admin-tables/agences-table.php'; ?>
          <!-- users (admin only) -->
        <?php include __DIR__ . '/partials/admin-tables/users-table.php'; ?>
      <?php endif; ?>

    </main>
    <footer>
      <p class="copyright">© 2024 - CENEF - MVC PHP</p>
    </footer>
  </body>
</html>
