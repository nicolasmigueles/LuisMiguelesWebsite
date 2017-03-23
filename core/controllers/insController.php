<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=ins
$name = isset($_POST['name']) ? $_POST['name'] : null;
$ape = isset($_POST['ape']) ? $_POST['ape'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$tel = isset($_POST['tel']) ? $_POST['tel'] : null;

$ins = new Inscripciones;
switch ($mode) {
  case 'ins':
    $ins->inscribir($name,$ape,$email,$tel);
    break;

  default:
    include('html/tophp/index.php');
    break;
}
 ?>
