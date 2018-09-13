<?php
require("comun.php");
require("./clases/Empresa.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Todo Fácil</title>
       <link href="./css/lightbox.min.css" rel="stylesheet" />
        <link href="./css/estilos.css" rel="stylesheet" />
       <!-- <link href="./css/1.css" rel="stylesheet" /> -->
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
        <input class="form-control" type="text">
      </div>
    </div>
  </center>
</div>

    <div id="listado_categorias" class="container-fluid">
         <ul>
           <li>
             <a href="#" ><span class="fa birthday-cake"> </span>COMIDA  </a>
           </li>
           <li>
             <a href="#" ><span class="fa fa-bed"> </span>HOTELES  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>RESTAURANT  </a>
           </li>
           <li>
             <a href="#" ><span class="fa fa-user-md"> </span>SALUD  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-gamepad"> </span>DIVERSIÓN  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-car"> </span>AUTOMOVIL  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-apple"> </span>TECNOLOGÍA   </a>
           </li>
         </ul>
    </div>

<!-- BANNER EMPRESAS -->

<section class="galeria">

<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="./imagenes/empresas/1.jpg" data-lightbox="image-1" data-title="lalalalallalala">
            <img src="./imagenes/empresas/1.jpg" alt="wall" class="img-responsive img-rounded"></a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="./imagenes/empresas/2.png" data-lightbox="image-1" data-title="lalalalallalala">
            <img src="./imagenes/empresas/2.png" alt="wall" class="img-responsive img-rounded"></a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="./imagenes/empresas/3.jpg" data-lightbox="image-1" data-title="lalalalallalala">
            <img src="./imagenes/empresas/3.jpg" alt="wall" class="img-responsive img-rounded"></a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="./imagenes/empresas/4.jpg" data-lightbox="image-1" data-title="lalalalallalala">
            <img src="./imagenes/empresas/4.jpg" alt="wall" class="img-responsive img-rounded"></a>
        </div>




    </div>




</div>

</section>

<!-- FIN BANNER EMPRESAS -->

    <!-- <div>
       <?php
            // $Empresa = new Empresa();  //creo instancia de la clase para poder usar sus metodos
            // $resultado = $Empresa->obtenerEmpresasActivas();  //guardo en una variable lo que devuelve
            //                                                   //el metodo "ObtenerEMpresasActivas"
            //
            // while($filas = $resultado->fetch_array()){//recorro lo que esta en la variable resultado
            //
            //        // echo "el nombre de la empresa es: ".$filas['nombre_empresa'];
            //         // echo '<img src="./imagenes/empresas/'.$filas['imagen_empresa'].'" >';
            //        echo "<section class="galeria">";
            //        echo "<div class="container">";
            //        echo "<div class="row">";
            //        echo "<a href="./imagenes/empresas/" '.$filas['imagen_empresa'].' data-lightbox="image-1" data-title="lalalalallalala">";
            //        echo "<img src="./imagenes/empresas/" '.$filas['imagen_empresa'].' alt="wall" class="img-responsive img-rounded"></a>";
            //        echo "</div>";
            //        echo "</div>";
            //        echo "</section>";

          //}

        ?>
   </div> -->


    <footer>

		</footer>
    <?php
      sub_footer();
      ?>



</body>
<script>
    lightbox.option({
      'resizeDuration': 1000,
      'wrapAround': true,
      'fadeDuration':1000,
      'maxWidth':512
    })
</script>
<script src="./js/lightbox.min.js"></script>
  <script src="./js/jquery-3.1.0.min.js"></script>
<!-- <script src="./js/lightbox.js"></script> -->
</html>
