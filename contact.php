<?php
$nav = 'contact';
$title = 'contact';
require_once 'data/config.php';
require 'elements/header.php'; 
date_default_timezone_set('Africa/tunis');
//Récupérer l'heure d'aujourd'hui $heure
// Récupérer les créneaux d'aujourd'hui $creneaux
// Récupérer l'état d'ouverture de magasin
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneau = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneau);
$creneaux = crenaux_html(CRENEAUX);
$choice = $ouvert;
$color = 'green';
$color = $ouvert ? 'green' : 'red' ;  
?>
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <h2> Nous Contacter</h2>
            <p style="margin-top:70px;">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore amet harum quisquam voluptatem, aliquam, quos in a, officiis dolorem unde optio velit minima accusantium officia ad. Aut nisi consectetur iusto.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, doloremque, ipsum aut laudantium et nulla aliquid tempore fugit dolore quidem non quo at hic quae quis animi. Suscipit, fugit magni.
            </p>
        </div>
        <div class="col-md-4">
            <h3>horaire d'overture</h3>
            <?php if ($choice): ?>
                    <div class="alert alert-success">Le magasin sera ouvert</div>
                <?php else: ?>
                    <div class="alert alert-danger">Le magasin sera fermé</div>
                <?php endif; ?>
            <form action="/contact.php" method="GET">
                <div class="form-group" style="margin:5px;">
                    <?= select('jour', $jour, JOURS)?>
                </div>
                <div class="form-group" style="margin:5px;">
                    <input class="form-control" name="heure" type="number" value="<?= $heure?>">
                </div>
                <button style="margin:5px;" class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
            </form>
            <ul>
                <?PHP foreach (JOURS as $key => $jour):?>
                    <?php if ($key + 1 === (int) date('N')):?>
                        <div style="color:<?= $color ?>">
                            <li><strong><?=$jour?> :</strong></li>
                            <?= $creneaux[$key]?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <li><strong><?=$jour?> :</strong></li>
                        <?= $creneaux[$key]?>
                    </div>
                <?php endforeach;?>
            </ul>

        </div>
    </div>
</div>

<?php require 'elements/footer.php' ?>