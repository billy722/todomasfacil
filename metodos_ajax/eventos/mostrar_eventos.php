<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Eventos.php';



$Eventos = new Eventos();
$listado_eventos = $Eventos->listarImagenesEventos();


    echo '
    <div class="row col-xs-12 ">';

          while($filas = $listado_eventos->fetch_array()){

               echo '

                <div class="card col-12 col-md-3" >
                    <img class="card-img-top" style="height:100px;" src="./imagenes/eventos/'.$filas['ruta_imagen'].'" alt="Card image cap">
                    <div class="card-body" style="padding:5px;">
                      <a href="javascript:eliminarImagenEmpresa('.$filas['id_eventos'].')" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div>';
         }

       echo '</div>';

 ?>
