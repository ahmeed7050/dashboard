<?php
$success = null;
$error = null;
$mail = null; 
if (!empty($_POST['mail'])) {
    $mail = $_POST['mail'];
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('y-m-d') ;
        file_put_contents($file, $mail . PHP_EOL, FILE_APPEND);
        $success = 'votre email à bien été enregistrer!!';
    }else {
        $error = 'email invalide';
        $mail = null;
    }
}

require_once 'elements/header.php';
?>
<div class="row" style="margin-left:100px;">
    <h1>S'inscrire à letter</h1>
    <p style="width:800px;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium totam, 
        officia quo facilis eos veritatis voluptatum consequuntur molestias accusamu
        impedit odit quae nam quod eveniet? Cum delectus consequatur iste voluptatum.
    </p>
    <?php if($success):?>
        <div class="alert alert-success" style="width:700px">
            <?= $success ?>
        </div>
        <?php endif;?>
    <?php if($error):?>
        <div class="alert alert-danger" style="width:700px">
            <?= $error ?>
        </div>
    <?php endif;?>

    <form action="/newsletter.php" method="POST" class="form-inline">
        <div class="group-form col-md-4 " >
            <input type="mail" name="mail" placeholder="entrer votre email" class="form-control" value="<?= htmlentities($mail);?>" required>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary" style="margin-top:5px;">S'inscrire</button>
        </div>
    </form>

</div>
</div>
<div style="margin-top:300px">
    <?php 
    $supp = false;
    require_once 'elements/footer.php'?>
</div>