<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';
echo Form::checkbox('demo', 'Demo', []);

/*require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Creneau.php';
$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(14, 16);
echo $creneau->toHtml();
var_dump(
    $creneau->intersect($creneau2)
);*/

/*$date = new DateTime('2021-03-28');
$interval = new DateInterval('P1M1DT1M');//pariode de 1 mois et 1 day et 1 munite
$date->add($interval);
var_dump($date);*/


/*$date = '2021-03-01';
$date2 = '2021-06-01';

$d = new DateTime($date);
$d2 = new DateTime($date2);
$diff = $d->diff($d2, true);
echo " il ya {$diff->y} années, {$diff->m} mois et {$diff->d} jours de différence";
echo " il ya {$diff->days} jour de différence";
echo "\n";
$time = strtotime($date);
$time2 = strtotime($date2);

$days = floor(abs(($time2 - $time)/(24 * 60 * 60)));
echo " il ya $days jour de différence";
*/




/*$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php' ;
echo $fichier ;
exit();
echo dirname('PHP AND HTML/functions.php');

$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'menu.tsv';
echo file_get_contents($fichier);
exit();
// pour l'ecture de fichier
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.csv';
$resource= fopen($fichier,'r+');
$k = 0;
while($line = fgets($resource)){
    $k++ ;
    if ($k === 8){
        fwrite($resource, 'salut les gens');
        break;
    }
}
fclose($resource);
POUR L'ECRITURE DANS LE FICHIER
$fichier = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'demo.txt';
$res = @file_put_contents($fichier, ' comment ca va', FILE_APPEND);

if ($res === false) {
    echo 'Imposible d\'écriture dans le fichier';
}else {
    echo 'Ecriture réussie';
} 
*/
