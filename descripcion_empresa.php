
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

<!-- https://demoapus.com/apuslisting/listings/az-food-fast/ -->
<!-- SLIDER DE LA EMPRESA SELECCIONADA -->
<div class="container">
   <?php
       $id_empresa = $_REQUEST['idEmpresa'];

       $empresa_creada = new Empresa();
       $empresa_creada->setId($id_empresa);
       $respuesta = $empresa_creada->obtenerEmpresasAfiche();

       if ($id_empresa) {
          while ($filas = $respuesta->fetch_array()) {
            // echo "\".$id_empresa\".";
           echo '
                   <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
                    ';
          }
          } else {
            echo "noooooo";
          }
    ?>
</div>
<br>
<!-- DESCRIPCION DE LA EMPRESA -->

     <?php
     $id_empresa = $_REQUEST['idEmpresa'];

     $empresa_creada = new Empresa();
     $empresa_creada->setId($id_empresa);
     $respuesta = $empresa_creada->obtenerEmpresas();

         if ($filas = $respuesta->fetch_array()) {
           // echo "\".$id_empresa\".";
          echo '<div class="container">
            <div class="row">
              <div class="col-sm-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$filas['nombre_empresa'].'</h5>
                    <p class="card-text">'.$filas['descripcion_empresa'].'</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
<h5>joasjfopsjfp
fsdfdsafa
fdsagdsagas
gdsagdsagasg
gdsagdsagasgdsagdsa
dsagdsaga</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
';

        }
        else {
          swal("Ha ocurrido un error","","danger");
        }

      ?>



    <!-- Menu de categorias -->
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
<footer>
    <?php
      sub_footer();
      ?>
      </footer>
</body>
</html>
