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

  <script src="./js/script_administrar_descuentos.js"></script>
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


                <div class="row">



                              <div class="card col-md-8">

                                <form action="javascript:agregar_descuento()" id="formulario_descuento_imagen" name="formulario_descuento_imagen" method="POST" enctype="multipart/form-data">

                                  <!-- <h5 class="card-header">Agregar Imagenes</h5> -->
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
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><input class="form-control" name="foto1" type="file"></input></td>
                                            </tr>
                                        </tbody>
                                        </table>

                                      </div>


                                  </div>
                                </div>
                                </form>
                                <input class="form-control btn btn-success" type="submit" name="agregar" value="Guardar">
                                <div><hr></div>

                                <br>
                              </div>

                              <div id="" class="card col-md-8">

                                <!-- <h3>Imagenes subidas</h3> -->
                                <!-- <div><hr></div> -->

                              <div id="contedorImgDescuentos" class="">

                              </div>
                  </div>


              <script type="text/javascript">
                listarImagenesDescuentos();
              </script>
            </div>

          </div>

       </div>

  </div>

</div>

</html>
