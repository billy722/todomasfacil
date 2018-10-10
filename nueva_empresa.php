<?php
@session_start();
require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Empresa.php';
require_once './comun.php';
// comprobarSession();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Empresa</title>
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
      <div class="card">
  <div class="card-header">
    Ingresar Mantenedor Empresa     
  </div>
   <div class="card bg-light mb-3">
                     <!-- <form> -->
              <form action="javascript:guardar_nueva_empresa()" id="mantenedor_ingresar_empresa" name="mantenedor_Ingresar_Empresa" method="POST">
                  <fieldset>
                      <div class="row">
                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreEmpresa">Nombre Empresa:</label>
                                  <input class="form-control" title="Debe ingresar empresa" required id="txt_nombre_empresa" name="txt_nombre_empresa" placeholder="Nombre empresa" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="descripcion">Descripcion Empresa:</label>
                                  <input class="form-control" title="Ingresar descripcion" required id="txt_descripcion_empresa" name="txt_descripcion_empresa" placeholder="Ingresar descripcion" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.5s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="categoria">Categoria</label>
                                       <select class="form-control" required name="categoria_empresa" id="categoria_empresa">
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
                                  <label for="estado">Estado empresa</label>
                                       <select class="form-control" required name="estado_empresa" id="estado_empresa">
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
                                  <label for="video">Video:</label>
                                  <input class="form-control" title="iframe video" required id="txt_video_empresa" name="txt_video_empresa" placeholder="iframe video" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="coordenadas">Coordenadas:</label>
                                  <input class="form-control" title="Debe ingresar cooredenadas" required id="txt_coordenadas_empresa" name="txt_coordenadas_empresa" placeholder="Nombre región" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="facebook">Facebook:</label>
                                  <input value="<?php echo $filas['facebook']; ?>" class="form-control" title="facebook" required id="txt_facebook" name="txt_facebook" placeholder="facebook" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="instagram">Instagram:</label>
                                  <input value="<?php echo $filas['instagram']; ?>" class="form-control" title="instagram" required id="txt_instagram" name="txt_instagram" placeholder="instagram" type="text">
                              </div>
                          </div>

                      </div>
                      <div class="container center">
                              <div class="col-md-8">
                                  <input type="submit" id="btn_insert" class="btn btn-success" value="Agregar" name="btn_registrar">
                              </div>
                      </div>
                  </fieldset>
              </form>
              </div>
              </div>
              </div>

  </body>
</html>
