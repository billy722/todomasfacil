<?php
require_once '../clases/Region.php';
switch($_REQUEST['mantenedor']){
   
     case '12'://MANTENEDOR DE CDA
            require_once '../clases/CDA.php';
            require_once '../clases/Direccion.php';
            $CDA= new CDA();
            $Direccion= new Direccion();


            switch($_REQUEST['cdaM']){
                case '1'://mantenedor INGRESAR CDA
                      $Direccion->setCalle($_REQUEST['txt_calleCrear']);
                      $Direccion->setCiudad($_REQUEST['cmb_ciudadCrear']);
                      $Direccion->setNumero($_REQUEST['txt_numeroCrear']);

                      $numeroDireccion= $Direccion->insertarDireccion();

                      $CDA->setDescripcion($_REQUEST['txt_descripcionCrear']);
                      $CDA->setIdEstado("1");
                      $CDA->setDireccion($numeroDireccion);

                      $CDA->insertarCDA();
                      

                     // $CDA->


                break;

                case '2'://Mantenedor MODIFICAR CDA
                      $Direccion->setIdDireccion($_REQUEST['txt_idDireccion']);
                      $Direccion->setCalle($_REQUEST['txt_calle']);
                      $Direccion->setCiudad($_REQUEST['cmb_ciudad']);
                      $Direccion->setNumero($_REQUEST['txt_numero']);

                      $verificaExitoDireccion= $Direccion->modificarDireccion();

                      $CDA->setIdCda($_REQUEST['txt_idCda']);
                      $CDA->setDescripcion($_REQUEST['txt_descripcion']);
                      $CDA->setIdEstado($_REQUEST['cmb_estado']);

                      $verificaExitoCda= $CDA->modificarCDA();
                       
                      if($verificaExitoDireccion==true and $verificaExitoCda==true){
                            echo "2";
                      }else{
                             echo "3";
                      }

                break;

                case '3': //Listar registro en la tabla con paginador - CDA
                ?>
                   <table class="table">
                            <caption ></caption>
                            <thead>     
                                <th>Descripcion</th>
                                <th>Direccion</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>

                                         <?php
                                          $retorno= $CDA->BuscarFiltarRegistros("vistaCda","descripcion",$_REQUEST['buscar'],$_REQUEST['pag'],$_REQUEST['cantidadReg']);
                                          $listado=$retorno[0][0];


                                           $contadorFilas=0;
                                           foreach($listado as $filas){
                                               $contadorFilas++;
                                                echo'<td><span id="txt_descripcion'.$contadorFilas.'">'.$filas['descripcion'].'</span></td>';
                                                echo'<td><span id="txt_detalleDireccion'.$contadorFilas.'">'.$filas['detalleDireccion'].'</span></td>';
                                                echo'<td><span id="txt_detalleEstado'.$contadorFilas.'">'.$filas['detalleEstado'].'</span></td>';
                                                  //CAMPOS OCULTOS CON IDS
                                                  echo '<span class="hidden" id="txt_idCda'.$contadorFilas.'">'.$filas['idcda'].'</span></td>';                                                
                                                  echo '<span class="hidden" id="txt_idDireccion'.$contadorFilas.'">'.$filas['idDireccion'].'</span></td>';

                                                  echo '<span class="hidden" id="txt_calle'.$contadorFilas.'">'.$filas['calle'].'</span></td>';
                                                  echo '<span class="hidden" id="txt_numero'.$contadorFilas.'">'.$filas['numero'].'</span></td>';
                                                  echo '<span class="hidden" id="txt_idEstado'.$contadorFilas.'">'.$filas['estado_idEstado'].'</span></td>';
                                                  echo '<span class="hidden" id="txt_idCiudad'.$contadorFilas.'">'.$filas['idCiudad'].'</span></td>';
                                                  echo '<span class="hidden" id="txt_idRegion'.$contadorFilas.'">'.$filas['idRegion'].'</span></td>';
                                                echo'<td>
                                                             <button type="button"  onclick="mostrarModalModificar('.$contadorFilas.')" data-toggle="modal" data-target="#ventanaModalModificar" class="btn btn-info">
                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                              </button>
                                                </td>
                                                <td>
                                                             <button class="btn btn-danger" onclick="eliminar(\''.$filas['idcda'].'\')">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                              </button>
                                                          </td>
                                                    </tr>';

                                             }

                                        ?>
                                            <tr>
                                              <td colspan="7">
                                                <center>
                                                <?php
                                                  echo $retorno[0][1];
                                                ?>

                                              </center>
                                              </td>
                                            </tr>
                           </tbody>
                        </table>
                                 <?php

                break;

                case '4'://eliminarr - CDA
                      $CDA->setIdCda($_REQUEST['id']);
                      $CDA->setIdEstado("4");
                      $verificarExito= $CDA->eliminarCDA();

                      if($verificarExito==true){
                            echo "2";
                      }

                break;
                default:
                  echo 'ocurrio un error';
                break;

            }
     break;

}

?>
