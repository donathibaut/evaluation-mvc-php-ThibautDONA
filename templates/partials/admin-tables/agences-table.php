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
                                <a class="tableBtn" href="index.php?page=home"><i class="bi bi-x-square"></i></a>
                            <?php else: ?>
                                <a class="tableBtn" href="index.php?page=home&form=form-agence&form-goal=update&agence_id=<?php echo $a['ID_AGENCE'] ?>"><i class="bi bi-pencil-square"></i></a>
                            <?php endif; ?>
                            <a class="tableBtn" href="index.php?page=home&crud=delete&agence_id=<?php echo $a['ID_AGENCE']; ?>"><i class="bi bi-trash text-danger"></i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php else: ?>
    <?php exit("Erreur : Vous n'avez pas les autorisations nécessaires !"); ?>
<?php endif; ?>