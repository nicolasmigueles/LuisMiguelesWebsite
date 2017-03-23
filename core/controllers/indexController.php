<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=ins

switch ($mode) {
  default:
    include('html/tophp/index.php');
    break;
}

?>
