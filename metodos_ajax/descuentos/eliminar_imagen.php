<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Descuento.php';

$Funciones = new Funciones();

$id_descuento = $_REQUEST['id_descuento'];

$Descuento = new Descuento();
$Descuento->setIdDescuento($id_descuento);


if($Descuento->eliminarImgDescuento()){
   echo "1";
}else{
   echo "2";
}

 ?>
