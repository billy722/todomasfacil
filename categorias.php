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

 <div class="container">
   <div class="row">
      <?php
          $id_categoria = $_REQUEST['id'];
          // $id_categoria = $_REQUEST['idEmpresa'];

          $empresa_creada = new Empresa();
          $empresa_creada->setCategoria($id_categoria);
          $respuesta = $empresa_creada->obtenerEmpresasPorCategorias();

             while ($filas = $respuesta->fetch_array()) {
               // echo "\".$id_categoria\".";


              echo '
              <div class="col-md-4">

                  <div class=" card bg-white border-info mb-3 text-black" >
                        <a href="descripcion_empresa.php?idEmpresa='.$filas['id_empresa'].'" >
                        <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
                        </a>

                        <div class="card-body">
                          <h5 class="card-title">'.$filas['nombre_empresa'].'</h5>
                          <p class="card-text">'.substr($filas['descripcion_empresa'], 0, 100).' ...</p>

                        </div>
                   </div>
              </div>';

            }

       ?>

  </div>
</div>
<div><hr></div>


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


  <?php cargarCategorias(); ?>

    <?php
      sub_footer();
      ?>
</body>
</html>
