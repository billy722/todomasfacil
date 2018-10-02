<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Usuario.php';

$Funciones = new Funciones();


//SE DEFINEN VARIABLES
//SE ASIGNAN LOS VALORES RECIBIDOS
//SE LIMPIAN LOS DATOS RECIBIDOS DE CARACTERES EXTRAÑOS
$nombre = $Funciones->limpiarTexto($_REQUEST['txt_nombre_empresa']);
$estado = $Funciones->limpiarNumeroEntero($_REQUEST['select_estado_usuario']);


//Creamos objeto de la clase empresa y seteamos sus valores
$Empresa = new Empresa();
$Empresa->setNombre($nombre);


if($Empreso->crearEmpresa()){
   echo "1";
}else{
   echo "2";
}

 ?>
