<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Empresa.php';


$id_empresa = $_REQUEST['id_empresa'];

$Empresa = new Empresa();
$Empresa->setId($id_empresa);
$listado_empresas = $Empresa->mostrarImagenesUnaEmpresaParaModificar();


    echo '
    <div class="row col-xs-12 ">';

          while($filas = $listado_empresas->fetch_array()){

               echo '

                <div class="card col-12 col-md-3" >
                    <img class="card-img-top" style="height:100px;" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
                    <div class="card-body" style="padding:5px;">
                      <a href="javascript:eliminarImagenEmpresa('.$filas['id_imagen'].')" class="btn btn-sm btn-danger">Eliminar</a>
                    </div>
                </div>';
         }

       echo '</div>';

 ?>
