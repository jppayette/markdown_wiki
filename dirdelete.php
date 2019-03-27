<?php


# recursively remove a directory (de 1 niveau)
function rrmdir($dir) {
    // Supprimer l'intérieur du répertoire
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rmdir($file);
        else
            unlink($file);
    }
    // Supprime le répertoire lui même.
    rmdir($dir);
}
rrmdir('dataDemo/dir1');

?>