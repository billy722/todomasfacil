<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Todo Fácil</title>
       
        <link rel="stylesheet" type="text/css" href="./slick/slick.css">
        <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
       <!-- <link href="./css/1.css" rel="stylesheet" /> -->

       <style type="text/css">
         html, body {
           margin: 0;
           padding: 0;
         }

         * {
           box-sizing: border-box;
         }

         .slider {
             width: 50%;
             margin: 100px auto;
         }

         .slick-slide {
           margin: 0px 20px;
         }

         .slick-slide img {
           width: 100%;
         }

         .slick-prev:before,
         .slick-next:before {
           color: black;
         }


         .slick-slide {
           transition: all ease-in-out .3s;
           opacity: .2;
         }

         .slick-active {
           opacity: .5;
         }

         .slick-current {
           opacity: 1;
         }
       </style>


       <?php
       cargarHead();

        ?>

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

  #listado_categorias li{
    text-decoration: none;
    display: inline;
    color:white;
    font-size: 25px;
    padding-bottom: 0px;
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
</style>

<div>
  <img src="./img/principal.jpg" class="img-fluid" alt="Responsive image">
  <center>
    <div id="formulario_busqueda">
      <div class="form-group col-offset-18 col-12">
        <!-- <input class="form-control" type="text"> -->
      </div>
    </div>
  </center>
</div>

    <div id="listado_categorias" class="container-fluid">
      <center>
         <ul>
           <?php
               $Categoria = new Categoria(); //instancio lo de la clase categoria
               $respuesta = $Categoria->obtenerCategorias();

                 while ($filas = $respuesta->fetch_array()) {
                   echo '<li>
                           <a href="categorias.php?id='.$filas['id_categoria'].'">
                              <span class="'.$filas['icono'].'">  </span>
                               <label> '.$filas['descripcion_categoria'].'</label>
                            </a>
                         </li>';
       // comillas simples cuando ingreso html
                }
            ?>
          </ul>
        </center>
     </div>



<!-- BANNER EMPRESAS -->
<section class="seccion_imagenes slider">
  <!-- <div>
    <img src="./imagenes/empresas/denticlass0.png" /></a>
  </div> -->

  <?php
      $Empresa = new Empresa(); //instancio lo de la clase categoria
      $respuesta = $Empresa->obtenerEmpresasActivas();

        while ($filas = $respuesta->fetch_array()) {
          echo '<div>
                  <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" /></a>
                </div>';
       }

   ?>

</section>

       </div>


    <footer>


    <?php
      sub_footer();
      ?>
	</footer>

        <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
        <script src="./js/jquery-3.1.0.min.js"></script>
        <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">

          // $(document).on('ready', function() {

            $(".seccion_imagenes").slick({
              dots: true,
              infinite: true,
              slidesToShow: 3,
              slidesToScroll: 3
            });

          // });
      </script>

</body>
<!--
<script src="./js/lightbox.min.js"></script>
  <script src="./js/jquery-3.1.0.min.js"></script> -->

</html>
