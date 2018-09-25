
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

<!-- CONTENEDOR IMAGEN PRINCIPAL -->

<!-- https://demoapus.com/apuslisting/listings/az-food-fast/ -->
<!-- SLIDER DE LA EMPRESA SELECCIONADA -->
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

<div class="">
  <!-- BANNER EMPRESAS -->
  <section class="seccion_imagenes slider">
    <?php

        $Empresa = new Empresa(); //instancio lo de la clase categoria
        $respuesta = $Empresa->obtenerEmpresas();

          while ($filas = $respuesta->fetch_array()) {
            echo '<div>
                    <img src="./imagenes/empresas/'.$filas['ruta_foto'].'" /></a>
                  </div>';
         }
     ?>
  </section>
</div>

<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery-3.1.0.min.js"></script>
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
                    <th>Domingo/th>
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
