<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=ins
$car = New Producto;
switch ($mode) {
  default:
    include('html/tophp/index.php');
    break;
}

?>
