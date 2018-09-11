<?php

require_once '../../clases/Usuario.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Actividad.php';

$Usuario = new Usuario();
$Funciones = new Funciones();

$Usuario = $Usuario->obtenerUsuarioActual();

$departamento = $_REQUEST["departamento"];

$actividad =  new Actividad();
$listadoActividades;

if($departamento=="true"){
  $actividad->setDepartamento($departamento);
  $listadoActividades =  $actividad->listarActividadesDepartamento();
}else{
  $listadoActividades =  $actividad->listarActividades();
}

$eventos = array();

while($filas= $listadoActividades->fetch_array()){
  $e = array();

  $e['id'] =  $filas['id_actividad'];
  $e['start'] =  $filas['inicio'];
  $e['end'] =  $filas['fin'];
  $e['title'] = $filas['descripcion'];
  $e['lugar'] = $filas['lugar'];
  $e['id_departamento'] =  $filas['id_departamento'];
  $e['nombre_departamento'] =  $filas['nombre_departamento'];
  $e['departamento'] =  $filas['id_departamento'];
  $e['color'] =  $filas['color_simbologia'];
  $e['textColor'] =  $filas['color_texto'];
  $e['id_estado'] =  $filas['id_estado'];
  $e['descripcion_estado'] =  $filas['descripcion_estado'];
  $e['usuario_crea'] =  $filas['usuario_crea'];

  if($filas['id_departamento']==$Usuario['departamento']){
    $e['editable'] = true;
    $e['startEditable'] = true;
  }else{
    $e['editable'] = false;
    $e['startEditable'] = false;
  }
    array_push($eventos, $e);
}

echo json_encode($eventos);


?>
