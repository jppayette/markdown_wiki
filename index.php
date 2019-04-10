<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    
    <div id="wiki">


        <?php

        $url = parse_url ($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        if (empty($url)){
            include('index.wiki');    
        }
        else {
            include('wiki/'.$url);    
        }
        ?>

    </div>
    <a href="?">Index</a>
    
    <div id="targetDiv"></div>
    
    <script src="bower_components/showdown/dist/showdown.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html> 