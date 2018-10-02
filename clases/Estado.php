<?php
require_once 'Conexion.php';

class Estado{

 private $tabla;
 private $id_estado;
 private $descripcion_estado;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }

 public function obtenerEstados($condiciones){

    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta= "select * from ".$this->tabla." ".$condiciones;
    echo $consulta;

    $resultado= $conexion->query($consulta);
    if($resultado){
       return $resultado;
    }else{
      return false;
    }

 }
 public function obtenerEstadoEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from estado_empresas");
    return $resultado_consulta;

 }


}
 ?>
