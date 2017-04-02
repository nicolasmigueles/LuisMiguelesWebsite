<?php
/**
 *
 */
class Taller
{
  protected $_db;
  public $cant_ins;

  public function __construct(){
    $this->_db = new Con;
  }
  public function inscribir(){
    $this->cantidad_inscriptos();
    return "inscripto n° ".$this->cant_ins;
  }
  public function cantidad_inscriptos(){ //devuelve en cant_ins la cant de inscriptos actuales.
    $CONSULTA = $this->_db->query("SELECT estate FROM options WHERE id=3");
    $this->cant_ins = $this->_db->recorrer($CONSULTA)[0];
    $this->_db->liberar($CONSULTA);
    return $this->cant_ins;
  }
}


 ?>
