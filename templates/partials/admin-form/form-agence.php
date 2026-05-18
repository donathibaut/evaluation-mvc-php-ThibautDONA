<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : ?>

    <?php if(isset($form) && $form === 'form-agence' && isset($_GET['form-goal'])) : ?>
        <form 
            action="index.php?page=home&<?php if($_GET['form-goal'] === "create") : ?>crud=create<?php elseif($_GET['form-goal'] === "update") : ?>crud=update&agence_id=<?php echo $_GET['agence_id'] ?><?php endif; ?>" 
            method="post" 
            autocomplete="off"
        >
            <label for="ville_agence">Ville de l'agence : </label>
            <input 
                name="ville_agence" 
                id="ville_agence" 
                pattern="^[A-ZÀ-ÖØ-ß].*" 
                type="text" 
                <?php if($_GET['form-goal'] === "update" && isset($oneAgence)) : ?>value="<?php echo $oneAgence['ville_agence'] ?>"<?php endif; ?> 
                required
            >

            <!-- Adapted to the context -->
            <button type="submit">
                <?php if($_GET['form-goal'] === "create") : ?>
                    Créer une agence
                <?php elseif($_GET['form-goal'] === "update") : ?>
                    Mettre à jour
                <?php endif; ?>
            </button>
            <a href="index.php?page=home">Annuler</a>
        </form>
    <?php endif; ?>

<?php else : ?>
    <?php exit("Erreur : Vous n'avez pas les autorisations nécessaires !"); ?>
<?php endif; ?>