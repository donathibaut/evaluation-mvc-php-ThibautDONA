<!-- HEADER -->
<?php include __DIR__ . "/partials/header.php" ?>
<main>
    <section class="formSection">
        <h2 class="loginPageTitle">Formulaire de connexion</h2>

        <!-- If connection error -> error message -->
        <?php include __DIR__ . "/partials/err-message.php" ?>

        <form class="formConnect" action="index.php?page=login" method="post" autocomplete="off">
            
        <fieldset>
            <label for="mail">Adresse Mail : </label>
            <input name="mail" id="mail" type="email" required>
        </fieldset>
        
        <fieldset>
            <label for="password">Mot de Passe : </label>
            <input name="password" id="password" type="password" required>
        </fieldset>

            <button class="btn btn-primary" type="submit">Me Connecter</button>
        </form>
    </section>
</main>
<!-- FOOTER -->
<?php include __DIR__ . "/partials/footer.php" ?>