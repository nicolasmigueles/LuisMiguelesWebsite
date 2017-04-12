<?php
/**
 *
 */
class Taller
{
  protected $db;
  protected $nombre;
  protected $apellido;
  protected $email;
  protected $telefono;
  protected $fecha;
  protected $estado;
  public $cant_ins;

  public function __construct(){
    $this->db = new Con;
  }
  private function ErrorsIns($url){
      try {
        $fecha_taller_activo_sql = $this->db->query("SELECT fecha_taller FROM taller WHERE activo = 1 ORDER BY id_taller DESC");
        $this->db->rows($fecha_taller_activo_sql) > 0 ? $fecha_var = true : $fecha_var = false;
        $fecha_taller_activo_pre = $this->db->recorrer($fecha_taller_activo_sql)[0];
         if ($fecha_var) {
          $fecha_taller_activo = $fecha_taller_activo_pre;
        }else{
          throw new Exception(3);
        }
        if (empty($_POST['name']) || empty($_POST['ape']) || empty($_POST['email']) || empty($_POST['tel']))  {
          throw new Exception(2);
        }else{
          $this->nombre = $this->db->real_escape_string($_POST['name']);
          $this->apellido = $this->db->real_escape_string($_POST['ape']);
          $this->email = $this->db->real_escape_string($_POST['email']);
          $this->telefono = $this->db->real_escape_string($_POST['tel']);
          $this->estado = 3;
          $this->fecha = $fecha_taller_activo;
        }
      } catch (Exception $error) {
        header('location:'. $url . $error->getMessage());
        exit;
      }
    }
  public function Inscribir() {
      $this->ErrorsIns('?view=error');
      $sql  = "INSERT INTO inscriptos (nombre,apellido,email,telefono,fecha,conf,estado,asistio) VALUES ('$this->nombre','$this->apellido','$this->email','$this->telefono','$this->fecha','0','$this->estado','0');";
      $sql .= "UPDATE options SET estate = $this->cantidad_inscriptos() + 1 where id = '3'";
      $this->db->multi_query($sql);
  }
  public function Editar() {
    $this->ErrorsIns('?view=error');
    $sql = "UPDATE inscriptos SET nombre = '$this->nombre', apellido = '$this->apellido', email = '$this->email',telefono = '$this->telefono',fecha = '$this->fecha',conf = '0', estado = '$this->estado',asistio = '0' where id = '$id'";
    $this->db->query($sql)or die(mysqli_error($this->db));
  }
  public function Delete($id) {
    $sql = "DELETE FROM inscriptos where id = '$id';";
    $sql .= "UPDATE options SET estate = $this->cantidad_inscriptos() - 1 where id = '3';";
    $this->db->multi_query($sql);
  }
  public function DarDeBaja($id) {
    $sql = $this->db->query("UPDATE inscriptos SET estado = '4' where id = '$id'");
  }
  public function Rehabilitar($id) {
    $sql = $this->db->query("UPDATE inscriptos SET estado = '3' where id = '$id'");
  }
  public function Efectivo($id) {
    $sql = $this->db->query("UPDATE inscriptos SET estado = '1' where id = '$id'");
    header('location: panel/inscriptos/'.$id.'-Done');
  }
  public function ToggleConfirm($id,$m) {
    if ($m == 'c') {
      $sql = $this->db->query("UPDATE inscriptos SET conf = '1' where id = '$id'");
      header('location: panel/inscriptos/'.$id.'-Done');
      exit();
    }elseif($m == 'p'){
      $sql = $this->db->query("UPDATE inscriptos SET conf = '3' where id = '$id'");
      header('location: panel/inscriptos/'.$id.'-Done');
      exit();
    }elseif ($m == 'nc') {
      $sql = $this->db->query("UPDATE inscriptos SET conf = '0' where id = '$id'");
      header('location: panel/inscriptos/'.$id.'-Done');
      exit();
    }

  }
  public function ToggleTransferencia($id) {
    $sqlpre = $this->db->query("SELECT estado FROM inscriptos WHERE id = '$id'");
    $this->db->recorrer($sqlpre)[0] == 1 ? $trans = true : $trans = false;
    $this->db->liberar($sqlpre);
    if ($trans) {
      $sql = $this->db->query("UPDATE inscriptos SET estado = '2' where id = '$id'");
      $this->db->liberar($sql);
      header('location: panel/inscriptos/'.$id.'-Done');
    }else{
      $sql = $this->db->query("UPDATE inscriptos SET estado = '1' where id = '$id'");
      $this->db->liberar($sql);
      header('location: panel/inscriptos/'.$id.'-Done');
    }
  }
  public function ToggleAsistio($id) {
    $sqlpre = $this->db->query("SELECT asistio FROM inscriptos WHERE id = '$id'");
    $this->db->recorrer($sqlpre)[0] == 1 ? $asis = true : $asis = false;
    $this->db->liberar($sqlpre);
    if ($asis) {
      $sql = $this->db->query("UPDATE inscriptos SET asistio = '0' where id = '$id'");
      $this->db->liberar($sql);
      header('location: panel/inscriptos/'.$id.'-Done');
    }else{
      $sql = $this->db->query("UPDATE inscriptos SET asistio = '1' where id = '$id'");
      $this->db->liberar($sql);
      header('location: panel/inscriptos/'.$id.'-Done');
    }
  }
  public function cantidad_inscriptos(){ //devuelve en cant_ins la cant de inscriptos actuales.
    $CONSULTA = $this->db->query("SELECT estate FROM options WHERE id=3");
    $this->cant_ins = $this->db->recorrer($CONSULTA)[0];
    $this->db->liberar($CONSULTA);
    return $this->cant_ins;
  }

}
?>
