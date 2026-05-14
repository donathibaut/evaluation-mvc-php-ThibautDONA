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
            <td class="nbSeats cell"><?php echo $t['nb_max_users'] ?></td>

            <!-- Interactions with the table -->
            <?php if(isset($_SESSION['ID_USER'])) : ?>
                <td class="cell">
                <button>Voir</button>
                <?php 
                    // If the connected user => editor of the "trajet" : can modify/delete it
                    if($_SESSION['ID_USER'] === $t['ID_USER']) : 
                ?>
                    <button>Modifier</button>
                    <button>Supprimer</button>
                <?php endif; ?>
                </td>
            <?php endif; ?>

            </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>