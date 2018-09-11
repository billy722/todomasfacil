<?php
require_once 'Conexion.php';

class Departamento{

 private $id_departamento;
 private $nombre_departamento;
 private $color_simbologia;
 private $color_texto;

 public function obtenerDepartamentos(){

    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta= "select * from tb_departamento order by nombre_departamento asc";

    $resultado= $conexion->query($consulta);
    if($resultado){
       return $resultado;
    }else{
      return false;
    }

 }


}
 ?>
