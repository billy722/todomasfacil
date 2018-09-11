<?php

require_once '../../clases/Usuario.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Actividad.php';

$Funciones = new Funciones();
$Usuario =  new Usuario();
$Usuario =  $Usuario->obtenerUsuarioActual();

//campos recibidos de formulario
$id_actividad = $Funciones->limpiarNumeroEntero($_REQUEST['id']);
$fecha_inicio = $Funciones->limpiarTexto($_REQUEST['inicio']);
$fecha_fin = $Funciones->limpiarTexto($_REQUEST['fin']);
$usuario_crea = $Usuario['rut'];

$actividad =  new Actividad();
$actividad->setIdActividad($id_actividad);
$actividad->setInicio($fecha_inicio);
$actividad->setFin($fecha_fin);
$actividad->setUsuarioCrea($usuario_crea);

    if($actividad->cambiarFechasActividad()){
      echo "1";
    }else{
      echo "2";//ocurrio un problema
    }

?>
