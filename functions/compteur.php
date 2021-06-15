<?php
// vérifier si le fichier compteur existe
//si le fichier existe en incrémente 
// sinon en créer le fichier avvec valeur 1
function ajouter_vue(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incremente_compteur($fichier);
    incremente_compteur($fichier_journalier);
} 

function incremente_compteur(string $fichier){
    $compteur = 1 ; 
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}
function nombre_vue() : string{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}
function nombre_vue_mois(int $year, int $mois):int{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year .'-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier) {
        $total += file_get_contents($fichier); 
    }
    return $total;
}
function nombre_details_vue($year, $mois):array{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $year .'-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visites = []; 
    foreach ($fichiers as $fichier) {
        $partie = explode('-',basename($fichier));
        $visites[] =[
                'annee' => $partie[1],
                'mois' => $partie[2],
                'jour' => $partie[3],
                'visites' => file_get_contents($fichier)
            ];
    }
    return $visites ;
}