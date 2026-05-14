<?php if(isset($_SESSION['ID_USER'])) : ?>

    <?php if(isset($form) && $form === 'form-create') : ?>
        <form action="index.php?page=home&crud=create" method="post" autocomplete="off">

        <!-- Passengers -->
        <label for="nb_users">Nombre de passagers : </label>
        <input name="nb_users" id="nb_users" type="number" required>
        <label for="nb_max_users">/</label>
        <input name="nb_max_users" id="nb_max_users" type="number" required>

        <!-- Start -->
        <label for="date_debut">Date de départ</label>
        <input name="date_debut" id="date_debut" type="datetime-local" required>
        <label for="a_dep">Agence de départ :</label>
        <select name="a_dep" id="a_dep" required>
            <option value="">--Veuillez choisir une agence--</option>
            <?php 
            // $agence from AgenceController : $agence = $agenceService->getAgencesList();
            if(!empty($agence)) : 
            ?>
            <?php 
                // Load every "agence" in the list
                foreach($agence as $a) : 
            ?>
                <option value="<?php echo $a['ID_AGENCE']; ?>">
                <?php echo $a['ville_agence']; ?>
                </option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <!-- End -->
        <label for="date_fin">Date d'arrivée</label>
        <input name="date_fin" id="date_fin" type="datetime-local" required>
        <label for="a_dest">Agence d'arrivée :</label>
        <select name="a_dest" id="a_dest" required>
            <option value="">--Veuillez choisir une agence--</option>
            <?php 
            if(!empty($agence)) : 
            ?>
            <?php 
                foreach($agence as $a) : 
            ?>
                <option value="<?php echo $a['ID_AGENCE']; ?>">
                <?php echo $a['ville_agence']; ?>
                </option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <button type="submit">Créer le trajet</button>
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