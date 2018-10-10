<?php

require_once 'Conexion.php';

Class Empresa{

  private $id_empresa;
  private $nombre_empresa;
  private $descripcion_empresa;
  private $categoria_empresa;
  private $estado_empresa;
  private $video_empresa;
  private $coordenadas_empresa;

  public function setCategoria($id_recibido){
    $this->categoria_empresa = $id_recibido;
  }
  public function setId($id_recibidoE){
    $this->id_empresa = $id_recibidoE;
  }

  public function setNombre ($nombre_empresa){
    $this->nombre_empresa=$nombre_empresa;
  }

  public function setDescripcion ($descripcion_empresa){
    $this->descripcion_empresa=$descripcion_empresa;
  }

  public function setCategoriaEmpresa ($categoria_empresa){
    $this->categoria_empresa=$categoria_empresa;
  }

  public function setEstado ($estado_empresa){
    $this->estado_empresa=$estado_empresa;
  }

  public function setVideo ($video_empresa){
    $this->video_empresa=$video_empresa;
  }

    public function setCoordenadas ($coordenadas_empresa){
      $this->coordenadas_empresa=$coordenadas_empresa;
    }

  public function crearEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "insert INTO tb_empresas (nombre_empresa, descripcion_empresa, categoria_empresa, video_empresa, coordenadas)
                        VALUES ('".$this->nombre_empresa."', '".$this->descripcion_empresa."', '".$this->categoria_empresa."', '".$this->video_empresa."', '".$this->coordenadas_empresa."');";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function modificarEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_empresas
         SET nombre_empresa = '".$this->nombre_empresa."',
          descripcion_empresa = '".$this->descripcion_empresa."',
          categoria_empresa = '".$this->categoria_empresa."',
          estado_empresa = '".$this->estado_empresa."',
          video_empresa = '".$this->video_empresa."',
          coordenadas = '".$this->coordenadas_empresa."'
           WHERE (id_empresa = '".$this->id_empresa."');";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }

  public function eliminarEmpresa(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "update tb_empresas set estado_empresa='3' WHERE (id_empresa = ".$this->id_empresa.") ";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }

  }

  public function obtenerEmpresasActivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                              left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                              where ie.tipo_imagen=1 AND estado_empresa=1");
     return $resultado_consulta;

  }

  public function obtenerEmpresasActivasInactivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                               where ( estado_empresa=1 or estado_empresa=2 )");
     return $resultado_consulta;

  }

  public function obtenerEmpresasPorCategorias(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * from tb_empresas e
                                              left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                              where ie.tipo_imagen=1 AND categoria_empresa = ".$this->categoria_empresa);
     return $resultado_consulta;

    }


    public function obtenerEmpresas(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $resultado_consulta = $Conexion->query("SELECT * from tb_empresas e
                                                left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                where ie.tipo_imagen=1 and e.id_empresa =".$this->id_empresa);

       return $resultado_consulta;

      }


        public function obtenerEmpresasAfiche(){
           $Conexion = new Conexion();
           $Conexion = $Conexion->conectar();

           $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                    left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                    where ie.tipo_imagen=2 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
           return $resultado_consulta;

        }

        public function obtenerImgEmpresas(){
          $Conexion = new Conexion();
          $Conexion = $Conexion->conectar();

          $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                   left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                   where ie.tipo_imagen=1 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
          return $resultado_consulta;

       }


       public function obtenerImgEmpresasTodas(){
         $Conexion = new Conexion();
         $Conexion = $Conexion->conectar();

         $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                                  left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                  where ie.tipo_imagen=0 AND estado_empresa=1 AND e.id_empresa=".$this->id_empresa);
         return $resultado_consulta;

      }
}


 ?>
