
<?php

if ($_POST['file']) {
  $file = $_POST['file'];
  var_dump( $_POST['file'] );
  include('functions/rrdirv1.php');
  rrmdir2($file);
}
?>