<?php

require_once './clases/Conexion.php';
require_once './clases/Funciones.php';
require_once './clases/Empresa.php';
require_once './comun.php';

require_once './clases/Usuario.php';
$comprobar = new Usuario();
$comprobar->verificarSesion();

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Empresa</title>
   <?php cargarHead(); ?>

</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>

  <!-- <table class="table">
    <thead class="thead-dark"> -->

<?php

 // echo "hola el id es: ".$_REQUEST['id_empresa'];

 $id_empresa = $_REQUEST['id_empresa'];
echo '<script> var id_empresa = '.$id_empresa.'; </script>';


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
              <form action="javascript:modificar_empresa()" id="mantenedor_modificar_empresa" name="mantenedor_modificar_empresa" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id_empresa" value="<?php echo $filas['id_empresa'];?>">

                      <div class="row">

                        <div class="col-12 col-md-4">

                              <div  class=" ">
                                  <div class="form-group">
                                      <label for="nombreEmpresa">Nombre Empresa:</label>
                                      <input value="<?php echo $filas['nombre_empresa']; ?>" class="form-control" title="Debe ingresar empresa" required id="txt_nombre_empresa" name="txt_nombre_empresa" placeholder="Nombre empresa" type="text">
                                  </div>
                              </div>

                              <div  class=" ">
                                  <div class="form-group">
                                      <label for="descripcion">Descripcion Empresa:</label>
                                      <textarea name="txt_descripcion_empresa" class="form-control" rows="5" cols="100"><?php echo $filas['descripcion_empresa']; ?></textarea>
                                  </div>
                              </div>

                              <div  class=" ">
                                  <div class="form-group">
                                    <?php //echo $filas['coordenadas']; ?>

                                      <label for="coordenadas">Cambiar Mapa:</label>
                                      <textarea class="form-control" id="txt_coordenadas_empresa" name="txt_coordenadas_empresa" rows="3" cols="100"><?php echo $filas['coordenadas']; ?></textarea>
                                  </div>
                              </div>


                                <div class="form-group">
                                    <label for="horario">Horario:</label>
                                    <textarea class="form-control" id="txt_horario" name="txt_horario" rows="3" cols="100"></textarea>
                                </div>

                        </div>


                        <div class="col-12 col-md-3">

                              <div  class=" ">
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

                              <div  class=" ">
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


                              <div class="form-group">
                                  <label for="video">Video:</label>
                                  <textarea class="form-control" title="iframe video" required id="txt_video_empresa" name="txt_video_empresa" placeholder="iframe video" cols="30" rows="2"><?php echo $filas['video_empresa']; ?></textarea>
                                <!-- <input value="<?php// echo $filas['video_empresa']; ?>" class="form-control" title="iframe video" required id="txt_video_empresa" name="txt_video_empresa" placeholder="iframe video" type="text"> -->
                                </div>



                              <div  class=" ">
                                <div class="form-group">
                                  <label for="video">Facebook:</label>
                                  <input value="<?php echo $filas['facebook']; ?>" class="form-control" title="facebook" required id="txt_facebook" name="txt_facebook" placeholder="facebook" type="text">
                                </div>
                              </div>

                              <div  class=" ">
                                <div class="form-group">
                                  <label for="video">Instagram:</label>
                                  <input value="<?php echo $filas['instagram']; ?>" class="form-control" title="instagram" required id="txt_instagram" name="txt_instagram" placeholder="instagram" type="text">
                                </div>
                              </div>
                        </div>


                        <div class="card col-md-5">

                            <h5 class="card-header">Agregar Imagenes</h5>
                            <div class="card-body">

                              <div class="" id="divFotos">

                    						<div id="divSuperiorSubirImagenes">


                    							<div class="row col-12 ">
                    								<input class="btn btn-primary col-6 btn-sm"  type="button" id="botonAgregar" onclick="agregarCampoFoto();" value="+ Imagenes" />
                    								<input class="btn btn-primary col-6 btn-sm"  type="button" id="botonRemover" onclick="removerCampoFoto();" value="- Imagenes" />
                    							</div>

                    							<table class="table table-bordered" id="tablaFotosIngreso">

                    								<input type="hidden" id="contadorFotos" name="contadorFotos" value="1">

                    								<thead>
                    									<th>Archivo</th>
                                     <th>Principal</th>
                    									<th>Afiche</th>
                    								</thead>
                    								<tbody>
                    									<tr>
                    										<td><input class="form-control" name="foto1" type="file"></input></td>
                                       <td><input class="form-control" type="checkbox" name="principal1"></td>
                    										<td><input class="form-control" type="checkbox" name="afiche1"></td>
                    									</tr>
                    							</tbody>
                    							</table>

                    						</div>


                     				</div>
                          </div>

                        </div>


                        </div>

                        <hr>

                        <div class="col-md-12 container" >
                              <br>
                                <input type="submit" class="btn btn-block btn-info col-12 " id="btn_insert" value="GUARDAR CAMBIOS" name="btn_registrar" align="right">
                                <!-- <a class="nav-link col-md-3 animated-panel zoomIn"  href="./administracion_empresas.php">&nbsp;&nbsp;ATRAS<span class="sr-only">(current)</span></a> -->
                              <br>
                        </div>

                        <hr>

                         <label for="">Imagenes:</label>

                <div class="row">


                          <div class="col-12 " id="divInferiorImagenesActuales" >

                          </div>

                          <div class="container-fluid"><hr></div>




                </div>



                    </fieldset>
                </form>
                        </div>
                    </div>
              </div>

              <script src="./js/script_administrar_empresas.js"></script>

              <script>
                 listarImagenesEmpresa(<?php echo $id_empresa; ?>);
              </script>


  </body>
</html>
