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
$video_empresa = $_REQUEST['txt_video_empresa'];
$coordenadas_empresa = $_REQUEST['txt_coordenadas_empresa'];
$facebook = $Funciones->limpiarTexto($_REQUEST['txt_facebook']);
$instagram = $Funciones->limpiarTexto($_REQUEST['txt_instagram']);
$horario = $Funciones->limpiarTexto($_REQUEST['txt_horario']);
$telefono = $_REQUEST['txt_telefono'];
$correo = $Funciones->limpiarTexto($_REQUEST['txt_correo']);
// echo "face: " .$facebook;
// echo "insta: " .$instagram;
// echo "horario: " .$horario;
// echo "telefono: " .$telefono;
// echo "correo: " .$correo;

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
$Empresa->setFacebook($facebook);
$Empresa->setInstagram($instagram);
$Empresa->setHorario($horario);
$Empresa->setTelefono($telefono);
$Empresa->setCorreo($correo);



if($Empresa->modificarEmpresa()){
   echo "1";


   $contadorFotos = $Funciones->limpiarNumeroEntero($_REQUEST['contadorFotos']);

   for($c=1;$c<=$contadorFotos;$c++){
         $campo= "foto".$c;
         $principal= "principal".$c;
         $afiche= "afiche".$c;

         $tipoImagenFinal = "0";

         if(isset($_REQUEST[$principal])){
           $tipoImagenFinal = "1";
         }
         if(isset($_REQUEST[$afiche])){
           $tipoImagenFinal = "2";
         }

                     $numeroRandom= rand(5,1000).date("d").date("m").date("Y");
                     $nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
                     $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

                         $target_path = "../../imagenes/empresas/";
                         $target_path = $target_path.$nombreImagenActual;


                         $target_path= str_replace("�","n",$target_path);
                         $target_path= str_replace("ñ","n",$target_path);
                         $target_path= str_replace("Ñ","N",$target_path);

                                 //--------------cambia a jpg---------------
                                       $imagen=getimagesize($_FILES[$campo]['tmp_name']);//obtenemos el tipo
                                       $extencion=image_type_to_extension($imagen[2],false);//aqui obtenemos la extencion de la imagen
                                       $imagecreate=$Empresa->gen_fun_create($extencion);//generamos el nombre de la funcion a la que hay que llamar
                                       $nimagent=$imagecreate($_FILES[$campo]['tmp_name']);//creamos la imagen con la funcion creada
                                           $archivo=$target_path;
                                           if(imagejpeg($nimagent,$target_path)){

                                               $conexion = new Conexion();
                                               $conexion = $conexion->conectar();

                                               if($tipoImagenFinal=="1"){
                                                 $consulta = "update tb_imagenes_empresa set tipo_imagen=0 WHERE (id_empresa = ".$id_empresa." and tipo_imagen=1)";
                                                 if($conexion->query($consulta)){
                                                     $consulta="insert into tb_imagenes_empresa(ruta_foto,id_empresa,tipo_imagen) values('".$nombreImagenActual."',".$id_empresa.",".$tipoImagenFinal.")";

                                                     if($conexion->query($consulta)){
                                                       // echo "agrega foto";
                                                     }else{
                                                       echo "error al agregar foto";
                                                     }
                                                 }else{
                                                 echo "errr en las consultas primeras";}
                                               }else if($tipoImagenFinal=="2"){
                                                 $consulta = "update tb_imagenes_empresa set tipo_imagen=0 WHERE (id_empresa = ".$id_empresa." and tipo_imagen=2)";
                                                 if($conexion->query($consulta)){
                                                     $consulta="insert into tb_imagenes_empresa(ruta_foto,id_empresa,tipo_imagen) values('".$nombreImagenActual."',".$id_empresa.",".$tipoImagenFinal.")";

                                                     if($conexion->query($consulta)){
                                                       // echo "agrega foto";
                                                     }else{
                                                       echo "error al agregar foto";
                                                     }
                                                 }else{
                                                 echo "errr en las consultas primeras";}
                                               }else if($tipoImagenFinal=="0"){
                                                     $consulta="insert into tb_imagenes_empresa(ruta_foto,id_empresa,tipo_imagen) values('".$nombreImagenActual."',".$id_empresa.",".$tipoImagenFinal.")";

                                                     if($conexion->query($consulta)){
                                                       // echo "agrega foto";
                                                     }else{
                                                       echo "error al agregar foto";
                                                     }
                                               }



                                           }

         }


}else{
   echo "2";
}

//
// $numeroRandom= rand(5,1000).date("d").date("m").date("Y");
// $nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
// // $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
// // $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
// // $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);
//
//     $target_path = "./imagenes/empresas/";
//     $target_path = $target_path.$nombreImagenActual;
//     $file = $_FILES[$campo];
//
//           if(move_uploaded_file($file['tmp_name'],"../../imagenes/empresas/".$file['name'])){
//                // echo " Ha sido subido satisfactoriamente";
//                echo "se subio la imagen";
//           }else{
//             echo "no se subio";
//           }
//
//
//           $conexion = new Conexion();
//           $conexion = $conexion->conectar();
//
//          $consultaFotos="insert into tb_imagenes_empresa(ruta_foto,id_empresa,tipo_imagen) values('".$nombreImagenActual."',".$id_empresa.",".$tipoImagenFinal.")";
//
//          if($conexion->query($consultaFotos)){
//            echo "agrega foto";
//          }else{
//            echo "error al agregar foto";
//          }

 ?>
