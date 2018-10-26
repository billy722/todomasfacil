<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Funciones = new Funciones();

$id_empresa = $Funciones->limpiarNumeroEntero($_REQUEST['id_empresa']);

$Empresa = new Empresa();
$Empresa->setId($id_empresa);


if($Empresa->eliminarEmpresa()){
   echo "1";
}else{
   echo "2";
}

 ?>
