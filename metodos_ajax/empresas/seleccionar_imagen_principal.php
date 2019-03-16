<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Funciones = new Funciones();

$id_empresa = $_REQUEST['id_empresa'];
$id_imagen = $_REQUEST['id_imagen'];

$Empresa = new Empresa();
$Empresa->setId($id_empresa);
$Empresa->setIdImagen($id_imagen);


if($Empresa->cambiarImagenPrincipal()){
   echo "1";
}else{
   echo "2";
}

 ?>
