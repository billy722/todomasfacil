<?php

require_once '../../clases/Usuario.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Actividad.php';

$Funciones = new Funciones();
//campos recibidos de formulario
$id_actividad = $Funciones->limpiarNumeroEntero($_REQUEST['id']);


$actividad =  new Actividad();
$actividad->setIdActividad($id_actividad);

    if($actividad->eliminarActividad()){
      echo "1";
    }else{
      echo "2";//ocurrio un problema
    }

?>
