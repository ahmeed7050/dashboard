<?php
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);

}
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'] ;
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'] ;    
}

require_once 'elements/header.php';
?>
<?php if($nom):?>
    <h2>Bonjour <?=htmlentities($nom)?></h2>
    <a href="profil.php?action=deconnecter"> se déconnecter</a>
<?php else:?>
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif;?>

<?php require_once 'elements/footer.php'?>