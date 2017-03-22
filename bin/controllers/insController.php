<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$name = $_POST['name'];
$ape = $_POST['ape'];
$email = $_POST['email'];
$tel = $_POST['tel'];

switch ($mode) {
  case 'ins':
    $ins = new Inscripciones;
    $ins->inscribir($name,$ape,$email,$tel);
    break;

  default:
    break;
}
 ?>
