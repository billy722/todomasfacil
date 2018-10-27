
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
<!-- Slider 4 imagenes -->
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

        iframe {
           max-width: 100%;
           height: auto;
        }
        </style>



    </head>
    <body>
      <style>
      #facebook{
          background-color: #0154A0!important;
          color:white!important;
          font-size: 25px;
          margin-right: 2px;
          padding-top:5px;
          padding-bottom:5px;  /*inferior*/
          border-radius: 5px;
      }
      #instagram{
          background-image: url("./img/images.jpg")!important;
          background-size:100%;
          color:white!important;
          font-size: 25px;
          margin-right: 2px;
          padding-top:5px;
          padding-bottom:5px;  /*inferior*/
          border-radius: 5px;
      }
      </style>

  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>
       <!-- <div class="item ">
           <div class="clearfix" style="max-width:474px;">

           </div> -->
  <div class="container-fluid d-none d-md-block">
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
</div>


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
                            <center>
                          <?php echo $filas['coordenadas']; ?>
                            </center>
                        </div>
                      </div>
                      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101271.86828621128!2d-72.46913273385088!3d-37.513911183838786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966bdd37d17f8c73%3A0x3714945f62c6c00f!2zRXJjaWxsYSAxOTUsIExvcyBBbmdlbGVzLCBMb3Mgw4FuZ2VsZXMsIFJlZ2nDs24gZGVsIELDrW8gQsOtbw!5e0!3m2!1ses-419!2scl!4v1538367631655" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
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
                                   <textarea class="form-control" readonly name="name" rows="4" cols="80"><?php echo $filas['horario']; ?>
                                   </textarea>
                          </div>
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
                                <!-- <iframe class="embed-responsive-item" src="<?php// echo $filas['video_empresa']; ?>" width="560" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                            </div>
                          </div>
                        </div>
                      </div>
                 </div>
              <br>
              <div class="row col-sm-12 justify-content-md-center">
                  <div class="col-sm-4">

                    <a class="nav-link" id="facebook" align="center" href="<?php echo $filas['facebook']; ?>"><img src="./img/face.png" style="height:35px; width:35px;" alt="">
                                        &nbsp;&nbsp;Facebook<span class="sr-only">(current)</span></a>
                  </div>
                  <br>
                  <div class="col-sm-4">
                    <!-- <img class="card-img-top"  src="./img/instragram-logo.jpg" alt="Card image"> -->
                    <a class="nav-link"  id="instagram" align="center" href="<?php echo $filas['instagram']; ?>"><img src="./img/insta.png" style="height:35px; width:35px;" alt="">&nbsp;&nbsp;Instagram<span class="sr-only">(current)</span></a>
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


      <script src="./lightslider-master/src/js/lightslider.js"></script>
      <script>

      var ancho_pantalla = screen.width;

      if(ancho_pantalla < 800){
         $(document).ready(function() {
             $("#content-slider").lightSlider({
                   loop:true,
                   keyPress:true,
                   auto:true,
                   speed:500,
                   item:1,
                   thumbItem:9,
                   slideMargin: 1,
              });
          });
        }else{

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
        }
      </script>


</body>
</html>
