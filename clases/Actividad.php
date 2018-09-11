<?php
require_once 'Conexion.php';

class Actividad{

 private $id_actividad;
 private $inicio;
 private $fin;
 private $descripcion;
 private $lugar;
 private $departamento;
 private $estado;
 private $usuario_crea;


 public function setIdActividad($parametro){
   $this->id_actividad = $parametro;
 }
 public function setInicio($parametro){
   $this->inicio = $parametro;
 }
 public function setFin($parametro){
   $this->fin = $parametro;
 }
 public function setDescripcion($parametro){
   $this->descripcion = $parametro;
 }
 public function setLugar($parametro){
   $this->lugar = $parametro;
 }
 public function setDepartamento($parametro){
   $this->departamento = $parametro;
 }
 public function setEstado($parametro){
   $this->estado = $parametro;
 }
 public function setUsuarioCrea($parametro){
   $this->usuario_crea = $parametro;
 }



 public function listarActividades(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

      $consulta="select * from vista_actividad where id_estado=1";
      $resultado = $conexion->query($consulta);

    if($resultado->num_rows>0){
        return $resultado;
    }else{
        return false;
    }
 }

 public function listarActividadesDepartamento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

      $consulta="select * from vista_actividad where id_estado=1 and id_departamento=".$this->departamento;
      $resultado = $conexion->query($consulta);

    if($resultado->num_rows>0){
        return $resultado;
    }else{
        return false;
    }
 }

 public function guardarNuevaActividad(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

      $consulta="insert into tb_actividad(inicio,fin,descripcion,lugar,departamento,usuario_crea)
                 values('".$this->inicio."','".$this->fin."','".$this->descripcion."','".$this->lugar."',".$this->departamento.",".$this->usuario_crea.");";

    if($conexion->query($consulta)){
        return true;
    }else{
        return false;
    }
 }

 public function modificarActividad(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

     $consulta ="update tb_actividad set
                inicio='".$this->inicio."',
                fin = '".$this->fin."',
                descripcion = '".$this->descripcion."',
                lugar = '".$this->lugar."',
                estado = ".$this->estado.",
                usuario_crea = '".$this->usuario_crea."'
                where id_actividad = ".$this->id_actividad."
                ";

    if($conexion->query($consulta)){
        return true;
    }else{
        return false;
    }
 }

 public function cambiarFechasActividad(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta ="update tb_actividad set
               inicio='".$this->inicio."',
               fin = '".$this->fin."',
               usuario_crea = '".$this->usuario_crea."'
               where id_actividad = ".$this->id_actividad;

    if($conexion->query($consulta)){
        return true;
    }else{
        return false;
    }
 }

 public function eliminarActividad(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

      $consulta="delete from tb_actividad where id_actividad=".$this->id_actividad;

    if($conexion->query($consulta)){
        return true;
    }else{
        return false;
    }
 }


}

 ?>
