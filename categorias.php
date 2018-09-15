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
     </head>
<body>


  <div class="container-fluid">
<?php
      cargarMenuPrincipal();
 ?>

 <div>
    <?php
        $id_categoria = $_REQUEST['id'];

        $empresa_creada = new Empresa();
        $empresa_creada->setCategoria($id_categoria);
        $respuesta = $empresa_creada->obtenerEmpresasPorCategorias();

          while ($filas = $respuesta->fetch_array()) {
            echo '<div class="container">
             </div>
              <div class="card bg-white text-black">
               <img class="card-img .special-card" src="./img/logoTransparente.jpg" alt="Card image">
               <div class="card-img-overlay">
                 <center><h5 class="card-title">'.$filas['nombre_empresa'].'</h5></center>
                 <center><p class="card-text">'.$filas['descripcion_empresa'].'</p></center>
               </div>
              </div>
             </div>';

         }

     ?>
<!-- <div class="container">
 </div>
  <div class="card bg-white text-black">
   <img class="card-img .special-card" src="./img/logoTransparente.jpg" alt="Card image">
   <div class="card-img-overlay">
     <h5 class="card-title">Card title</h5>
     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     <p class="card-text">Last updated 3 mins ago</p>
   </div>
  </div>
 </div> -->

 <!-- <?php
//      $empresa = new Empresa(); //instancio lo de la clase categoria
//      $respuesta = $empresa->obtenerEmpresasActivas();
//
//        while ($filas = $respuesta->fetch_array()) {
//          echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
//              <a href="descripcion_empresas.php">
//              <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="wall" class="img-responsive img-rounded"></a>
//          </div>';
// // comillas simples cuando ingreso html en echo '<div>';
//       }

  ?> -->

		<footer>

		</footer>

    <!-- <?php
      // sub_footer();
      ?> -->
</body>
</html>
