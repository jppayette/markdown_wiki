<?php
/* **************************************************
Fait l'affichage dans le tableau HTML des différents fichiers 
et répetoire du répertoire spécifié depuis l'URL
*/

if (isset ( $_GET['directory'] )){
    $directory = $_GET['directory'];
} else {
    $directory = './';
}

foreach (new DirectoryIterator($directory) as $fileInfo) {
    $fileName = $fileInfo->getFilename();

    if ( $fileName == '.' ) continue;
    echo "<tr>";

        if ( $fileInfo->isDir()){   // c'est un dossier
            echo "<td><a href='?directory=" . $directory  . '/' . $fileName . "'>" . $fileName . "</a></td>";
        } else {    // c'est un fichier
            echo "<td><a href='" . $directory  . '/' . $fileName . "'>" . $fileName . "</a></td>";

        }   
        
        // ces éléments sont communs aux deux conditions
        echo "<td>" . formatSizeUnits( $fileInfo->getSize() ) . "</td>";
        echo "<td><button type='button' class='btn btn-danger' data-file='". $directory . '/' .$fileName ."'>Supprimer</button> </td>";
    echo "</tr>";
}   

?>


