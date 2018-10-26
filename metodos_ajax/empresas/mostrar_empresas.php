<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Empresa.php';

$Empresa = new Empresa();
$listado_empresas = $Empresa->obtenerEmpresasActivasInactivas();


    echo '
    <table class="table table-responsive table-sm table-striped table-bordered table-hover">
       <thead>
           <th>Nombre</th>
           <th>Descripcion</th>
           <th>Video</th>

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
                   <td class=""><span id="txt_descripcion_empresa_'.$contador.'" >'.substr($filas['descripcion_empresa'], 0, 50).'...</span></td>
                   <td class=""><span id="txt_horario'.$contador.'" >'.$filas['horario'].'</span></td>
                   <td class=""><span id="estado_empresa'.$contador.'" >';

                   if($filas['estado_empresa']==1) {
                    echo "Activo";
                  }else {
                    echo "Inactivo";
                  }

                   echo '</span></td>




                   <td class="">
                      <a href="./modificar_empresa.php?id_empresa='.$filas['id_empresa'].'" class="btn btn-block btn-warning" name="button">Editar</a>
                      <button  type="button" class="btn btn-block btn-danger" onclick="eliminarEmpresa('.$filas['id_empresa'].')" name="button">Eliminar</button>
                   </td>
                 </tr>';

            $contador++;

         }

       echo '</tbody>
    </table>';

 ?>
