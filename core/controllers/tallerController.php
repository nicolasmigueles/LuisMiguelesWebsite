<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=taller

$name = isset($_POST['name']) ? $_POST['name'] : null;
$ape = isset($_POST['ape']) ? $_POST['ape'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$tel = isset($_POST['tel']) ? $_POST['tel'] : null;


$taller = new Taller;
$shop = new Shop;
switch ($mode) {
  case 'ins':
    $taller->inscribir($name,$ape,$email,$tel);
    break;

  default:

    $shop->addProductoalCarrito(1);
    $shop->addProductoalCarrito(2);
    //echo $shop->inCarrito(0);
    var_dump($shop->box());
    echo $shop->prod->Precio(1).'+'.$shop->prod->Precio(2);
    echo "<br>".$shop->Subtotal();

    include('html/tophp/index.php');
    break;
}
 ?>
