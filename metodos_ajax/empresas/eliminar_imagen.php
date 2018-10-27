<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Funciones = new Funciones();

$id_imagen = $_REQUEST['id_imagen'];

$Empresa = new Empresa();
$Empresa->setIdImagen($id_imagen);


if($Empresa->eliminarImgEmpresa()){
   echo "1";
}else{
   echo "2";
}

 ?>
