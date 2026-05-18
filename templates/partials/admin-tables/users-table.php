<?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : ?>
    <table class="usersTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">N° de téléphone</th>
                <th scope="col">Adresse e-mail</th>
            </tr>
        </thead>
        <tbody>
                
            <!-- Load every registered users from the database -->
            <?php 
                // $user from UserController : $user = $userService->getUsersList();
                if(!empty($user)) : 
            ?>
                <?php foreach($user as $u) : ?>
                    <tr>
                        <td class="idUser cell"><?php echo $u['ID_USER'] ?></td>
                        <td class="fName cell"><?php echo $u['nom_user'] ?></td>
                        <td class="lName cell"><?php echo $u['prenom_user'] ?></td>
                        <td class="numTel cell"><?php echo $u['tel'] ?></td>
                        <td class="mailAddress cell"><?php echo $u['mail'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
<?php else: ?>
    <?php exit("Erreur : Vous n'avez pas les autorisations nécessaires !"); ?>
<?php endif; ?>