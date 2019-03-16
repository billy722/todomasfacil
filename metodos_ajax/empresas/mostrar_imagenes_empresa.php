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

                     <div class="row">
                      ';

                      if($filas['tipo_imagen']==1){
                        echo '<a href="javascript:seleccionarImagenPrincipalEmpresa('.$filas['id_imagen'].','.$id_empresa.')" class="btn btn-sm col-4 btn-success">Principal</a>';
                      }else{
                        echo '<a href="javascript:seleccionarImagenPrincipalEmpresa('.$filas['id_imagen'].','.$id_empresa.')" class="btn btn-sm col-4 btn-secondary">Principal</a>';
                      }

                      if($filas['tipo_imagen']==2){
                        echo '<a href="javascript:seleccionarAficheEmpresa('.$filas['id_imagen'].','.$id_empresa.')" class="btn btn-sm col-4 btn-info">Afiche</a>';
                      }else{
                        echo '<a href="javascript:seleccionarAficheEmpresa('.$filas['id_imagen'].','.$id_empresa.')" class="btn btn-sm col-4 btn-secondary">Afiche</a>';
                      }

                  echo '
                        <a href="javascript:eliminarImagenEmpresa('.$filas['id_imagen'].')" class="btn btn-sm col-4 btn-danger">X</a>

                  </div>
                    </div>
                </div>';
         }

       echo '</div>';

 ?>
