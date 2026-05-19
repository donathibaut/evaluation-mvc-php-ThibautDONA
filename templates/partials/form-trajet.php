<?php if(isset($_SESSION['ID_USER'])) : ?>

    <?php if(isset($form) && $form === 'form-trajet' && isset($_GET['form-goal'])) : ?>
        <form 
            action="index.php?page=home&<?php if($_GET['form-goal'] === "create") : ?>crud=create<?php elseif($_GET['form-goal'] === "update") : ?>crud=update&trajet_id=<?php echo $_GET['trajet_id'] ?>&author_id=<?php if(isset($oneTrajet)){ echo $oneTrajet['ID_USER'];} ?><?php endif; ?>" 
            method="post" 
            autocomplete="off"
        >

            <?php if($_GET['form-goal'] === "create" && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 0) : ?>
                <!-- ABOUT THE USER -->
                <label for="nom_user">Nom : </label>
                <input name="nom_user" id="nom_user" type="text" value="<?php echo $_SESSION['nom_user'] ?>" disabled>
                <label for="prenom_user">Prénom : </label>
                <input name="prenom_user" id="prenom_user" type="text" value="<?php echo $_SESSION['prenom_user'] ?>" disabled>
                <label for="mail_user">Adresse E-mail : </label>
                <input name="mail_user" id="mail_user" type="text" value="<?php echo $_SESSION['mail'] ?>" disabled>
                <label for="tel_user">Téléphone : </label>
                <input name="tel_user" id="tel_user" type="text" value="<?php echo $_SESSION['tel'] ?>" disabled>
            <?php endif; ?>

            <!-- Passengers -->
            <label for="nb_users">Nombre de passagers : </label>
            <input name="nb_users" id="nb_users" type="number" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet)) : ?>value="<?php echo $oneTrajet['nb_users'] ?>"<?php endif; ?> required>
            <label for="nb_max_users">/</label>
            <input name="nb_max_users" id="nb_max_users" type="number" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet)) : ?>value="<?php echo $oneTrajet['nb_max_users'] ?>"<?php endif; ?> required>

            <!-- Start -->
            <label for="date_debut">Date de départ</label>
            <input name="date_debut" id="date_debut" type="datetime-local" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet)) : ?>value="<?php echo $oneTrajet['date_debut'] ?>"<?php endif; ?> required>
            <label for="a_dep">Agence de départ :</label>
            <select name="a_dep" id="a_dep" required>
                <?php 
                // $agence from AgenceController : $agence = $agenceService->getAgencesList();
                if(!empty($agence)) : 
                ?>
                    <option value="">--Veuillez choisir une agence--</option>
                    <?php 
                    // Load every "agence" in the list
                    foreach($agence as $a) : 
                    ?>
                        <option value="<?php echo $a['ID_AGENCE']; ?>" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet) && $oneTrajet['ID_DEPART'] === $a['ID_AGENCE']) : ?>selected<?php endif; ?>>
                        <?php echo $a['ville_agence']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <!-- End -->
            <label for="date_fin">Date d'arrivée</label>
            <input name="date_fin" id="date_fin" type="datetime-local" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet)) : ?>value="<?php echo $oneTrajet['date_fin'] ?>"<?php endif; ?> required>
            <label for="a_dest">Agence d'arrivée :</label>
            <select name="a_dest" id="a_dest" required>
                <?php 
                // $agence from AgenceController : $agence = $agenceService->getAgencesList();
                if(!empty($agence)) : 
                ?>
                    <option value="">--Veuillez choisir une agence--</option>
                    <?php 
                    foreach($agence as $a) : 
                    ?>
                        <option value="<?php echo $a['ID_AGENCE']; ?>" <?php if($_GET['form-goal'] === "update" && isset($oneTrajet) && $oneTrajet['ID_DESTINATION'] === $a['ID_AGENCE']) : ?>selected<?php endif;?> >
                        <?php echo $a['ville_agence']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>

            <!-- Adapted to the context -->
            <button type="submit">
                <?php if($_GET['form-goal'] === "create") : ?>
                    Créer le trajet
                <?php elseif($_GET['form-goal'] === "update") : ?>
                    Mettre à jour
                <?php endif; ?>
            </button>
            <a href="index.php?page=home">Annuler</a>
        </form>
    <?php endif; ?>

<?php else : ?>

    <!-- If not connected -->
    <p>
        Pour obtenir plus d'informations sur un trajet, veuillez vous
        connecter
    </p>
    
<?php endif; ?>