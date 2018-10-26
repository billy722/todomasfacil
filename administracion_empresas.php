<?php
require_once 'comun.php';
require_once './clases/Empresa.php';

require_once './clases/Usuario.php';
$comprobar = new Usuario();
$comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Administracion de empresas</title>
   <?php cargarHead(); ?>

  <script src="./js/script_administrar_empresas.js"></script>
</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>



<div class="container-fluid">
  <div class="row">

      <div class="col-12 col-md-3">

          <div class="card text-dark">
            <div class="card-header ">
                OPCIONES
            </div>
            <div class="card-body">
                 <?php cargarMenuConfiguraciones(); ?>
            </div>
          </div>

      </div>
       <div class="col-12 col-md-9">

          <div  style="" class=" card col-12">
            <div class="container">
              <br>
                 <a href="./nueva_empresa.php" class="btn btn-success" >Crear nueva empresa</a>
            </div>
            <div class="container">
              <br>

              <div id='contenedor_listado_empresas'></div>

            </div>

          </div>

       </div>

  </div>

</div>




  <!-- MODAL EMPRESA-->
  <!-- <div class="modal fade" id="modal_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="formulario_modal_usuario" class="" action="javascript:guardarUsuario()" method="post">


           <div class="form-group card border-info" >

                <div class="row container">
                    <div class="col-8">
                              <label for="title" class=" control-label">Rut</label>
                              <input required onkeypress="return soloNumeros(event);" maxlength="8" type="text" class=" form-control" name="txt_rut_usuario" id="txt_rut_usuario" value="">
                    </div>
                    <div class="col-4">
                              <label for="title" class="  control-label">DV</label>
                              <input required onkeypress="return soloNumerosyK(event);" maxlength="1" type="text" class=" form-control" name="txt_dv_usuario" id="txt_dv_usuario" value="">
                    </div>
                </div>

                <div class="form-group col-12" >

                       <label for="title" class="col-12 control-label">Nombre</label>
                       <input type="text" onkeypress="return soloLetras(event);" required class="form-control" name="txt_nombre_usuario" id="txt_nombre_usuario" value="">

                </div>

                <div class="form-group col-12" >

                        <label for="title" class="col-12 control-label">Correo</label>
                        <input type="text" required class="form-control" name="txt_correo_usuario" id="txt_correo_usuario" value="">

                </div>

                <div class="form-group col-12" >

                        <label for="title" class="col-12 control-label">Correo opcion 2</label>
                        <input type="text"  class="form-control" name="txt_correo2_usuario" id="txt_correo2_usuario" value="">

                </div>
          </div>

          <div class="form-group card border-info" >

                <div class="form-group col-12" >

                    <label for="title" class="col-12 control-label">Estado</label>
                    <select required class="form-control" name="select_estado_usuario" id="select_estado_usuario">
                      <?php
                          // $Estado = new Estado();
                          // $Estado->setTabla("tb_estado_usuario");
                          // $listaEstados = $Estado->obtenerEstados("where id_estado<>3");
                          //
                          // while($filas = $listaEstados->fetch_array()){
                          //    echo '<option value="'.$filas['id_estado'].'">'.$filas['descripcion_estado'].'</option>';
                          // }

                       ?>
                    </select>

                </div>

                <div class="form-group col-12" >

                    <label for="title" class="col-12 control-label">Privilegios de usuario</label>
                    <select required class="form-control" name="select_privilegio_usuario" id="select_privilegio_usuario">
                      <?php
                          // $Privilegio = new Privilegio();
                          // $listaPrivilegios = $Privilegio->obtenerPrivilegios();
                          //
                          // while($filas = $listaPrivilegios->fetch_array()){
                          //    echo '<option value="'.$filas['id_tipo_usuario'].'">'.$filas['descripcion_tipo_usuario'].'</option>';
                          // }

                       ?>
                    </select>

                </div>

                <div class="form-group col-12" >

                    <label for="title" class="col-12 control-label">Area o departamento</label>
                    <select required class="form-control" name="txt_departamento_usuario" id="txt_departamento_usuario">
                      <?php
                          // $departamento = new Departamento();
                          // $listaDepartamentos = $departamento->obtenerDepartamentos();
                          //
                          // while($filas = $listaDepartamentos->fetch_array()){
                          //    echo '<option value="'.$filas['id_departamento'].'">'.$filas['nombre_departamento'].'</option>';
                          // }

                       ?>
                    </select>

                </div>
            </div>

            <div id="formulario_claves" class="form-group card border-info" >


            </div>


                <div class="form-group" >
                  <div class="col-12">
                    <button class="btn btn-success btn-block" type="submit" name="button">Guardar</button>
                  </div>
                </div>


        </form>

      </div>


    </div>
    </div>
  </div> -->


</body>
</html>
