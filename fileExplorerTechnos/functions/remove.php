<?php
/* **************************************************
Suppression des éléments
*/

// if( is_dir($_POST['file']) ){
//   recursiveRmDir('../' . $_POST['file']);
// } else {
//   unlink($_POST['file'])
// }

echo "test";

//recursiveRmDir('../' . $_POST['file']);
 
function recursiveRmDir($dir)
{

    $files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::CHILD_FIRST );

    foreach ($files as $file) {
      var_dump($file);
      $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
    }  

    rmdir($dir);
  } 

  ?>
  