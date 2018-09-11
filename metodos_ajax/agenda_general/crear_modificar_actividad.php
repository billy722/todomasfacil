<?php

require_once '../../clases/Usuario.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Actividad.php';

$Funciones = new Funciones();
//campos recibidos de formulario
$id_actividad = $Funciones->limpiarNumeroEntero($_REQUEST['txt_id_actividad']);
$descripcion_actividad = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_actividad']);
$lugar_actividad = $Funciones->limpiarTexto($_REQUEST['txt_lugar_actividad']);
$inicio_actividad = $Funciones->limpiarTexto($_REQUEST['txt_inicio']);
$fin_actividad = $Funciones->limpiarTexto($_REQUEST['txt_fin']);

//campo usuario crea
$Usuario = new Usuario();
$datos_usuario = $Usuario->obtenerUsuarioActual();

$departamento = $datos_usuario['departamento'];
$usuario_crea = $datos_usuario['rut'];

//formatea fecha
$fecha_inicio = date_create($inicio_actividad);
$fecha_fin    = date_create($fin_actividad);

$inicio_actividad = date_format($fecha_inicio, 'Y-m-d H:i');
$fin_actividad = date_format($fecha_fin, 'Y-m-d H:i');
/////////////////////////////////////

$actividad =  new Actividad();
$actividad->setIdActividad($id_actividad);
$actividad->setDescripcion($descripcion_actividad);
$actividad->setLugar($lugar_actividad);
$actividad->setInicio($inicio_actividad);
$actividad->setFin($fin_actividad);
$actividad->setDepartamento($departamento);
$actividad->setEstado(1);
$actividad->setUsuarioCrea($usuario_crea);

if($id_actividad==""){
    if($actividad->guardarNuevaActividad()){
      echo "1";

        if($departamento<>1){//enviar correo de aviso cuando el departamento no es direccion.
          require_once './correo_nueva_actividad.php';
          enviarCorreoNuevaActividad($datos_usuario['nombre_departamento'],$descripcion_actividad,$lugar_actividad,$_REQUEST['txt_inicio']);
        }
    }else{
      echo "2";//ocurrio un problema
    }
}else{
    if($actividad->modificarActividad()){
      echo "1";
    }else{
      echo "2";//ocurrio un problema
    }
}

?>
