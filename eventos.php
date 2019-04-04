<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
require("./clases/Eventos.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Eventos</title>
       <?php
       cargarHead();
        ?>
        <link href="./css/camera.css" rel="stylesheet" type="text/css"/>

     </head>
<body>


  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>

  <!-- imagen principal -->

<style >
  .imagen_principal{
    background-image: url('./img/principal');
  }
  #listado_categorias{
    background: #37626e;
    padding-top:25px;
    padding-bottom:12px;

  }

 a{
    text-decoration: none;
    color:white;

  }
  a:hover{
    color:#f9913c;
    text-decoration: none;

  }

  #imagen_index{
    background-image:url('./img/principal.jpg');
    height:550px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

</style>



<div class="container-fluid">
    <div class="row">
        <!--Camera Slide-->
        <div class="camera_wrap camera_azure_skin" id="camera_wrap">


            <?php
            $eventos = new Eventos();
            $listado_eventos = $eventos->listarImagenesEventos();

            while($filas = $listado_eventos->fetch_array()) {

                       echo '
                       <div data-src="./imagenes/eventos/'.$filas['ruta_imagen'].'">
                           <img src="./imagenes/eventos/'.$filas['ruta_imagen'].'">
                       </div>
                       ';

            }

              ?>

        </div>   <!--------Camera Slide End-->
    </div>   <!--***********  Row End-->
</div>  <!--************** Container End-->


  <?php cargarCategorias(); ?>

<br>



       </div>


  <footer>

    <?php
      sub_footer();
      ?>
	</footer>



    <script type='text/javascript' src='./js/jquery.min.js'></script>
    <script type='text/javascript' src='./js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='./js/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='./js/camera.min.js'></script>
    <!-- Custom JS --->
    <script src="./js/plugins.js"></script>


    <script>
    		jQuery(function(){

            jQuery('#camera_wrap').camera({
      				height: '500px',
      				loader: 'pie',
              playPause: false,
              navigation: false,
              time: 900,
              transPeriod: 1300,
      				// thumbnails: true
      			});
    	 });

    </script>

</body>
</html>
