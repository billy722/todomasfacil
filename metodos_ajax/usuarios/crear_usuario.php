<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Usuario.php';

$Funciones = new Funciones();

$rut = $Funciones->limpiarNumeroEntero($_REQUEST['txt_rut_usuario']);
$dv = $_REQUEST['txt_dv_usuario'];
$nombre = $Funciones->limpiarTexto($_REQUEST['txt_nombre_usuario']);
$correo = $Funciones->limpiarTexto($_REQUEST['txt_correo_usuario']);
$correo2 = $Funciones->limpiarTexto($_REQUEST['txt_correo2_usuario']);

$estado = $Funciones->limpiarTexto($_REQUEST['select_estado_usuario']);
$privilegio = $Funciones->limpiarTexto($_REQUEST['select_privilegio_usuario']);
$departamento = $Funciones->limpiarTexto($_REQUEST['txt_departamento_usuario']);

$clave = $Funciones->limpiarTexto($_REQUEST['txt_contrasenia_usuario']);

$Usuario = new Usuario();
$Usuario->setRun($rut);
$Usuario->setDv($dv);
$Usuario->setNombre($nombre);
$Usuario->setCorreo($correo);
$Usuario->setCorreo2($correo2);
$Usuario->setEstado($estado);
$Usuario->setPrivilegio($privilegio);
$Usuario->setDepartamento($departamento);
$Usuario->setClave($clave);

if($Usuario->crearUsuario()){
   echo "1";
}else{
   echo "2";
}

 ?>
