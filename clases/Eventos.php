<?php
require_once 'Conexion.php';

class Eventos{

 private $id_eventos;
 private $ruta_imagen;

     public function setIdEventos($id_eventos){
       $this->id_eventos = $id_eventos;
     }
     public function setRutaImagen($ruta_imagen){
       $this->ruta_imagen = $ruta_imagen;
     }


    public function listarImagenesEventos(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("select * from tb_eventos ");

      if($respuesta){
         return $respuesta;
      }else{
        return false;
      }
    }

    public function eliminarImgEventos(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("delete from tb_eventos where id_eventos=".$this->id_eventos);

      if($respuesta){
         return true;
      }else{
        return false;
      }
    }

    function gen_fun_create($ext){
      return "imagecreatefrom".$ext;
    }




}
 ?>
