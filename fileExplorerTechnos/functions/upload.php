<?php
/* **************************************************
Upload de fichier
*/

if(  isset($_FILES['userfile'])   ){
    $uploaddir = 'upload/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        include('themes/alert.php');
    } else {
    echo "Attaque potentielle par téléchargement de fichiers.<br>";
    }
}

?>
