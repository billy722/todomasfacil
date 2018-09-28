
<?php
require("comun.php");
require("./clases/Categoria.php");
require("./clases/Empresa.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>

       <title>Quienes somos</title>
       <?php
       cargarHead();
        ?>

        <link rel="stylesheet"  href="./lightslider-master/src/css/lightslider.css"/>
        <style>
        	ul{
    			list-style: none outside none;
    		    padding-left: 0;
                margin: 0;
    		}
            .demo .item{
                margin-bottom: 60px;
            }
    		.content-slider li{
    		    background-color: #ed3020;
    		    text-align: center;
    		    color: #FFF;
    		}
    		.content-slider h3 {
    		    margin: 0;
    		    padding: 70px 0;
    		}
    		.demo{
    			width: 800px;
    		}
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="./lightslider-master/src/js/lightslider.js"></script>
        <script>
        	 $(document).ready(function() {
    			$("#content-slider").lightSlider({
                    loop:true,
                    keyPress:true,
                    auto:true,
                    speed:500,
                    item:4,
                    thumbItem:9,
                    slideMargin: 1,
                });

    		});
        </script>
    </head>
    <body>


  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>


       <div class="item">
           <div class="clearfix" style="max-width:474px;">

           </div>
       </div>
       <div class="item">
           <ul id="content-slider" class="content-slider">
             <?php
                 $id_empresa = $_REQUEST['idEmpresa'];

                 $empresa_creada = new Empresa();
                 $empresa_creada->setId($id_empresa);
                 $respuesta = $empresa_creada->obtenerImgEmpresasTodas();


                    while ($filas = $respuesta->fetch_array()) {
                      // echo "\".$id_empresa\".";
                     echo '
                     <li>
                       <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
                     </li>';
                    }

              ?>

           </ul>
       </div>


<!-- CONTENEDOR IMAGEN PRINCIPAL -->

<!-- https://demoapus.com/apuslisting/listings/az-food-fast/ -->




<br>
<!-- DESCRIPCION DE LA EMPRESA -->

     <?php
     $id_empresa = $_REQUEST['idEmpresa'];

     $empresa_creada = new Empresa();
     $empresa_creada->setId($id_empresa);
     $respuesta = $empresa_creada->obtenerEmpresas();

      $filas = $respuesta->fetch_array();
      ?>
              <div class="container">
                  <div class="row">
                      <div class="col-sm-7">

                        <div class="card">
                          <div class="card-body">
                            <img class="img-thumbnail" width="100" height="100" src="./imagenes/empresas/<?php echo $filas['ruta_foto']; ?>" alt="">
                            <label class="card-title"><h2><?php echo $filas['nombre_empresa']; ?></h2></label>
                            <div><hr></div>
                            <p class="card-text"><?php echo $filas['descripcion_empresa']; ?></p>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-5">
                        <div class="card">
                          <div class="card-body">
                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d403985.7461658262!2d-72.75887045612374!3d-37.71642345019231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966bdd37d17f8c73%3A0x3714945f62c6c00f!2zRXJjaWxsYSAxOTUsIExvcyBBbmdlbGVzLCBMb3Mgw4FuZ2VsZXMsIFJlZ2nDs24gZGVsIELDrW8gQsOtbw!5e0!3m2!1ses-419!2scl!4v1538002306546" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                          </div>
                        </div>
                      </div>

                    </div>

<br>

                  <div class="row">
                      <div class="col-sm-7">

                        <div class="card">
                          <div class="card-body">

                            <?php
                                $id_empresa = $_REQUEST['idEmpresa'];

                                $empresa_afiche = new Empresa();
                                $empresa_afiche->setId($id_empresa);
                                $respuesta_afiche = $empresa_afiche->obtenerEmpresasAfiche();


                                   if ($filas_afiche = $respuesta_afiche->fetch_array()) {
                                     // echo "\".$id_empresa\".";
                                    echo '<div class="card">
                                              <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas_afiche['ruta_foto'].'" alt="Card image">
                                             </div>';
                                   }else {

                                   }

                             ?>

                          </div>
                        </div>
                      </div>


                      <div class="col-sm-5">
                        <div class="card">
                          <div class="card-body">
                            <h1 class="card-head">Horario</h1>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Lunes a Viernes</td>
                                  <td>De 09:00 a 19:30</td>
                                </tr>
                                <tr>
                                  <td>Sabados</td>
                                  <td>De 09:00 a 13:30</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                </div>

<br>

                  <div class="row">
                      <div class="col-sm-7">

                        <div class="card">
                          <div class="card-body">

                            <video width="600" height="300" src="./imagenes/empresas/<?php echo $filas['video_empresa']; ?>" controls>
                              Tu navegador no implementa el elemento <code>video</code>.
                            </video>


                          </div>
                        </div>
                      </div>


                </div>



                    <br>


              </div>

      </div>


<footer>
    <?php
      sub_footer();
      ?>
      </footer>

      <script type = "text / javascript" >
  $ ( documento ). listo ( función () {
    $ ( "#lightSlider" ). lightSlider ();
  });
</script>

</body>
</html>
