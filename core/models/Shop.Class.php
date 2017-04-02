<?php
/**
 * Nicolás Migueles - 1/4/17;
 */
class Shop
{
  protected $_db;
  public $prod;
  protected $carro;
  public $Subtotal;
  public $TasaDesc;
  public $TotalDesc;
  public $Total;

  public function __construct(){
    $this->_db = new Con;
    $this->prod = new Producto;
    $this->carro = new Carrito;
  }
//Promociones;
  public function ExistePromo($cod){
    $q = $this->_db->query("SELECT cod FROM promociones WHERE cod=$cod");
    return $this->_db->rows($q) > 0 ? true : false;
  }
  public function NuevaPromo($tasa,$cod){
      if (!$this->ExistePromo($cod)) {
        $q = $this->_db->query("INSERT INTO promociones SET cod = $cod");
        return "El código ".$cod." es ahora un codigo promocional del ".$tasa."%";
      }else{
        return "El código ya existe, elíja otro.";
      }
  }
  public function AplicarPromoAProducto($idprod,$codpromo){
    if ($this->ExistePromo($codpromo)) {
      $producto = $this->prod->ExisteProducto($idprod); // return boolean
      if ($producto) {
        $this->_db->query("UPDATE productos SET promo = $cod WHERE id = $idprod");
        return "Promoción Aplicada.";
      }else{
        return "El producto ingresado no existe.";
      }
    }else{
      return "La Promoción ingresada no existe.";
    }
  }
  public function QuitarPromoAProducto($idprod){
    $producto = $this->prod->ExisteProducto($idprod); // return boolean
    if ($producto) {
      $this->_db->query("UPDATE productos SET promo = '0' WHERE id = $idprod");
      return "Promoción Removida.";
    }
  }
// Productos;
  public function dataProducto($id){
    return $this->prod->BuscarProducto($id); //Array con data;
  }
  public function precioProducto($id){
    return $this->prod->inited == false ? "No hay cargado ningún producto." : $this->prod->Precio($id);
  }
  public function Cantidad_de_Productos(){
    return $this->prod->TotalProductos();
  }
// Carrito de compras, productos;
  public function inCarrito($indice){
    return $this->carro->inbox($indice);
  }
  public function box(){
    return $this->carro->box; //(Devuelve el array);
  }
  public function addProductoalCarrito($idprod){
    if ($this->prod->ExisteProducto($idprod)) {
      $this->carro->add($idprod);// chekear si ya existe que agrege uno;
    }
  }
  public function removeProductodelCarrito($idprod){
    if ($this->prod->ExisteProducto($idprod)) {
      $this->carro->remove($idprod);// chekear si habia uno, delete($idprod);
    }
  }
  public function deleteProductodelCarrito($idprod){
    if ($this->prod->ExisteProducto($idprod)) {
      $this->carro->delete($idprod); // chekear si estaba antes en el carro;
    }
  }
// Mostrar Valores al usuario del total a pagar;
  public function Subtotal(){
    $this->Subtotal= $this->carro->Total();
    return $this->Subtotal;
  }
  public function DescuentoAlTotal($cod = null){
    if ($cod != null) {
      $q = $this->_db->query("SELECT tasa FROM promociones WHERE cod=$cod");
      $this->TasaDesc = $this->_db->recorrer($q)[0];
    }else{
      $this->TasaDesc = 0;
    }
    $this->TotalDesc = $this->Subtotal * ($this->TasaDesc/100);
    return $this->TotalDesc;
  }
  public function TotalVenta($cod = null){
    $subtotal = $this->Subtotal();
    $descuentoaltotal = $this->DescuentoAlTotal($cod);
    $this->Total = $subtotal - $descuentoaltotal;
    return $this->Total;
  }

//FIN CLASS;
}
?>
