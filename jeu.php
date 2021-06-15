<?php
$title = 'Jeux';
require 'elements/header.php';
require_once 'functions.php'; 
$num = 5;
$erreur = null;
$succes =null;
$value =null;
//checkbox
$parfurms = [
    'Fraise' => 4, 
    'Vanille' => 5,
    'Chocolate' => 3
];

//radio
$cornets = [
    'Pot' => 2,
    'cornet' => 3
];

//checkbox
$supplements = [
    'pépites de chocolate' => 1,
    'Chantilly' => 0.5
];
$title = "Composer votre glace";
$ingredients = [];
$total = 0;

foreach(['parfurm', 'supplement', 'cornet'] as $name){
    if(isset($_GET[$name])){
        $choix= $_GET[$name];     
        $liste = $name . 's';        
        if(is_array($choix)){
            foreach($choix as $value){
                 if(isset($$liste[$value])) {
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        }else{
            if(isset($$liste[$choix])) {
                    $ingredients[] = $name;
                    $total += $$liste[$choix];
                }
            }   
    }   
    
}


if(isset($_GET['chiffre'])){
    $value = (int) $_GET['chiffre'] ;
        if ($value > $num){
            $erreur = "votre chiffre est trés grand";
        }elseif($value < $num){
            $erreur = "votre chiffre est trés petit";
        }else{
            $succes = "Bravo!!! vous avez deviné le chiffre <strong> $num </strong>";
        }
}

?>
<?php if($erreur):?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php elseif($succes): ?>
<div class="alert alert-success">
    <?= $succes ?>
</div>
<?php endif ; ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-tittle"> Votre glace </h5>
                    <ul>
                        <?php foreach($ingredients as $ingredient): ?>
                        <li><?=$ingredient;?></li> 
                        <?php endforeach?> 
                    </ul>
                    <p>
                        <strong>Prix : </strong> <?= $total ?> &euro; 
                    </p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <form style="margin-left:50px; margin-bottom:20px;" action="/jeu.php" method="GET">
            <div class="form-group">
                <input type="number" style="width:300px" class="form-control"name="chiffre" placeholder="get your number" value="<?= $value?>">
                <input type="text" style="margin-top:15px; width:300px;" placeholder="get your comment" class="form-control" name="text" value="<?php if(isset($_GET['text'])){ echo htmlentities($_GET['text']);} ?>">
                
            </div>
            <h1> <strong><?=$title?></strong></h1>
            <h2>choisissez vos parfums</h2>
            <div class="form-group">
                <?php foreach($parfurms as $parfurm => $prix) :?>
                <div class="checkbox">
                    <?= checkbox('parfurm', $parfurm, $_GET) ?>
                    <?= $parfurm ?> - <?=$prix?> &euro;
                </div>
                <?php endforeach; ?> 
            </div>
            <h2> choisissez votre cornet</h2>
            <div class="form-group">
                <?php foreach($cornets as $cornet => $prix) :?>
                    <div class="checkbox">
                    <?= radio('cornet', $cornet, $_GET) ?>
                    <?= $cornet ?> - <?=$prix?> &euro;
                    </div>
                <?php endforeach; ?> 
            </div>
            <h2>choisissez votre suppléments</h2>
            <div class="form-group">
                <?php foreach($supplements as $supplement => $prix) :?>
                    <div class="radio">
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - <?=$prix?> &euro;
                    </div>
                <?php endforeach; ?> 
            </div>
            <button style="margin-top:15px;" class="btn btn-primary" type="submit">Deviner</button>
        </form>

    </div>
</div>
<?php 
require 'elements/footer.php';
?>
