<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
  </head>
  <body>
    <!-- <header> depends on the user auth (Not-Connected/Connected/Connected as an Admin) -->
    <header>
      <h1 class="logo"><a href="index.php?page=home">Touche pas au klaxon</a></h1>

      <?php if(isset($_SESSION['is_admin'])) : ?>
        <nav>
          <ul>
            <?php if($_SESSION['is_admin'] == 1) : ?>
              <li><a class="navAdminBtn" href="">Utilisateurs</a></li>
              <li><a class="navAdminBtn" href="">Agences</a></li>
              <li><a class="navAdminBtn" href="">Trajets</a></li>
            <?php else: ?>
              <li><a class="navBtn" href="">Créer un trajet</a></li>
            <?php endif; ?>
            <li><p>Bonjour <?php echo $_SESSION['prenom_user'] . " " . $_SESSION['nom_user'] ?></p></li>
            <li><a class="navBtn" href="index.php?page=logout">Déconnexion</a></li>
          </ul>
        </nav>
      <?php else: ?>
        <nav>
          <ul>
            <li><a class="navBtn" href="index.php?page=login">Connexion</a></li>
          </ul>
        </nav>
      <?php endif; ?>

    </header>
    <main>

      <!-- Login / Logout message -->
      <?php if(isset($_SESSION['successMess'])) : ?>
        <p><?php echo $_SESSION['successMess'] ?></p>
        <?php unset($_SESSION['successMess']) ?>

        <?php if(!isset($_SESSION['ID_USER'])) : ?>
          <?php         
            /** Delete the session cookie */
            session_destroy(); 
          ?>
        <?php endif; ?>

      <?php endif; ?>

      <!-- <table> depends on the user auth -->
      <table>
        <caption>

          <!-- If not connected -> use this <h2> -->
          <?php if(!isset($_SESSION['is_admin'])) : ?>
            <p>
              Pour obtenir plus d'informations sur un trajet, veuillez vous
              connecter
            </p>
          <?php endif; ?>

        </caption>
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
    </main>
    <footer>
      <p class="copyright">© 2024 - CENEF - MVC PHP</p>
    </footer>
  </body>
</html>
