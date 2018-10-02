<?php
require_once '../../clases/Conexion.php';
// require_once '../../clases/Funciones.php';
require_once '../../clases/Empresa.php';

$Empresa = new Empresa();
$listado_empresas = $Empresa->obtenerEmpresasActivasInactivas();


    echo '
    <table class="table table-responsive table-sm table-striped table-bordered table-hover">
       <thead>
           <!-- <th>Run</th> -->
           <th>Nombre</th>
           <th>Estado</th>
           <th>Categoria</th>
           <th>Opciones</th>
       </thead>
       <tbody>';

          $contador = 1;
          while($filas = $listado_empresas->fetch_array()){

           $clase="";
           if($filas['estado_empresa']==2){
             $clase="table-warning";
           }

           echo '<tr class="'.$clase.'">


                   <td class=""><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_empresa'].'</span></td>
                   <td class=""><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_empresa'].'</span></td>
                   <td class=""><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_empresa'].'</span></td>




                   <td class="">
                      <button  data-toggle="modal" data-target="#modal_usuario" type="button" class="btn btn-block btn-warning" name="button">Editar</button>
                      <button  type="button" class="btn btn-block btn-danger" name="button">Eliminar</button>
                   </td>
                 </tr>';

            $contador++;

         }

       echo '</tbody>
    </table>';

 ?>
