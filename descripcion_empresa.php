
<?php
require("comun.php");
require("./clases/Categoria.php");
require("./clases/Empresa.php");
require("./clases/descripcion_empresa.php");
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

<!-- CONTENEDOR IMAGEN PRINCIPAL -->

 <!-- <div class="container">
   <div class="row">
      <?php
          // $id_categoria = $_REQUEST['idEmpresa'];
          // // $id_categoria = $_REQUEST['idEmpresa'];
          //
          // $empresa_creada = new Empresa();
          // $empresa_creada->setCategoria($id_categoria);
          // $respuesta = $empresa_creada->obtenerEmpresasPorCategorias();
          //
          //    while ($empresaPrincipal = $respuesta->fetch_array()) {
          //      // echo "\".$id_categoria\".";
          //
          //
          //     echo '
          //     <div class="col-md-4">
          //         <div class=" card bg-white text-black" >
          //             <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$empresaPrincipal['ruta_foto'].'" alt="Card image">
          //             <div class="card-body">
          //               <h5 class="card-title">'.$empresaPrincipal['nombre_empresa'].'</h5>
          //               <p class="card-text">'.$empresaPrincipal['descripcion_empresa'].'</p>
          //             </div>
          //        </div>
          //     </div>';
          //
          //   }

       ?>
  </div>
</div> -->
<!-- https://demoapus.com/apuslisting/listings/az-food-fast/ -->

 <div class="container">
   <div class="row">

     <?php
     $id_empresa = $_REQUEST['idEmpresa'];

     $empresa_creada = new Empresa();
     $empresa_creada->setId($id_empresa);
     $respuesta = $empresa_creada->obtenerEmpresas();

         if ($filas = $respuesta->fetch_array()) {
           // echo "\".$id_empresa\".";
          echo '<div class="col-md-4">
              <div class=" card bg-white text-black">
              <h5 class="card-title">'.$filas['nombre_empresa'].'</h5>
              <p class="card-text">'.$filas['descripcion_empresa'].'</p>
              </div>
          </div>';

        }
        else {
          swal("Ha ocurrido un error","","danger");
        }

      ?>

   </div>
   <div class="row">
      <?php
          $id_empresa = $_REQUEST['idEmpresa'];

          $empresa_creada = new Empresa();
          $empresa_creada->setId($id_empresa);
          $respuesta = $empresa_creada->obtenerEmpresas();

          if ($id_empresa) {
             while ($filas = $respuesta->fetch_array()) {
               // echo "\".$id_empresa\".";
              echo '<div class="col-md-4">
                  <div class=" card bg-white text-black" >
                      <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
                  </div>
              </div>';

            }
            // <div class="card-body">
            //   <h5 class="card-title">'.$filas['nombre_empresa'].'</h5>
            //   <p class="card-text">'.$filas['descripcion_empresa'].'</p>
            // </div>

            } else {
              echo "noooooo";
            }


       ?>
  </div>
</div>

<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
   </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->





		<footer>

		</footer>
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

    <?php
      sub_footer();
      ?>
</body>
</html>
