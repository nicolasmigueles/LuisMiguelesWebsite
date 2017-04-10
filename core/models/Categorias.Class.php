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
  // All working and tested 10/4 Nicolás Migueles
  public function AddCategoria($nombre){
    $q = $this->db->query("INSERT INTO categorias (nombre) VALUES ('$nombre')")or die(mysqli_error($this->db));
    return ($q ? true : false);
  }
  public function DelCategoria($id){
    $q = $this->db->query("DELETE FROM categorias WHERE id = $id;");
    return $q ? true : false;
  }
  public function ToggleVisibleCategoria($id){
    $qu = $this->db->query("SELECT visible FROM categorias WHERE id = $id") or die(mysqli_error($this->db));
    $new = $this->db->recorrer($qu)[0] == 1 ? 0 : 1;
    $q = $this->db->query("UPDATE categorias SET visible = $new WHERE id = $id LIMIT 1;");
    return ($q ? true : false);
  }
  public function Categoria($id){
    $q = $this->db->query("SELECT nombre FROM categorias WHERE (id=$id)");
    return $this->db->recorrer($q)[0];
  }
  public function CategoriadelProd($idprod){
    $q = $this->db->query("SELECT categoria FROM productos WHERE (id=$idprod)") or die(mysqli_error($this->db));
    $idcat = $this->db->recorrer($q)[0];
    $q2 = $this->db->query("SELECT nombre FROM categorias WHERE (id=$idcat)")or die(mysqli_error($this->db));
    return $this->db->recorrer($q2)[0];
  }
  public function ArrayCategorias(){
    $array = Array();
    $q = $this->db->query("SELECT * FROM categorias WHERE visible = 1");
    $a = 0;
    while ($a <= ($this->db->rows($q)-1)) {
      array_push($array,$this->db->recorrer($q)[1]);
      $a++;
    }
    return $array;

  }
  public function CantCategorias(){
    $q = $this->db->query("SELECT COUNT(*) FROM categorias;");
    return $this->db->recorrer($q)[0];
  }
}
?>
