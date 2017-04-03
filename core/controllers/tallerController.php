<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=taller

$name = isset($_POST['name']) ? $_POST['name'] : null;
$ape = isset($_POST['ape']) ? $_POST['ape'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$tel = isset($_POST['tel']) ? $_POST['tel'] : null;


$taller = new Taller;
$cant_ins = $taller->cantidad_inscriptos();
switch ($mode) {
  case 'inscribir':
    $taller->Inscribir($cant_ins);
    break;
  case 'editar':
    $taller->Editar();
    break;
  case 'borrar':
    $id = isset($_GET['id']) ? $_GET['id'] : false;
    if ($id != false) {
      $taller->Delete($id,$cant_ins);
    }
    break;
  case 'inscribir':
    break;

  default:
    include('html/tophp/index.php');
    break;
}
 ?>
