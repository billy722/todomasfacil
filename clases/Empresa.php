<?php

require_once 'Conexion.php';

Class Empresa{

  private $id_empresa;
  private $nombre_empresa;
  private $descripcion_empresa;
  private $categoria_empresa;
  private $estado;
  private $imagen;
  private $video;



  public function obtenerEmpresasActivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("select * from tb_empresas where estado_empresa=1");
     return $resultado_consulta;

  }

}


 ?>
