<?php

function rrmdir($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rmdir($file);
        else
            unlink($file);
    }
    rmdir($dir);
}

?>