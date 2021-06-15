<?php/*
if (!function_exists('nav_item')) {
    function nav_item(string $lien, string $name): String{
        $class = ''  ; 
        if ($_SERVER['SCRIPT_NAME'] === $lien) {
            $class .= 'active';
        }
        return <<<HTML
                <li class="nav-item">
                    <a class="nav-link $class" aria-current="page" href="$lien">$name</a>
                </li>
HTML;
    }
}
?>
<?= nav_item('/index.php', 'index')?>
<?= nav_item('/contact.php', 'contact')?>
*/?>