<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Todo Fácil</title>
       <link href="./css/lightbox.min.css" rel="stylesheet" />
        <link href="./css/estilos.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/estilosSlider.css">
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

      <div class="slider">
      	<div class="slide-track">
      		<div class="slider">DENTICLASS
           <a href="categorias.php">
             <img src="./imagenes/empresas/denticlass0.png" height="100" width="250" alt="" />
           </a>
      		</div>
      		<div class="slider">

      			<img src="./imagenes/empresas/1.jpg" height="100" width="250" alt="" />
            <a href="categorias.php">EMMA SUAZO</a>
      		</div>
      		<div class="slider">
            <a href="categorias.php" >EMPORIO HERNAIZ
      			 <img src="./imagenes/empresas/2.png" height="100" width="250" alt="" />
            </a>
      		</div>
      		<div class="slider">ESTACION CHURRASQUERIA
            <a href="categorias.php">
      			<img src="./imagenes/empresas/3.jpg" height="100" width="250" alt="" /></a>
      		</div>
      		<div class="slider"><a href="categorias.php">
      			<img src="./imagenes/empresas/4.jpg" height="100" width="250" alt="" /></a>
      		</div>
          <div class="slider">
      			<img src="./imagenes/empresas/5.jpg" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/6.jpg" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/7.jpg" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/8.png" height="100" width="250" alt="" />
      		</div>
          <div class="slider">
      			<img src="./imagenes/empresas/9.jpg" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/10.png" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/11.png" height="100" width="250" alt="" />
      		</div>
      		<div class="slider">
      			<img src="./imagenes/empresas/12.png" height="100" width="250" alt="" />
      		</div>
      	</div>
      </div>

      <!-- <?php
          // $empresa = new Empresa(); //instancio lo de la clase categoria
          // $respuesta = $empresa->obtenerEmpresasActivas();

           //  while ($filas = $respuesta->fetch_array()) {
           //    // echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
           //    //     <a href="categorias.php?id='.$filas['id_imagen'].'">
           //    //     <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="wall" class="img-responsive img-rounded"></a>
           //    // </div>';
           //
           //    echo '<section class="galeria">
           //            <div class="container">
           //                <div class="slider">
           //                	<div class="slide-track">
           //                		<div class="slider">
           //                     <a href="descripcion_empresas.php">
           //                			<img src="./imagenes/empresas/'.$filas['ruta_foto'].'" height="100" width="250" alt="" /></a>
           //                    </div>
           //                  </div>
           //                </div>
           //            </div>
           //          </section>';
           // }

       ?> -->




       </div>
     </section>

         <!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <a href="./imagenes/empresas/1.jpg" data-lightbox="image-1" data-title="lalalalallalala">
            <img src="./imagenes/empresas/1.jpg" alt="wall" class="img-responsive img-rounded"></a>
        </div> -->


    <footer>

		</footer>
    <?php
      sub_footer();
      ?>



</body>

<script src="./js/lightbox.min.js"></script>
  <script src="./js/jquery-3.1.0.min.js"></script>

</html>
