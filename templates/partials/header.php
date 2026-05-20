<header>
  <h1 class="logo"><a class="logo__link" href="index.php?page=home">Touche pas au klaxon</a></h1>

  <?php if(isset($_GET['page']) && $_GET['page'] === "home") { include __DIR__ . "/nav.php"; } ?>
</header>