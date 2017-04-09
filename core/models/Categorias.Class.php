<?php
/**
 *
 */
class Categorias
{
  protected $db;

  public function __construct(){
    $this->db = new Con;
  }
  public function AddCategoria(){

  }
  public function DelCategoria(){

  }
  public function Categorias(){
    $q = $this->db->query("SELECT * FROM categorias;")or die(mysqli_error($this->db));
    $res = $this->db->recorrer($q)['nombre'];// ver porque devuelve una sola row cuando deveria devolver
    $this->db->liberar($q);
    return $res;
  }
  public function Categoria($id){
    $q = $this->db->query("SELECT nombre FROM categorias WHERE (id=$id)");
    return $this->db->recorrer($q)[0];
  }
  public function CategoriadelProd($idprod){
    $q = $this->db->query("SELECT categoria FROM productos WHERE (id=$idprod)") or die(mysqli_error($this->db));
    $id = $this->db->recorrer($q)[0];
    $q2 = $this->db->query("SELECT nombre FROM categorias WHERE (id=$id)")or die(mysqli_error($this->db));
    return $this->db->recorrer($q2)[0];
  }
}
?>
