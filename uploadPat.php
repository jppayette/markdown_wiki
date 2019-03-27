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

<form enctype="multipart/form-data" action="" method="post">
<input name="userfile" type="file" class=""><br>
<input type="submit" value="Envoyer le fichier" class="">
</form>



<?php
$uploaddir = './upload/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
echo "Le fichier est valide, et a été téléchargé avec succès.<br>"; 
} 

// echo 'Voici quelques informations de débogage :';
// print_r($_FILES);

?>


<table class="table table-striped" id="maTable">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Taille</th>
            <th>Date</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>

<?php




if (isset($_GET['dir'])){
    $dir = $_GET['dir'];
} else {
    $dir = './';
}


foreach (new DirectoryIterator($dir) as $fileInfo) {
    // Ouverture de la rangée
    echo "<tr>";
    // Si le fichier est un répertoire
    if ($fileInfo->isDir()){
        if(!$fileInfo->isDot()) {
            echo "<td>ceci est un repertoire SANS point avec un boutton</td>";
        } else {
            echo "<td>ceci est un repertoire AVEC point</td>";
        }

    } else {
        // Le fichier est bien un fichier
        echo " <td>ceci est un fichier AVEC un bouton</td>";
        echo "<td>" . $fileInfo->getFileName() .  "</td>";
        echo "<td> <button id='test' value='". $fileInfo->getFileName()."'>" . $fileInfo->getFileName() . "</button></td>";

    }
    // Fermeture de la rangée
    echo "</tr>";
} 

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



    <script>
      $(function () {

        $('button').click(function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'delete.php',
            data: {
                filename: $(this).val(), // < note use of 'this' here
            },
            success: function (data) {
                //window.location.reload();
                // $("#maTable").html('').html(data); // ne fonctionne pas
                //$("#maTable").ajax.reload();
            }
          });

        });

      });
    </script>
</body>
</html>