<?php
require_once 'Conexion.php';

class Descuento{

 private $id_descuento;
 private $ruta_imagen;

     public function setIdDescuento($id_descuento){
       $this->id_descuento = $id_descuento;
     }
     public function setRutaImagen($ruta_imagen){
       $this->ruta_imagen = $ruta_imagen;
     }


    public function listarImagenesDescuentos(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("select * from tb_descuentos ");

      if($respuesta){
         return $respuesta;
      }else{
        return false;
      }
    }

    public function eliminarImgDescuento(){
      $Conexion = new Conexion();
      $con = $Conexion->conectar();

      $respuesta = $con->query("delete from tb_descuentos where id_descuento=".$this->id_descuento);

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
