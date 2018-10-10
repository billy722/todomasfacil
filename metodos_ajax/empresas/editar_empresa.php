<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Funciones = new Funciones();


//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
$id_empresa = $Funciones->limpiarNumeroEntero($_REQUEST['id_empresa']);
$nombre_empresa = $Funciones->limpiarTexto($_REQUEST['txt_nombre_empresa']);
$descripcion_empresa = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_empresa']);
$categoria_empresa = $Funciones->limpiarNumeroEntero($_REQUEST['categoria_empresa']);
$estado_empresa = $Funciones->limpiarNumeroEntero($_REQUEST['estado_empresa']);
$video_empresa = $Funciones->limpiarTexto($_REQUEST['txt_video_empresa']);
$coordenadas_empresa = $_REQUEST['txt_coordenadas_empresa'];
// $estado = $Funciones->limpiarNumeroEntero($_REQUEST['select_estado_usuario']);


//Creamos objeto de la clase empresa y seteamos sus valores
$Empresa = new Empresa();
$Empresa->setId($id_empresa);
$Empresa->setNombre($nombre_empresa);
$Empresa->setDescripcion($descripcion_empresa);
$Empresa->setCategoriaEmpresa($categoria_empresa);
$Empresa->setEstado($estado_empresa);
$Empresa->setVideo($video_empresa);
$Empresa->setCoordenadas($coordenadas_empresa);

if($Empresa->modificarEmpresa()){
   echo "1";
}else{
   echo "2";
}


 ?>
