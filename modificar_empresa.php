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
       <div class="card border-danger mb-3">
  <div class="card-header border-danger mb-3" style="background-color:rgb(255, 176, 0);
                                                     background: -moz-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,146,10,1)), color-stop(72%, rgba(255,175,75,1)), color-stop(100%, rgba(255,175,75,1)));
                                                     background: -webkit-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -o-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: -ms-linear-gradient(left, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     background: linear-gradient(to right, rgba(255,146,10,1) 0%, rgba(255,175,75,1) 72%, rgba(255,175,75,1) 100%);
                                                     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff920a', endColorstr='#ffaf4b', GradientType=1 );">
     <h5><B><FONT COLOR="white">  Editar Empresa</FONT></h5>
   </div>
 <div class="container">
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
                                  <textarea name="txt_descripcion_empresa" class="form-control" rows="5" cols="100"><?php echo $filas['descripcion_empresa']; ?></textarea>
                              </div>
                          </div>

                          <div style="animation-delay: 0.5s;" class="col-md-2 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="categoria">Categoria</label>
                                       <select style="width:130px" class="form-control" required name="categoria_empresa" id="categoria_empresa">
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

                          <div style="animation-delay: 0.2s;" class="col-md-2 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="estado">Estado empresa</label>
                                       <select style="width:130px" class="form-control" required name="estado_empresa" id="estado_empresa">
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

                          <div style="animation-delay: 0.2s;" class="col-md-2 animated-panel zoomIn">
                              <div class="form-group">
                                  <label for="video">Imagen:</label>
                                  <input value="<?php echo $filas['video_empresa']; ?>" class="form-control" title="iframe video" required id="txt_video_empresa" name="txt_video_empresa" placeholder="iframe video" type="text">
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
                                  <textarea class="form-control" id="txt_coordenadas_empresa" name="txt_coordenadas_empresa" rows="5" cols="100"><?php echo $filas['coordenadas']; ?></textarea>
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

                                <div class="col-md-12 container"  align="right">

                                    <input type="submit" id="btn_insert" class="btn" value="Agregar" name="btn_registrar" align="left">
                                    <br>
                                    <br>
                                    <div class="container col-md-10" align="left">
                                      <a class="nav-link col-md-3 animated-panel zoomIn" align="center" href="./administracion_empresas.php">&nbsp;&nbsp;ATRAS<span class="sr-only">(current)</span></a>
                                    </div>
                                    <br>
                                    <br>
                                </div>

                    </fieldset>
                </form>
                        </div>
                    </div>
              </div>

  </body>
</html>
