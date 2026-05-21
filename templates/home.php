<!-- HEADER -->
<?php include __DIR__ . "/partials/header.php" ?>
<main>
  <!-- MESSAGE : SUCCESS -->
  <?php include __DIR__ . '/partials/success-message.php'; ?>

  <!-- CRUD FORM -->
  <section class="formSection">
    <?php 
      // Avoid form conflicts ($form = "form-agence" || "form-trajet")
      if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
    ?>
      <?php include __DIR__ . '/partials/admin-form/form-agence.php'; ?>
    <?php else : ?>
      <?php include __DIR__ . '/partials/form-trajet.php'; ?>
    <?php endif; ?>
  </section>

  <section class="tableSection <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) { echo "adminTableGrid"; } ?>">
    <!-- TABLES --> 
      <!-- trajets -->
    <?php include __DIR__ . '/partials/table.php'; ?>

    <?php 
      // Verify if it is necessary to load the files (is the user an admin ?)
      if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
    ?>

        <!-- users (admin only) -->
      <?php include __DIR__ . '/partials/admin-tables/users-table.php'; ?>
      
        <!-- agences (admin only) -->
      <?php include __DIR__ . '/partials/admin-tables/agences-table.php'; ?>
    <?php endif; ?>
  </section>

</main>
<!-- FOOTER -->
<?php include __DIR__ . "/partials/footer.php" ?>