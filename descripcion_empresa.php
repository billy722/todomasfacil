
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


<!-- CONTENEDOR IMAGEN PRINCIPAL -->

<!-- https://demoapus.com/apuslisting/listings/az-food-fast/ -->
<!-- EMPRESA SELECCIONADA LOGO -->
<div class="container">
   <?php
       $id_empresa = $_REQUEST['idEmpresa'];

       $empresa_creada = new Empresa();
       $empresa_creada->setId($id_empresa);
       $respuesta = $empresa_creada->obtenerEmpresasAfiche();


          if ($filas = $respuesta->fetch_array()) {
            // echo "\".$id_empresa\".";
           echo '<div class="container">
                  <div class="row justify-content-md-center">
                  <div class="col-sm-8">
                  <div class="center-block">
                   <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
                  </div></div></div></div>';
          }else {

          }

    ?>
</div>


  <!-- BANNER EMPRESAS SELECCIONADA -->
  <!-- <section class="carousel-informacion">

  <div id="carousel-id" class="carousel slide" data-ride="carousel">
      <!-- <ol class="carousel-indicators">
          <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-id" data-slide-to="1" class=""></li>
          <li data-target="#carousel-id" data-slide-to="2" class=""></li>
          <li data-target="#carousel-id" data-slide-to="3" class=""></li>

      </ol> -->
      <!-- <?php
          // $id_empresa = $_REQUEST['idEmpresa'];
          //
          // $Empresa = new Empresa(); //instancio lo de la clase categoria
          // $Empresa->setId($id_empresa);
          // $respuesta = $Empresa->obtenerImgEmpresas();
          //
          //   while ($filas = $respuesta->fetch_array()) {
          //     echo '<div class="carousel-inner">
          //         <div class="item active">
          //             <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="slider-1" />
          //         </div>
          //     </div>';
          //  }
       ?> -->

      <!-- <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> -->
      <!-- <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> -->
  <!-- </div>

  </section> -->

  <!-- <section class="seccion_imagenes slider">
    <?php
        // $id_empresa = $_REQUEST['idEmpresa'];
        //
        // $Empresa = new Empresa(); //instancio lo de la clase categoria
        // $Empresa->setId($id_empresa);
        // $respuesta = $Empresa->obtenerImgEmpresas();
        //
        //   while ($filas = $respuesta->fetch_array()) {
        //     echo '<div>
        //             <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" /></a>
        //           </div>';
        //  }
     ?>
  </section> -->



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

                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-facebook ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>

                  </div>
                </div>
              </div>
            </div>

            </br>

            <div class="row">
              <div class="col-sm-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Horarios</h5>
                    <p class="card-text">
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sabado</th>
                    <th>Domingo</th>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">

                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-twitter ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>
                  <a class="btn btn-block btn-social  btn-facebook ">
                    <span class = "fa fa-twitter"> </ span> Iniciar sesión con Twitter
                  </a>

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

      <!-- EMPRESA SELECCIONADA IMAGENES -->
      <div class="container">
         <?php
             $id_empresa = $_REQUEST['idEmpresa'];

             $empresa_creada = new Empresa();
             $empresa_creada->setId($id_empresa);
             $respuesta = $empresa_creada->obtenerImgEmpresasTodas();


                while ($filas = $respuesta->fetch_array()) {
                  // echo "\".$id_empresa\".";
                 echo '
                 <div class="container">
                 <div class="row">
                      <div class="col-sm-4">
                        <div class="card">
                        <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
                          </div>
                        </div>
                      </div></div>';
                }

          ?>
      </div>


      <!-- <section class="">
      <div class="container">
      <div class="row">
             <div class="card">
              <img class="card-img-top" style="height:250px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image cap">
             </div></div></div>
             </section> -->

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
