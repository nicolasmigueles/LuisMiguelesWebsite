<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : null; // ?mode=taller
$id = isset($_GET['id']) ? $_GET['id'] : null;
$taller = new Taller;
$cant_ins = $taller->cantidad_inscriptos();
switch ($mode) {
  case 'inscribir':
    $taller->Inscribir($cant_ins);
    break;
  case 'select_payment':
    $method = isset($_GET['method']) ? $_GET['method'] : null;
    if ($method == 1) {
      $taller->Efectivo($id);
    }elseif($method == 2){
      $taller->Transferencia($id);
    }elseif ($method == null) {
      include('html/tophp/taller-select.php');
    }else{
      header('location: ?view=error&msg=incorrect_method');
    }
    break;
  case 'response':
    $msg = isset($_GET['msg']) ? $_GET['msg'] : null;
    $pago = ($msg == 1 ? 'Efectivo' : 'Transferencia Bancaria');
    include('html/tophp/taller-thankyou.php');
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
  default:
    include('html/tophp/taller.php');
    break;
}
?>
