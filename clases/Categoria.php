<?php

require_once 'Conexion.php';

Class Categoria{

  private $id_categoria;
  private $descripcion_empresa;

  public function obtenerCategorias(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("select * from categoria_empresas");
     return $resultado_consulta;

  }

}



 ?>
