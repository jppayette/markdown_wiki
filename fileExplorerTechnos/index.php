<?php
// Défini les variables d'environnement permettant d'éviter les erreurs liés au ../ ou autres

define('ROOT_DIR', dirname(__FILE__)); //C:\htdocs\fileExplorer 
define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR)))); // /fileExplorer

require ('functions.php'); 
include ('themes/head.php'); // En tête du document
?>

<!-- Coeur de l'exploreur -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Explorateur de fichier</h1>
        </div>
        <div class="col-12">
            <!--  Le formulaire permettant d'envoyer un fichier -->
            <?php
                include ('functions/upload.php');
                include ('themes/uploadForm.php');
            ?>

        </div>
        <div class="col-12">

        <table class="table table-striped">
        <!-- Explorateur -->
            <?php
                // Coeur de l'application
                include ('functions/explorer.php'); 
            ?>
        </table>

        </div>
    </div>
</div>

<?php
include ('themes/footer.php'); // Simple fichier avec le pied de page
?>