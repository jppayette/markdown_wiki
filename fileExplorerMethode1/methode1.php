<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="description de la page">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom CSS -->
    <style>

    </style>

</head>
<body>

    <!-- CONTENT START -->

    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--  Le formulaire permettant d'envoyer un fichier -->
                <form enctype="multipart/form-data" action="" method="post">
                    <input name="userfile" type="file" class=""><br>
                    <input type="submit" value="Envoyer le fichier" class="">
                </form>
                
<!--  Et au travers de mon fichier HTML j'ai du PHP -->
<?php

if(  isset($_FILES['userfile'])   ){
    $uploaddir = './upload/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    // $uploadfile = './upload/' . basename($_FILES['userfile']['name']);
    
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé avec succès.<br>"; 
    } else {
    echo "Attaque potentielle par téléchargement de fichiers.<br>";
    }
    
    
    // if (commande a executé : si le resultat de la commande est vrai ){
        // faire le resultat
    //}
    
    
    // echo 'Voici quelques informations de débogage :';
    print_r($_FILES);
    
}

?>

<!-- Declaration du tabpeau -->
<table class="table table-striped">
    <thead>
    <!-- En tete du tabpeau -->
        <tr> 
            <th>Nom</th>
            <th>Taille</th>
            <th>Date</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>

<?php
// inclusion du fichier fonction.php qui comprends les fonctions utilisés par le script

include('functions.php');
// Cette fonction est déplacé dans le fichier functions.php
// function rrmdir($dir) {
//     foreach(glob($dir . '/*') as $file) {
//         if(is_dir($file))
//             rmdir($file);
//         else
//             unlink($file);
//     }
//     rmdir($dir);
// }

// Récupérer le delete depuis la barre d'adresse et execute 
if (isset($_GET['delete']) && ($_GET['delete']==1)){
    // si le fichier est un répertoire, appelle la fonction
    $file = $_GET['file']; 
    if( is_dir($file)){
        echo "destroyDir";
        rrmdir($file);
    }
    else {
        // si le fichier est un fichier (oui..) 'supprime' le fichier
        unlink($file);
    }
    $_GET['delete'] = 0;



}





// Récupération du répertoire utilisé par DirectoryIterator
// lou.nepsod.fr/index.php?value=123&dir=test
if (isset($_GET['dir'])){
    $dir = $_GET['dir'];
} else {
    $dir = './';
}


// Pour chacun des items du répetoire en utilisant la méthode DirectoryIterator
// donne une instance de l'object $fileInfo qui pourra utiliser les méthodes
// isDir(), getFileName(), 
foreach (new DirectoryIterator($dir) as $fileInfo) {
    // Ouverture de la rangée
    echo "<tr>";
    // Si le fichier est un répertoire
    if ($fileInfo->isDir()){
        if(!$fileInfo->isDot()) {  
            // if ($fileInfo->getFileName() != '..') || ($fileInfo->getFileName() != '.')
            echo "<td>ceci est un repertoire SANS point avec un boutton</td>";
            echo "<td>" . $fileInfo->getFileName() .  "</td>";
            echo "<td> <a href='?delete=1&file=".$fileInfo->getFileName()."'> DELETE </a></td>";
        } else {
            echo "<td>ceci est un repertoire AVEC point</td>";
        }
    } else {
        // Le fichier est bien un fichier
        echo " <td>ceci est un fichier AVEC un bouton</td>";
        echo "<td>" . $fileInfo->getFileName() .  "</td>";
        echo "<td> <a href='?delete=1&file=".$fileInfo->getFileName()."'> DELETE </a></td>";
    }
    // Fermeture de la rangée
    echo "</tr>";
} 


   // Code de base qu'on avait fait y'a quelques jours.

    // if ($fileInfo ->isDir()){

    //     if(($dir == "./") || ($dir == "../")){
    //         echo "<tr><td><a href='?dir=".$dir ."/" . $fileInfo->getFilename() ."'>" . $fileInfo->getFilename();"</a></td>";
    //         echo "<td>". formatSizeUnits(filesize($fileInfo)) . "</td>";
    //         echo "<td>". date ("F d Y H:i:s.", $fileInfo->getMTime())  ."</td>";

    //     }else{

    //         echo "<tr><td><a href='?dir=".$dir ."/" . $fileInfo->getFilename() ."'>" . $fileInfo->getFilename();"</a></td>";
    //         echo "<td>". formatSizeUnits(filesize($fileInfo)) . "</td>";
    //         echo "<td>". date ("F d Y H:i:s.", $fileInfo->getMTime())  ."</td>";
    //             echo "<td><button type='button' class='btn btn-danger'>x</button></td></tr>";

    //     }

    // }

    // if ($fileInfo ->isFile()){
    //     if(($dir == "./") || ($dir == "../")){
    //         echo "<tr><td><a href='?dir=".$dir ."/" . $fileInfo->getFilename() ."'>" . $fileInfo->getFilename();"</a></td>";
    //         echo "<td>". formatSizeUnits(filesize($fileInfo)) . "</td>";
    //         echo "<td>". date ("F d Y H:i:s.", $fileInfo->getMTime())  ."</td>";

    //     } else {


    //         echo "<tr><td><a href='".$dir ."/" . $fileInfo->getFilename() ."'>" . $fileInfo->getFilename();"</a></td>";
    //         echo "<td>" . formatSizeUnits(filesize($fileInfo)) . "</td>";
    //         echo "<td>". date ("F d Y H:i:s.", $fileInfo->getMTime()) ."</td>";
    //         echo "<td><button type='button' class='btn btn-danger'>x</button'></td></tr>";
    //     }

    // }



        /*



        */
















  

?>

            </tbody>
            </table>
        </div>
    </div>
</div>








    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>