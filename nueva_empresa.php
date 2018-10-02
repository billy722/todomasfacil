<?php
@session_start();
require_once 'comun.php';
require_once './clases/Empresa.php';
// comprobarSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Agenda DAEM</title>
   <?php cargarHead(); ?>

  <script src="./js/script_administrar_empresas.js"></script>
</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>

  <!-- <table class="table">
    <thead class="thead-dark"> -->


<div class="container-fluid">
      <div class="col-md-12-centered">
                <div class="panel-heading">
                        <h3 class="panel-title">Mantenedor Empresa</h3>
                </div>
                     <!-- <form> -->
              <form action="javascript:guardar_nueva_empresa()" id="formularioRegion" name="formularioRegion" method="POST">
                  <fieldset>
                      <div class="row">
                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreRegion">Nombre Empresa:</label>
                                  <input class="form-control" title="Debe ingresar empresa" required id="txt_nombre_empresa" name="txt_nombre_empresa" placeholder="Nombre empresa" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreRegion">Descripcion Empresa:</label>
                                  <input class="form-control" title="Debe ingresar nombre" required id="txt_descripcion" name="txt_descripcion" placeholder="Nombre región" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.5s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="tipoUsuario">Categoria</label>
                                       <select class="form-control" required name="tipousuario" id="tipousuario">
                                         <option value="" selected disabled>Seleccione categoria:</option>
                                          <?php
                                              require_once './clases/Categoria.php';
                                              $TipoC= new Categoria();
                                              $filasTipoC= $TipoC->obtenerCategorias();

                                              foreach($filasTipoC as $tipo){
                                                  echo '<option value="'.$tipo['id_categoria'].'" >'.$tipo['descripcion_categoria'].'</option>';
                                              }
                                           ?>
                                      </select>
                              </div>
                          </div>

                          <div style="animation-delay: 0.5s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="tipoUsuario">Estado empresa</label>
                                       <select class="form-control" required name="tipousuario" id="tipousuario">
                                         <option value="" selected disabled>Seleccione estado:</option>
                                          <?php
                                              require_once './clases/Estado.php';
                                              $TipoE= new Estado();
                                              $filasTipoC= $TipoE->obtenerEstadoEmpresa();

                                              foreach($filasTipoC as $tipo){
                                                  echo '<option value="'.$tipo['id_estado'].'" >'.$tipo['descripcion_estado'].'</option>';
                                              }
                                           ?>
                                      </select>
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreRegion">Video:</label>
                                  <input class="form-control" title="Debe ingresar nombre" required id="txt_video" name="txt_video" placeholder="Nombre región" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreRegion">Coordenadas:</label>
                                  <input class="form-control" title="Debe ingresar nombre" required id="txt_coordenadas" name="txt_coordenadas" placeholder="Nombre región" type="text">
                              </div>
                          </div>

                      </div>
                      <div class="container">
                              <div class="col-md-3">
                                  <input type="submit" id="btn_insert" class="btn btn-success" value="Agregar" name="btn_registrar">
                              </div>
                      </div>
                      <br>
                      <div class="row">
                            <div id="contenedorMantenedor"></div><!-- DIV DONDE SE CARGA LA TABLA-->
                      </div>

                  </fieldset>
              </form>
              </div>
              </div>

  </body>
</html>
