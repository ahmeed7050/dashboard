<?php
class Compteur{
    public $compteur = 1;
    public $fichier;
    public function __construct(string $fichier){
        $this->fichier = $fichier ;
    }
    public function incrementer()
    {   
        if (file_exists($this->fichier)){
            $this->compteur = (int)file_get_contents($this->fichier);
            $this->compteur++;
        }
        file_put_contents($this->fichier, $this->compteur);
    }
    public function recuperer():int
    {
        return file_exists($this->fichier)?(int)file_get_contents($this->fichier):0;
    }
}