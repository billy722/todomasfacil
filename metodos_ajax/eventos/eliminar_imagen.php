<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Eventos.php';

$Funciones = new Funciones();

$id_eventos = $_REQUEST['id_eventos'];

$Eventos = new Eventos();
$Eventos->setIdEventos($id_eventos);


if($Eventos->eliminarImgEventos()){
   echo "1";
}else{
   echo "2";
}

 ?>
