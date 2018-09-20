<?php

require_once 'Conexion.php';

Class descripcion_empresa{

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

  public function setId($id_recibido){
    $this->id_empresa = $id_recibido;
  }

    public function obtenerEmpresas(){
       $Conexion = new Conexion();
       $Conexion = $Conexion->conectar();

       $resultado_consulta = $Conexion->query("SELECT e.id_empresa, nombre_empresa, descripcion_empresa, imagen
                                                * from tb_empresas e
                                                left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
                                                where e.id_empresa = ".$this->id_empresa);

       return $resultado_consulta;

      }
      // SELECT * from tb_empresas e
      //  left join tb_imagenes_empresa ie on e.id_empresa=ie.id_empresa
      //   where e.id_empresa = 3
      // public function listarRunUsuario(){
      //   $usuarios = $this->consultarRegistros("SELECT run, nombre, apellido, password, usuario.id_tipo_usuario, descripcion_tipo_usuario, usuario.id_estado_usuario, descripcion_estado_usuario
      //     FROM usuario
      //     inner join tipousuario on tipousuario.id_tipo_usuario = usuario.id_tipo_usuario
      //     inner join estadousuario on estadousuario.id_estado_usuario = usuario.id_estado_usuario;");
      //   return $usuarios;

      // }


}


 ?>
