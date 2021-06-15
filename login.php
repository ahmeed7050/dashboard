<?php
$error = null;
$password = '$2y$10$seaUYI7AloVP/AjFKWNJSu.5qFgYhnsUzFFrEa7k0tQutqcdDmShW';
if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
    //if ($_POST['pseudo'] === 'ahm' && $_POST['mdp'] === 'hssin') {
    if ($_POST['pseudo'] === 'admin' && password_verify($_POST['mdp'], $password)) {
        session_start();
        $_SESSION['connecte'] = 1;
        header('location: /dashboard.php');
        exit();
    } else {
        $error = 'identifiants incorrects';
    }
}
require_once 'functions/auth.php';
if (est_connecte()) {
    header('location: /dashboard.php');
    exit();
}
require_once 'elements/header.php';
?>
<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>
<form action="" method="post">
    <div class="form-group">
        <input type="text" name="pseudo" class="form-control" placeholder="nom d'utisateur">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require 'elements/footer.php'; ?>