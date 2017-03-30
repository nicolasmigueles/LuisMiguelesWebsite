<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=taller
$name = isset($_POST['name']) ? $_POST['name'] : null;
$ape = isset($_POST['ape']) ? $_POST['ape'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$tel = isset($_POST['tel']) ? $_POST['tel'] : null;

$taller = new Taller;
switch ($mode) {
  case 'ins':
    $taller->inscribir($name,$ape,$email,$tel);
    break;

  default:
    echo $taller->inscribir();
    include('html/tophp/index.php');
    break;
}
 ?>
