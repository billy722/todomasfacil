<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Todo Fácil</title>

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
  #formulario_busqueda{
     position: absolute;

     z-index: 1000;
     margin-top: -400px;

  }
  #imagen_index{
    background-image:url('./img/principal.jpg');
    height:550px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  #campo_busqueda{
    height: 60px;
    border-radius: 0px;
    width: 100%;
    font-size: 30px;
    border-color: #dd7700;
    border-width:thin;
    opacity: 0.8;
  }
  #label_campo_busqueda{
    font-size: 2rem;
    color:#ffffff;
    background-color: rgba(9, 65, 91, 0.84);
    padding-top:5px;
    padding-bottom:5px;
    padding-left:15px;
    padding-right:15px;
  }
  #boton_buscar{
    font-size: 30px;
    color:white;
    border-radius: 0;
    border-color: #dd7700;
    border-width:thin;
    border-left: none;
    opacity: 1;
    background-color: #fc8132;

  }

  #contenedor_buscador{
    margin-top: 200px;
    z-index: 30000;
    position: absolute;

  }

</style>



<div class="container-fluid">

  <div id="contenedor_buscador" class="row justify-content-center align-self-center col-12  ">

    <form action="./buscador_empresas.php" class="form">
        <div class="form-group">
           <label for="campo_busqueda"><h1 id="label_campo_busqueda">¿Que estás buscando?</h1></label>
           <div class="row">
             <input id="campo_busqueda" name="campo_busqueda" type="text" class="form-control col-10" placeholder="Buscar">
             <button id="boton_buscar" class="btn btn-default btn-warning col-2" type="submit" ><i class="fas fa-search"></i></button>
           </div>
        </div>
    </form>

  </div>


    <div class="row">

        <!--Camera Slide-->
         <div class="camera_wrap">
            <div data-src="./img/principal.jpg">
                <img src="./img/principall.jpg">
            </div>
            <div data-src="./img/principal2.jpg">
                <img src="./img/principal2.jpg" class="img-responsive">
            </div>
            <div data-src="./img/principal3.jpg">
                <img src="./img/principal3.jpg">
            </div>

        </div>   <!--------Camera Slide End-->
    </div>   <!--***********  Row End-->
</div>  <!--************** Container End-->


  <?php cargarCategorias(); ?>

<br>

<!-- BANNER EMPRESAS -->
<div class="container-fluid">
<div class="item">
    <ul id="content-slider" class="content-slider">
      <?php
          $Empresa = new Empresa(); //instancio lo de la clase categoria
          $respuesta = $Empresa->obtenerEmpresasActivas();

            while ($filas = $respuesta->fetch_array()) {
              echo '
                    <div>
                      <a href="./descripcion_empresa.php?idEmpresa='.$filas['id_empresa'].'">
                        <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" /></a>
                      </a>
                    </div>
                  ';
           }
       ?>

    </ul>
</div>
</div>




       </div>


    <footer>

    <?php
      sub_footer();
      ?>
	</footer>




  <!-- <script src="./js/jquery-3.1.0.min.js"></script> -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
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
                  speed:600,
                  item:4,
                  thumbItem:9,
                  slideMargin: 2,
              });
    });
  }
  </script>

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
