<?php
class Creneau{
    public $debut;
    public $fin;

    public function __construct (int $debut, int $fin)
    {
        $this->debut = $debut ;
        $this->fin = $fin;
    }

    public function includeHeure (int $heure):bool
    {
        return $heure >= $this->debut && $heure <= $this->fin;
    }

    public function intersect (Creneau $creneau):bool
    {
        return $this->includeHeure($creneau->debut) ||
            $this->includeHeure($creneau->fin) || 
            ($this->debut > $creneau->debut && $this->fin < $creneau->fin);

    }
    function toHtml(){
        return "de <strong>{$this->debut}h</strong> à <strong>{$this->fin}h</strong>";
    }
}
