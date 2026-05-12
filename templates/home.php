<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
  </head>
  <body>
    <header>
      <h1 class="logo">Touche pas au klaxon</h1>
      <nav>
        <ul>
          <li><a class="navBtn" href="index.php?page=login">Connexion</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <table>
        <caption>
          <!-- If not connected -> use this <h2> -->
          <h2>
            Pour obtenir plus d'informations sur un trajet, veuillez vous
            connecter
          </h2>
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
          <?php if(!empty($trajet)) : ?>
            <?php foreach($trajet as $t) : ?>
              <tr>
                <td class="start"><?php echo $t['ville_depart'] ?></td>
                <td class="date"><?php echo date('d/m/Y', strtotime($t['date_debut'])) ?></td>
                <td class="hour"><?php echo date('H:i', strtotime($t['date_debut'])) ?></td>
                <td class="destination"><?php echo $t['ville_destination'] ?></td>
                <td class="date"><?php echo date('d/m/Y', strtotime($t['date_fin'])) ?></td>
                <td class="hour"><?php echo date('H:i', strtotime($t['date_fin'])) ?></td>
                <td class="nbSeats"><?php echo $t['nb_max_users'] ?></td>
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
