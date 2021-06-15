<?php
require_once 'functions/auth.php';
force_utilisateur_connecte();
require_once 'functions/compteur.php';
$annee = date('Y');
$annee_selection = empty($_GET['annee'])? null: (int)$_GET['annee'];
$mois_selection = empty($_GET['mois'])? null: $_GET['mois'];
if ($annee_selection && $mois_selection){
    $total = nombre_vue_mois($annee_selection, $mois_selection);
    $details = nombre_details_vue($annee_selection, $mois_selection);
}else{
    $total = nombre_vue();
}
$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
require_once 'elements/header.php';
?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for($i = 0 ; $i<5 ; $i++): ?>
                <a class="list-group-item <?= $annee_selection === $annee-$i ? 'active' : ''?>" href="dashboard.php?annee=<?=$annee - $i?>"><?= $annee - $i ?></a>
                <div class="list-group">
                    <?php if($annee_selection === $annee-$i):?>
                    <?php foreach($mois as $num => $nom):?>
                        <a href="dashboard.php?annee=<?=$annee_selection?>&mois=<?=$num?>" class="list-group-item <?=$mois_selection == $num?'active':''?>"><?=$nom?></a>
                    <?php endforeach;?>    
                    <?php endif;?>    
                </div>
            <?php endfor;?>
        </div>
    </div>
    <div class="col-md-8">
        <div style="padding:0 20px;" class="card mb-4">
            <div class="body">
                <strong style="font-size:3em;"><?=$total?></strong>
                visite<?= $total > 1 ? 's' : ''?> total
            </div>
        </div>
        <?php if (isset($details)):?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jour</th>
                    <th>Mois</th>
                    <th>Année</th>
                    <th>Nombre de visites</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $ligne):?>
                <tr>
                    <td><?= $ligne['jour']?></td>
                    <td><?= $ligne['mois']?></td>
                    <td><?= $ligne['annee']?></td>
                    <td><?= $ligne['visites']?> visite<?=$ligne['visites']>1? 's' : ''?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <?php endif;?>
    </div>
</div>

<?php require_once 'elements/footer.php'?>