<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=ins
$cat = New Categorias;
switch ($mode) {
  default:
    //echo $cat->CategoriadelProd(1);
    var_dump($cat->Categorias());
    include('html/tophp/index.php');
    break;
}

?>
