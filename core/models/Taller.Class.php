<?php
/**
 *
 */
class Taller
{
  protected $_db;
  protected $cant_ins;
  
  public function __construct(){
  $this->_db = new Con;
  }
  public function inscribir(){
    $this->cantidad_inscriptos();
    return "inscripto n° ".$this->cant_ins;
  }
  public function cantidad_inscriptos(){
    $CONSULTA = $this->_db->query("SELECT estate FROM options WHERE id=3");
    $this->cant_ins = $this->_db->recorrer($CONSULTA)[0];
    return $this->cant_ins;
  }
}


 ?>
