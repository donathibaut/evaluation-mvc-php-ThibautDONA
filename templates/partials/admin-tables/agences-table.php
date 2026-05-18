<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : ?>
    <table class="agencesTable">
        <thead>
            <tr>
                <th scope="col">Agence</th>
            </tr>
        </thead>
        <tbody>
            <!-- Load every registered drive from the database -->
            <?php 
                // $agence from AgenceController : $agence = $agenceService->getAgencesList();
                if(!empty($agence)) : 
            ?>
                <?php foreach($agence as $a) : ?>
                    <tr>
                        <td class="start cell"><?php echo $a['ville_agence'] ?></td>

                        <td class="cell">
                            <?php 
                                // Is the corresponding form open ?
                                if(isset($_GET['form-goal']) && $_GET['form-goal'] === "update" && isset($_GET['agence_id']) && $_GET['agence_id'] == $a['ID_AGENCE']) : 
                            ?>
                                <a href="index.php?page=home">Annuler</a>
                            <?php else: ?>
                                <a href="index.php?page=home&form=form-agence&form-goal=update&agence_id=<?php echo $a['ID_AGENCE'] ?>">Modifier</a>
                            <?php endif; ?>
                            <a href="index.php?page=home&crud=delete&agence_id=<?php echo $a['ID_AGENCE']; ?>">
                                Supprimer
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php else: ?>
    <?php exit("Erreur : Vous n'avez pas les autorisations nécessaires !"); ?>
<?php endif; ?>