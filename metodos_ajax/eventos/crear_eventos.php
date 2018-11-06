<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Eventos.php';

   $contadorFotos = $_REQUEST['contadorFotos'];

  // echo "contador es: ".$contadorFotos;
   for($c=1;$c<=$contadorFotos;$c++){
         $campo= "foto".$c;


         $tipoImagenFinal = "0";

                     $numeroRandom= rand(5,1000).date("d").date("m").date("Y");
                     $nombreImagenActual=$numeroRandom.basename( $_FILES[$campo]['name']);
                     $nombreImagenActual= str_replace("�","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("ñ","n",$nombreImagenActual);
                     $nombreImagenActual= str_replace("Ñ","N",$nombreImagenActual);

                         $target_path = "../../imagenes/eventos/";
                         $target_path = $target_path.$nombreImagenActual;


                                 //--------------cambia a jpg---------------
                                       $imagen=getimagesize($_FILES[$campo]['tmp_name']);//obtenemos el tipo
                                       $extencion=image_type_to_extension($imagen[2],false);//aqui obtenemos la extencion de la imagen
                                       $Eventos = new Eventos();
                                       $imagecreate=$Eventos->gen_fun_create($extencion);//generamos el nombre de la funcion a la que hay que llamar
                                       $nimagent=$imagecreate($_FILES[$campo]['tmp_name']);//creamos la imagen con la funcion creada
                                           $archivo=$target_path;
                                           if(imagejpeg($nimagent,$target_path)){

                                               $conexion = new Conexion();
                                               $conexion = $conexion->conectar();


                                               $consulta="insert into tb_eventos (ruta_imagen) values('".$nombreImagenActual."')";

                                               if($conexion->query($consulta)){
                                                 echo "1";
                                               }else{
                                                 echo "error al agregar foto ".$consulta;
                                               }
                                           }

         }



 ?>
