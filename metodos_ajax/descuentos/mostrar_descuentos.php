<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Descuento.php';



$Descuento = new Descuento();
$listado_descuentos = $Descuento->listarImagenesDescuentos();


    echo '
    <div class="row col-xs-12 ">';

          while($filas = $listado_descuentos->fetch_array()){

               echo '

                <div class="card col-12 col-md-3" >
                    <img class="card-img-top" style="height:100px;" src="./imagenes/descuentos/'.$filas['ruta_imagen'].'" alt="Card image cap">
                    <div class="card-body" style="padding:5px;">
                      <a href="javascript:eliminarImagenEmpresa('.$filas['id_descuento'].')" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div>';
         }

       echo '</div>';

 ?>
