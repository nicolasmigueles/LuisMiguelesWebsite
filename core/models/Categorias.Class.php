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
  public function AddCategoria($nombre){
    $q = $this->db->query("INSERT INTO categorias SET nombre = $nombre LIMIT 1;");
    return ($q ? true : false);
  }
  public function DelCategoria($nombre){
    $q = $this->db->query("DELETE FROM categorias WHERE nombre = $nombre LIMIT 1;");
    return ($q ? true : false);
  }
  public function ToggleVisibleCategoria($nombre){
    $qu = $this->db->query("SELECT visible FROM categorias WHERE nombre = $nombre");
    $new = $this->db->recorrer($qu)[0] == 1 ? 0 : 1;
    $q = $this->db->query("UPDATE categorias SET visible = $new WHERE nombre = $nombre LIMIT 1;");
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
    $q = $this->db->query("SELECT nombre FROM categorias");
    return $this->recorrer($q);
  }
}
?>
