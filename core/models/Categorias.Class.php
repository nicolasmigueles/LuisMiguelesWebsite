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
    // return array
  }
  public function Categoria($id){
    $q = $this->db->query("SELECT * FROM categorias WHERE (id=$id)");
    return $this->db->recorrer($q)[0]['nombre'];
  }
}
?>
