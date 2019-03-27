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

    <!-- Other CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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


                <table class="table table-striped">
                <?php

                    require ('functions.php');

                    if (isset ( $_GET['directory'] )){
                        $directory = $_GET['directory'];
                    } else {
                        $directory = './';
                    }


                    foreach (new DirectoryIterator($directory) as $fileInfo) {
                        //if($fileInfo->isDot()) continue;
                        echo "<tr>";
                        if ( $fileInfo->isDir()){   // c'est un dossier
                            echo "<td><a href='?directory=" . $directory  . '/' . $fileInfo->getFilename() . "'>" . $fileInfo->getFilename() . "</a></td>";
                        } else {    // c'est un fichier
                            echo "<td><a href='" . $directory  . "/" . $fileInfo->getFilename() . "' class='file' data-file='" . $fileInfo->getFilename() . "' id='" . $fileInfo->getFilename() . "'>" . $fileInfo->getFilename() . "</a></td>";
                        }   
                        
                        // ces éléments sont communs aux deux conditions
                        echo "<td>" . formatSizeUnits( $fileInfo->getSize() ) . "</td>";
                        echo "</tr>";
                    }

                ?>
                </table>

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
                </button> -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Comment afficher le contenu du répertoire -->
                            <?php
                                echo $_POST['value'];

                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

    <!-- Custom JS (parallax, etc) -->


    <!-- JS File -->
    <script src="js/main.js"></script>

    <!-- InPage JS -->
    <script>
            $('.file').on( "click", function() {
                event.preventDefault();
                value = this.dataset.file;
                $('#exampleModal').modal('show');

 



           });





    </script>

</body>
</html>
