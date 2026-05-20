<!-- HEADER -->
<?php include __DIR__ . "/partials/header.php" ?>
<main>
    <h2>Formulaire de connexion</h2>

    <!-- If connection error -> error message -->
    <?php if(isset($err)) : ?>
      <p class="error"><?php echo $err ?></p>
    <?php endif; ?>

    <form action="index.php?page=login" method="post" autocomplete="off">

        <label for="mail">Adresse Mail : </label>
        <input name="mail" id="mail" type="email" required>

        <label for="password">Mot de Passe : </label>
        <input name="password" id="password" type="password" required>

        <button class="btn btn-primary" type="submit">Me Connecter</button>
    </form>
</main>
<!-- FOOTER -->
<?php include __DIR__ . "/partials/footer.php" ?>