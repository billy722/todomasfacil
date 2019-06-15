
<?php
require("comun.php");
require("./clases/Categoria.php");
require("./clases/Empresa.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>

       <title>Empresa</title>
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
           .item{
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



    </head>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=123609474978715"></script>

    <body>
      <style>
      #facebook{
          background-color: #0A425B;
          color:white!important;
          font-size: 80px;
          border-radius: 30px;
          padding:8px;
          height: 35px;
          width: 35px;
      }
      #instagram{
          background-color: #EF4723;
          color:white!important;
          font-size: 80px;
          border-radius: 30px;
          padding:5px;
          height: 35px;
          width: 35px;
      }

      </style>

  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>

 <!-- BANNER EMPRESAS -->
 <div >
     <div class="item">
         <ul id="content-slider" class="content-slider">
         <?php
             $id_empresa = $_REQUEST['idEmpresa'];
             $empresa_creada = new Empresa();
             $empresa_creada->setId($id_empresa);
             $respuesta = $empresa_creada->obtenerImgEmpresasTodas();

                while ($filas = $respuesta->fetch_array()) {

                 echo '
                 <li>
                   <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
                 </li>';
                }
          ?>

         </ul>
     </div>
 </div>


  <!-- <div class="container-fluid d-none d-md-block">
       <div class="item">
         <div class="clearfix" style="max-width:474px;">
          <ul id="image-gallery" class="gallery list-unstyled cS-hidden">

             <?php
                 // $id_empresa = $_REQUEST['idEmpresa'];
                 // $empresa_creada = new Empresa();
                 // $empresa_creada->setId($id_empresa);
                 // $respuesta = $empresa_creada->obtenerImgEmpresasTodas();
                 //
                 //    while ($filas = $respuesta->fetch_array()) {
                 //
                 //     echo '
                 //     <li>
                 //       <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
                 //     </li>';
                 //    }
              ?>
           </ul>
       </div>
  </div>
</div> -->


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
        <br>
                      <div class="col-sm-5">
                        <div class="card">
                          <div class="card-header" style="background:white;">
                            <h3>Nuestra Ubicación</h3>
                          </div>
                          <div class="card-body">
                            <div class="embed-responsive embed-responsive-21by9">
                              <center>
                                <?php echo $filas['coordenadas']; ?>
                              </center>

                            </div>

                          </div>
                        </div>

                        <br>

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
                          <div class="card-header" style="background:white;">
                            <h3>Horario de atención</h3>
                          </div>
                          <div class="card-body">

                                   <textarea class="form-control" readonly name="name" rows="3" cols="80"><?php echo $filas['horario']; ?>
                                   </textarea>

                          </div>

                             <div class=" col-12 ">
                               <div class="card ">
                                   <!-- <div class="card-header" style="background:white;">
                                     <h3>Redes Sociales</h3>
                                   </div> -->
                                   <div class="card-body">

                                    <div class="row">
                                       <div class="col-6">
                                         <h4 style="vertical-align: middle;">Redes Sociales</h4>
                                       </div>
                                       <div class="col-6">
                                         <a class="col-6"  href="<?php echo $filas['facebook']; ?>">
                                            <i id="facebook" class="fab fa-facebook-f"></i>
                                         </a>
                                         <a class="col-6" href="<?php echo $filas['instagram']; ?>">
                                            <i id="instagram" class="fab fa-instagram"></i>
                                         </a>
                                       </div>
                                    </div>

                                    <div><hr></div>

                                    <div class="row">
                                       <div class="col-4">
                                         <h4 style="vertical-align: middle;">Telefono</h4>
                                       </div>
                                       <div class="col-8">
                                         <h6 class="card-text"> <?php echo $filas['telefono']; ?></h6>
                                       </div>
                                    </div>

                                    <div><hr></div>

                                    <div class="row">
                                       <div class="col-4">
                                         <h4 style="vertical-align: middle;">Correo </h4>
                                       </div>
                                       <div class="col-8">
                                         <h6 class="card-text"><?php echo $filas['correo']; ?></h6>
                                       </div>
                                    </div>


                                   </div>


                               </div>
                             </div>

                             <br>

                             <!-- <div class="card-body">
                               <div class="row">
                                  <div class="col-6">
                                      <p class="card-text"> <?php// echo $filas['telefono']; ?></p>
                                      <p class="card-text"><?php //echo $filas['correo']; ?></p>
                                    </a>
                                  </div>
                               </div>
                              </div> -->


                        </div>


                      </div>



                </div>

<br>
                  <div class="row">
                      <div class="col-sm-7">
                        <div class="card">
                          <div class="card-body">
                            <div class="embed-responsive embed-responsive-21by9">
                              <?php echo $filas['video_empresa']; ?>
                                <!-- <iframe class="embed-responsive-item" src="<?php //echo $filas['video_empresa']; ?>" width="560" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                            </div>
                          </div>
                        </div>
                      </div>
                 </div>
              <br>

                  <div class="row">
                      <div class="col-sm-7">
                        <div class="card">
                          <div class="card-body">
                             <div class="fb-comments" data-href="http://www.todomasfacil.cl/todomasfacil/descripcion_empresa.php?idEmpresa=<?php echo $id_empresa; ?>" data-numposts="5"></div>

                          </div>
                        </div>
                      </div>
                 </div>
              <br>


          </div>
      </div>





  <?php cargarCategorias(); ?>

      <footer>
        <?php
          sub_footer();
        ?>
      </footer>


      <!-- <script src="./lightslider-master/src/js/lightslider.js"></script> -->
      <script src="./lightslider-master/src/js/lightslider.js"></script>

      <script>

      // var ancho_pantalla = screen.width;
      //
      // if(ancho_pantalla < 800){
         $(document).ready(function() {
               $("#content-slider").lightSlider({
                    loop:true,
                    keyPress:true,
                    auto:true,
                    speed:2000,
                    item:4,
                    // thumbItem:9,
                    slideMargin: 1,
                    responsive : [
                                  {
                                      breakpoint:900,
                                      settings: {
                                          item:3,
                                          slideMove:1,
                                          slideMargin:6,
                                        }
                                  },
                                  {
                                      breakpoint:800,
                                      settings: {
                                          item:2,
                                          slideMove:1,
                                          slideMargin:6,
                                        }
                                  },
                                  {
                                      breakpoint:480,
                                      settings: {
                                          item:1,
                                          slideMove:1
                                        }
                                  }
                              ]
                });

        });
      // }else{
      //   $(document).ready(function() {
      //
      //       $("#content-slider").lightSlider({
      //                 loop:true,
      //                 keyPress:true,
      //                 auto:true,
      //                 speed:2000,
      //                 item:4,
      //                 thumbItem:9,
      //                 slideMargin: 2,
      //             });
      //   });
      // }
      </script>

</body>
</html>
