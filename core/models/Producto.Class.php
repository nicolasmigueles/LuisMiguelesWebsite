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
  public function NuevoProducto($n,$d,$p,$f,$s){
    $array = array('nombre' => $n,
              'descripcion' => $d,
              'precio' => $p,
              'foto' => $f,
              'stock' => $s
            );
    $this->datos = $array;
    $this->_init($array);
    if($this->InsertarBDD($array)){
      return "Guardado";
    }else{
      return "Algo fallo insertando a la bdd";
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
  public function CambiarPrecio($id){
    $this->BuscarProducto($id);
    return $this->precio;
  }
  protected function InsertarBDD($array){
    //$q = $this->_db->query('INSERT INTO productos (id, nombre, descripcion, img, precio, stock, visible) VALUES (NULL, '$array["nombre"]', '$array["descripcion"]', '$array["foto"]','$array["precio"]', '$array["stock"]', 1)')or die('Error: ' . mysqli_error($this->_db));
    //return $q;
  }
  public function Precio($id){
    $this->BuscarProducto($id);
    return $this->precio;
  }
  public function DescuentoenPlata($id){
    $a = $this->_db->query("SELECT cod FROM productos WHERE (id=$id)");
    $cod = $this->_db->recorrer($a)[0];
    $q = $this->_db->query("SELECT tasa FROM promociones WHERE (cod=$cod)");
    $tasa = $this->_db->recorrer($q)[0];
    return $this->Precio($id) * ($tasa / 100);
  }
// FIN CLASS;
}
 ?>
