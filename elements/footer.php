<?php
$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php' ;
require_once $fichier;
$supp = isset($supp) ? $supp : true ;
?>
</main>
<footer>
<hr>
    <div class="row">
        <div class="col-ms-4">
            <?php
                require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DoubleCompteur.php';
                $compteur = new DoubleCompteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
                $compteur->incrementer();
                $vues = $compteur->recuperer();
            ?>
            Il ya <?=$vues?> visite<?php if($vues > 1):?>s<?php endif;?> sur le site
        </div>
        <?php if($supp): ?>
        <div class="col-md-2">   
            <form action="/newsletter.php" method="POST" class="form-inline">
                    <div class="group-form" >
                        <input type="mail" name="mail" placeholder="entrer votre email" class="form-control" value="" required>
                    </div>
                    <button type="submit" class="btn btn-primary form-control" style="margin-top:5px;">S'inscrire</button>                
            </form>
        </div>
        </div>
        <?php endif;?>
        <div class="col-md-4">
            <h5>navigation</h5>
            <ul>
                <?= nav_menu();?>
            </ul>    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
            
            <div class="footer">
                <p>&copy; Company 2021</p>
            </div>
        </div>
    
</footer>
</body>

</html>