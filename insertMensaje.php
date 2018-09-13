<?php

require_once "./clases/Mensajecontacto.php";
$message = new Mensaje();

// $fech=date('Y-m-d');
// $message->setfecha($fech);
$nomb = filter_var($_REQUEST['nombre_mensajes'], FILTER_SANITIZE_STRING);
$message->setnombre($nomb);
$ape = filter_var($_REQUEST['apellido_mensaje'], FILTER_SANITIZE_STRING);
$message->setapellido($ape);
$correo = filter_var($_REQUEST['correo'], FILTER_SANITIZE_STRING);
$message->setcorreo($correo);
$mes = filter_var($_REQUEST['mensaje'], FILTER_SANITIZE_STRING);
$message->setmensaje($mes);


if($message->insertarMensaje()){
    echo"1";
    echo "holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
}else{
    echo"2";
    echo "chaoooooooooooooooooooooooooooooooooo";
}


 ?>
