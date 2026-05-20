<?php /** @var array $t */ ?>

<!-- Button trigger modal -->
<button type="button" class="voirBtn tableBtn" data-bs-toggle="modal" data-bs-target="#voirModal<?php echo $t['ID_TRAJET'] ?>">
  <i class="bi bi-eye text-primary"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="voirModal<?php echo $t['ID_TRAJET'] ?>" tabindex="-1" aria-labelledby="voirModal<?php echo $t['ID_TRAJET'] ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>
            Auteur :
            <b><?php echo $t['prenom_user'] ?> <?php echo $t['nom_user'] ?></b>
          </li>
          <li>
            Téléphone :
            <b><?php echo $t['tel'] ?></b>
          </li>
          <li>
            Email :
            <b><?php echo $t['mail'] ?></b>
          </li>
          <li>
            Nombre total de places :
            <?php echo $t['nb_max_users'] ?>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>