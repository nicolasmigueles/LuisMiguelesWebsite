<?php
/**
 *
 */
class Producto
{
  protected $db;
  public $nombre;
  public $descripcion;
  public $precio;
  public $foto;
  public $stock;
  protected $inited;
  public $datos;
  
  public function __construct(){
    $this->db = new Con;
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
    $q = $this->db->query("SELECT * FROM productos WHERE id = '$id'") or die( mysqli_error( $this->db ));
    $consulta = $this->db->assoc($q);
    $array = array('nombre' => $consulta['nombre'],
              'descripcion' => $consulta['descripcion'],
              'precio' => $consulta['precio'],
              'foto' => $consulta['img'],
              'stock' => $consulta['stock']
            );
    $this->datos = $array;
    $this->_init($array);
    return $this->datos;
  }
  public function ExisteProducto($id){
    $q = $this->db->query("SELECT * FROM productos WHERE (id=$id)");
    return $this->db->rows($q) > 0 ? true : false;
  }
  public function NuevoProducto(){
    $this->CheckDatos('?view=error&num=');
    $this->db->query("INSERT INTO productos (`id`, `nombre`, `descripcion`, `img`, `precio`, `stock`, `visible`, `cod`) VALUES (NULL, $this->nombre, $this->descripcion, $this->foto, $this->precio, $this->stock, '1', NULL)");
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
  public function CambiarPrecio($id,$nuevoprecio){
    if ($this->ExisteProducto($id)) {
      $a =$this->db->query("UPDATE productos SET precio = $nuevoprecio WHERE (id=$id)");
      if ($a) {
        header('location: ?view=productos');
      }else{
        header('location: ?view=error');
      }
    }else{
      header('location: ?view=error');
    }
  }
  public function Precio($id){
    $this->BuscarProducto($id);
    return $this->precio;
  }
  public function HayStock($id){
    $this->BuscarProducto($id);
    $stock = $this->datos['stock'];
    if ($stock < PUNTO_REPOSICION_STOCK && $stock != 0) {
      return 3; // If HayStock(x) === 3 ; REPONER;
    }
    return $this->stock == 0 ? false : true;
  }
  public function DescuentoenPlata($id){
    $a = $this->db->query("SELECT cod FROM productos WHERE (id=$id)");
    $cod = $this->db->recorrer($a)[0];
    $q = $this->db->query("SELECT tasa FROM promociones WHERE (cod=$cod)");
    $tasa = $this->db->recorrer($q)[0];
    return $this->Precio($id) * ($tasa / 100);
  }
  public function TotalProductos(){
    $q = $this->db->query("SELECT COUNT(nombre) FROM productos");
    return $this->db->recorrer($q)[0];
  }
// FIN CLASS;
}
 ?>
