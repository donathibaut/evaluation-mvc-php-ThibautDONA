<!-- HEADER -->
<?php include __DIR__ . "/partials/header.php" ?>
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
<!-- FOOTER -->
<?php include __DIR__ . "/partials/footer.php" ?>