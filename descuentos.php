<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
require("./clases/Descuento.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Descuentos</title>
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
         <div class="camera_wrap">

            <?php
            $descuentos = new Descuento();
            $listado_descuentos = $descuentos->listarImagenesDescuentos();

            while($filas = $listado_descuentos->fetch_array()) {

                       echo '
                       <div data-src="./imagenes/descuentos/'.$filas['ruta_imagen'].'">
                           <img src="./imagenes/descuentos/'.$filas['ruta_imagen'].'">
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

  <script src="./js/easing.min.js" type="text/javascript"></script>
  <script src="./js/camera.min.js" type="text/javascript"></script>
  <!-- Custom JS --->
  <script src="./js/plugins.js"></script>


  <script>

  var ancho_pantalla = screen.width;
  // alert(ancho_pantalla);
  $(function () {

  if(ancho_pantalla < 800){
    $('.camera_wrap').camera({
      playPause: false,
      navigation: false,
      navigationHover: true,
      hover: false,
      loader: 'bar',
      loaderColor: '#fc8132',
      loaderBgColor: '#222222',
      loaderOpacity: 1,
      loaderPadding: 0,
      time: 2000,
      transPeriod: 1500,
      pauseOnClick: true,
      pagination: false,
      height: '100%',
    });
  }else{
    $('.camera_wrap').camera({
      playPause: false,
      navigation: false,
      navigationHover: true,
      hover: false,
      loader: 'bar',
      loaderColor: '#fc8132',
      loaderBgColor: '#222222',
      loaderOpacity: 1,
      loaderPadding: 0,
      time: 2000,
      transPeriod: 1500,
      pauseOnClick: true,
      pagination: false,
      height: '35%',
    });
  }


  });
  </script>
</body>
</html>
