<?php
require_once 'functions.php';
$title = 'Notre menu';
$lines = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.csv');
//$lines = explode(PHP_EOL, $menu);
foreach ($lines as $k => $line) {
    $lines[$k] = explode(";", trim($line)); //trim() pour supprimmer les espaces avant et aprés le caractère

}
require_once 'elements/header.php';
?>
<h1>Menu</h1>
<div>
    <?php foreach($lines as $k => $line): ?>
        <?php if(count($line) === 1):?>
            <h2 style="margin-left: 30px;"><?= $line[0]?></h2>
        <?php else:?>
            <div style="margin-left: 30px;" class="row">
                <div class="col-sm-8">
                    <p>
                        <strong><?= $line[0]; ?> </strong> <br>
                        <?= $line[1];?>
                    </p>
                </div>
                <div class="col-sm-4">
                    <strong><?= number_format((float) $line[2], 2, ',', ' ')?> &euro; </strong>
                </div>
            </div>
            <?php endif?>
    <?php endforeach;?>    
</div>
<?php
require_once 'elements/footer.php';
?>
