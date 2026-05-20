<?php if(isset($_SESSION['is_admin'])) : ?>
    <nav>
        <ul>
            <?php 
                //ADMIN
                if($_SESSION['is_admin'] == 1) : 
            ?>
                <li><a class="navAdminBtn btn btn-primary" href="index.php?page=home">Utilisateurs</a></li>
                <li><a class="navAdminBtn btn btn-primary" href="">Agences</a></li>
                <li><a class="navAdminBtn btn btn-primary" href="">Trajets</a></li>

                <li><a class="navBtn agenceCreateBtn btn btn-primary" href="index.php?page=home&form=form-agence&form-goal=create">Créer une Agence</a></li>
            <?php 
                //NON-ADMIN
                else: 
            ?>
                <li><a class="navBtn btn btn-primary" href="index.php?page=home&form=form-trajet&form-goal=create">Créer un trajet</a></li>
            <?php endif; ?>
            <li><p>Bonjour <?php echo $_SESSION['prenom_user'] . " " . $_SESSION['nom_user'] ?></p></li>
            <li><a class="navBtn btn btn-primary" href="index.php?page=logout">Déconnexion</a></li>
        </ul>
    </nav>
    <?php 
    //NOT-CONNECTED
    else: 
    ?>
    <nav>
        <ul>
            <li><a class="navBtn btn btn-primary" href="index.php?page=login">Connexion</a></li>
        </ul>
    </nav>
<?php endif; ?>