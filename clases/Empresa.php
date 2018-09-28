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


  public function setCategoria($id_recibido){
    $this->categoria_empresa = $id_recibido;
  }

  public function setId($id_recibidoE){
    $this->id_empresa = $id_recibidoE;
  }

  public function setDescripcion ($desc){
    $this->descripcion_empresa=$desc;
  }

  public function obtenerEmpresasActivas(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta = $Conexion->query("SELECT * FROM tb_empresas e
                                              left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                              where ie.tipo_imagen=1 AND estado_empresa=1");
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
