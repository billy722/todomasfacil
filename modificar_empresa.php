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

<?php

 // echo "hola el id es: ".$_REQUEST['id_empresa'];

 $id_empresa = $_REQUEST['id_empresa'];

 $empresa_creada = new Empresa();
 $empresa_creada->setId($id_empresa);
 $respuesta = $empresa_creada->obtenerEmpresas();

  $filas = $respuesta->fetch_array();

 ?>

<div class="container-fluid">
      <div class="col-md-12-centered">
                <div class="panel-heading">
                        <h3 class="panel-title">Mantenedor Empresa</h3>
                </div>
                     <!-- <form> -->
              <form action="javascript:modificar_empresa()" id="mantenedor_modificar_empresa" name="mantenedor_modificar_empresa" method="POST">

                        <input type="hidden" name="id_empresa" value="<?php echo $filas['id_empresa'];?>">

                      <div class="row">
                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="nombreEmpresa">Nombre Empresa:</label>
                                  <input value="<?php echo $filas['nombre_empresa']; ?>" class="form-control" title="Debe ingresar empresa" required id="txt_nombre_empresa" name="txt_nombre_empresa" placeholder="Nombre empresa" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="descripcion">Descripcion Empresa:</label>
                                  <textarea name="txt_descripcion_empresa" class="form-control" rows="8" cols="80"><?php echo $filas['descripcion_empresa']; ?></textarea>
                              </div>
                          </div>

                          <div style="animation-delay: 0.5s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="categoria">Categoria</label>
                                       <select  class="form-control" required name="categoria_empresa" id="categoria_empresa">
                                         <option value="" selected disabled>Seleccione categoria:</option>
                                          <?php
                                              require_once './clases/Categoria.php';
                                              $TipoC= new Categoria();
                                              $filasTipoC= $TipoC->obtenerCategorias();

                                              foreach($filasTipoC as $tipo){

                                                  if($tipo['id_categoria']==$filas['categoria_empresa']){
                                                    echo '<option selected="selected" value="'.$tipo['id_categoria'].'" >'.$tipo['descripcion_categoria'].'</option>';
                                                  }else{
                                                    echo '<option  value="'.$tipo['id_categoria'].'" >'.$tipo['descripcion_categoria'].'</option>';
                                                  }
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
                                              $filasTipoE= $TipoE->obtenerEstadoEmpresa();

                                              foreach($filasTipoE as $tipo){
                                                if($tipo['id_estado']==$filas['estado_empresa']){
                                                   echo '<option selected="selected" value="'.$tipo['id_estado'].'" >'.$tipo['descripcion_estado'].'</option>';
                                                 }
                                                 else{
                                                  echo '<option value="'.$tipo['id_estado'].'" >'.$tipo['descripcion_estado'].'</option>';
                                              }
                                            }
                                           ?>
                                      </select>
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="video">Video:</label>
                                  <input value="<?php echo $filas['video_empresa']; ?>" class="form-control" title="iframe video" required id="txt_video_empresa" name="txt_video_empresa" placeholder="iframe video" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                <?php //echo $filas['coordenadas']; ?>

                                  <label for="coordenadas">Cambiar Mapa:</label>
                                  <textarea class="form-control" id="txt_coordenadas_empresa" name="txt_coordenadas_empresa" rows="8" cols="80"><?php echo $filas['coordenadas']; ?></textarea>
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="video">Facebook:</label>
                                  <input value="<?php echo $filas['facebook']; ?>" class="form-control" title="facebook" required id="txt_facebook" name="txt_facebook" placeholder="facebook" type="text">
                              </div>
                          </div>

                          <div style="animation-delay: 0.2s;" class="col-md-3 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="video">Instagram:</label>
                                  <input value="<?php echo $filas['instagram']; ?>" class="form-control" title="instagram" required id="txt_instagram" name="txt_instagram" placeholder="instagram" type="text">
                              </div>
                          </div>

                      </div>
                      <div class="container">
                              <div class="col-md-8">
                                  <input type="submit" id="btn_insert" class="btn btn-success" value="Guardar" name="btn_registrar">
                              </div>
                      </div>

              </form>
              </div>
              </div>

  </body>
</html>
