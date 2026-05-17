<!-- <table> depends on the user auth -->
<table>
    <thead>
        <tr>
        <th scope="col">Départ</th>
        <th scope="col">Date</th>
        <th scope="col">Heure</th>
        <th scope="col">Destination</th>
        <th scope="col">Date</th>
        <th scope="col">Heure</th>
        <th scope="col">Places</th>
        </tr>
    </thead>
    <tbody>

        <!-- Load every registered drive from the database -->
        <?php 
        // $trajet from TrajetController : $trajet = $trajetService->getTrajetsList();
        if(!empty($trajet)) : 
        ?>
        <?php foreach($trajet as $t) : ?>
            <tr>
            <td class="start cell"><?php echo $t['ville_depart'] ?></td>
            <td class="date cell"><?php echo date('d/m/Y', strtotime($t['date_debut'])) ?></td>
            <td class="hour cell"><?php echo date('H:i', strtotime($t['date_debut'])) ?></td>
            <td class="destination cell"><?php echo $t['ville_destination'] ?></td>
            <td class="date cell"><?php echo date('d/m/Y', strtotime($t['date_fin'])) ?></td>
            <td class="hour cell"><?php echo date('H:i', strtotime($t['date_fin'])) ?></td>
            <td class="nbSeats cell"><?php echo $t['nb_max_users']-$t['nb_users'] ?></td>

            <!-- Interactions with the table -->
            <?php if(isset($_SESSION['ID_USER'])) : ?>
                <td class="cell">
                <a href="">Voir</a>
                <?php 
                    // If the connected user => editor of the "trajet" : can modify/delete it
                    if($_SESSION['ID_USER'] === $t['ID_USER'] || isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : 
                ?>
                    <?php if($_SESSION['is_admin'] === 0) : ?>
                        <?php if(isset($_GET['form-goal']) && $_GET['form-goal'] === "update" && isset($_GET['trajet_id']) && $_GET['trajet_id'] == $t['ID_TRAJET']) : ?>
                            <a href="index.php?page=home">Annuler</a>
                        <?php else: ?>
                            <a href="index.php?page=home&form=form-trajet&form-goal=update&trajet_id=<?php echo $t['ID_TRAJET'] ?>">Modifier</a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a href="index.php?page=home&crud=delete&trajet_id=<?php echo $t['ID_TRAJET']; ?>&author_id=<?php echo $t['ID_USER']; ?>">
                        Supprimer
                    </a>
                <?php endif; ?>
                </td>
            <?php endif; ?>

            </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>