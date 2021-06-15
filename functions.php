<?php   
 function nav_item(string $lien, string $name, string $linkClass): String{
     $class = "nav-item";
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $class .= ' active';
    }
    return <<<HTML
            <li class= "$class">
                <a class="nav-link $linkClass" aria-current="page" href="$lien">$name</a>
            </li>
HTML;
}
function nav_menu($linkClasse = '') : string{
    return
        nav_item("/index.php", "index",  $linkClasse) . 
        nav_item("/jeu.php", "jeux",$linkClasse).
        nav_item("/menu.php", "menu",$linkClasse).
        nav_item("/contact.php", "contact",$linkClasse);
}
// les fonction en dessous pour mettre les input cocher si elles est coché deja (checkbox() and radio())
function checkbox(string $name, string $value, array $data) : string{

    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])){
        $attributes .= 'checked';
    }
    return <<<HTML
            <label>
                <input type="checkbox" name="{$name}[]" value="$value" $attributes>
            </label>
HTML;
}
function radio(string $name, string $value, array $data) : string{

    $attribute = '';
    if (isset($data[$name]) && in_array($value, $data[$name])){
        $attribute .= 'checked';
    }
    return <<<HTML
            <label>
                <input type="radio" name="{$name}[]" value="$value" $attribute>
            </label>
HTML;
}
function select (string $name, $value, array $options){
    $html_options = [];
    foreach($options as $k => $option){
        $attribute = $k === $value ? ' selected' :'' ;
        $html_options[] ="<option value='$k' $attribute>$option</option>" ;
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) .' </select>';
}
function dump($variable){
    echo '<pre style="overflow :inherit;">';
    var_dump($variable);
    echo '</pre>';
} 

function crenaux_html(array $creneaux){
    // construire le tableau intermédiaire
    // de Xh â Yh
    // implode pour construire la phrase final
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $liste = [];  
    foreach ($creneaux as $creneau) {
        $phrase = []; 
        if (!empty($creneau)) {
            foreach ($creneau as $cre) {    
                $phrase[] = "de <strong>{$cre[0]}h</strong> â <strong>{$cre[1]}h</strong>";
            }
            $liste[] = 'Ouvert ' . implode(' et ', $phrase);
        }else{
            $liste[] = 'Fermé';
        }
       
    }
   return $liste;
}
function in_creneaux(int $heure, $creneaux): bool{
    foreach($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;
}