<?php /** @var array $t */ ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#voirModal<?php echo $t['ID_TRAJET'] ?>">
  Voir
</button>

<!-- Modal -->
<div class="modal fade" id="voirModal<?php echo $t['ID_TRAJET'] ?>" tabindex="-1" aria-labelledby="voirModal<?php echo $t['ID_TRAJET'] ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="voirModal<?php echo $t['ID_TRAJET'] ?>Label">Informations Complémentaires</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>
            Nom :
            <?php echo $t['nom_user'] ?>
          </li>
          <li>
            Prénom :
            <?php echo $t['prenom_user'] ?>
          </li>
          <li>
            Téléphone :
            <?php echo $t['tel'] ?>
          </li>
          <li>
            Adresse E-mail :
            <?php echo $t['mail'] ?>
          </li>
          <li>
            Nombre total de places :
            <?php echo $t['nb_max_users'] ?>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>