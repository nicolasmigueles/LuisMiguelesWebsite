<?php
/**
 *
 */
class Carrito
{
  protected $_db;
  public $prod;
  public $box;
  public $Subtotal;
  public $DescuentoTotal;
  public $Total;

  public function __construct(){
    $this->_db = new Con;
    $this->prod = new Producto;
    $this->box = 0;
  }
  public function add($idprod){
    if ($this->box == null) {
      $this->box = array(0 => $idprod);
    }else{
      array_push($this->box , $idprod);
    }
  }
  public function remove($idprod){
    unset($this->box[$idprod]);  //buscar en el array el id y eliminarlo;
  }
  public function inbox($indice){
    return $this->box[$indice];
  }
  public function ProductosInbox(){
    $resp = Array();
    foreach($this->box as $prod => $i){
      array_push($resp,$this->prod->BuscarProducto($i));
    }
    return $resp;
  }
  public function Subtotal(){
    foreach ($this->box as $i => $id) {
      $this->Subtotal = $this->Subtotal + $this->prod->Precio($id);
    }
    return $this->Subtotal;
  }
  public function TotalDesc(){
    foreach ($this->box as $i => $id) {
      $this->DescuentoTotal = $this->DescuentoTotal + ($this->prod->Precio($id) - $this->prod->DescuentoenPlata($id));
    }
    return $this->DescuentoTotal;
  }
  public function Total(){
    return $this->Subtotal();// - $this->TotalDesc();
  }



}
 ?>
