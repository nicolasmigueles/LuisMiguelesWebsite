<?php
/**
 *
 */
class Producto
{
  protected $_db;
  public $nombre;
  public $descripcion;
  public $precio;
  public $foto;
  public $stock;
  protected $inited;
  public $datos;
  //public $oferta;


  public function __construct(){
    $this->_db = new Con;
    $this->inited = false;
  }
  public function _init($array = null){
    if ($array === null) {
      $this->inited = false;
      return;
    }
    $this->nombre = $array["nombre"];
    $this->descripcion = $array["descripcion"];
    $this->precio = $array["precio"];
    $this->foto = $array["foto"];
    $this->stock = $array["stock"];
    $this->inited = true;
  }
  public function BuscarProducto($id){
    $q = $this->_db->query("SELECT * FROM productos WHERE (id=$id)");
    $consulta = $this->_db->recorrer($q);
    $array = array('nombre' => $consulta['nombre'],
              'descripcion' => $consulta['descripcion'],
              'precio' => $consulta['precio'],
              'foto' => $consulta['img'],
              'stock' => $consulta['stock']
            );
    $this->datos = $array;
    $this->_init($array);
  }
  public function ExisteProducto($id){
    $q = $this->_db->query("SELECT * FROM productos WHERE (id=$id)");
    return $this->_db->rows($q) > 0 ? true : false;
  }
  public function NuevoProducto(){
    $this->CheckDatos('?view=error&num=');
    $this->_db->query("INSERT INTO productos (`id`, `nombre`, `descripcion`, `img`, `precio`, `stock`, `visible`, `cod`) VALUES (NULL, $this->nombre, $this->descripcion, $this->foto, $this->precio, $this->stock, '1', NULL)");
  }
  public function CheckDatos($url){
    try {
      if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['foto']) || empty($_POST['precio']) ||  empty($_POST['stock']))  {
        throw new Exception(1);
      }else{
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $this->descripcion = $this->db->real_escape_string($_POST['descripcion']);
        $this->foto = $this->db->real_escape_string($_POST['foto']);
        $this->precio = $this->db->real_escape_string($_POST['precio']);
        $this->stock = $this->db->real_escape_string($_POST['stock']);
      }
    } catch (Exception $error) {
      header('location:'. $url . $error->getMessage());
      exit;
    }
  }
  public function loadProducto($array = null){
    if ($array == null && $this->inited) {
      return $this->nombre;
    }
    if ($this->inited) {
      return $this->nombre;
    }else{
      return "No hay un producto cargado en la clase";
    }
  }
  public function CambiarPrecio($id,$nuevoprecio){
    $this->BuscarProducto($id);
    $a = $this->_db->query("UPDATE productos SET precio = $nuevoprecio WHERE (id=$id)");
  }
  public function Precio($id){
    $this->BuscarProducto($id);
    return $this->precio;
  }
  public function HayStock($id){
    $this->BuscarProducto($id);
    if ($this-stock <= PUNTO_REPOSICION_STOCK) {
      // ALERTAR DE STOCK
    }
    return $this->stock != 0 ? true : false;
  }
  public function DescuentoenPlata($id){
    $a = $this->_db->query("SELECT cod FROM productos WHERE (id=$id)");
    $cod = $this->_db->recorrer($a)[0];
    $q = $this->_db->query("SELECT tasa FROM promociones WHERE (cod=$cod)");
    $tasa = $this->_db->recorrer($q)[0];
    return $this->Precio($id) * ($tasa / 100);
  }
  public function TotalProductos(){
    $q = $this->_db->query("SELECT COUNT(nombre) FROM productos");
    return $this->_db->recorrer($q)[0];
  }
// FIN CLASS;
}
 ?>
