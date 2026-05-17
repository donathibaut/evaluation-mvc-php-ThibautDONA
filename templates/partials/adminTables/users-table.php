<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : ?>

<?php else: ?>
    <?php exit("Erreur : Vous n'avez pas les autorisations nécessaires !"); ?>
<?php endif; ?>