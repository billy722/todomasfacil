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
        <script src="./js/jquery-3.1.0.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="./lightslider-master/src/js/lightslider.js"></script>
        <script>
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
          // $("#content-slider-principal").lightSlider({
          //           loop:true,
          //           keyPress:true,
          //           auto:true,
          //           speed:3000,
          //           item:1,
          //           thumbItem:9,
          //           slideMargin: 1,
          //       });

        });
        </script>
        <script>
           $(document).ready(function() {
          $("#content-slider2").lightSlider({
                    loop:true,
                    keyPress:true,
                    auto:true,
                    speed:500,
                    item:2,
                    thumbItem:9,
                    slideMargin: 1,
                });

        });
        </script>

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
    font-size: 40px;
    color:#ffffff;
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

</style>

    <div id="imagen_index" class="img-fluid d-flex" alt="Responsive image" >
       <div class="row justify-content-center align-self-center col-12  ">

         <!-- <h1 id="label_campo_busqueda" class="col-12 col-md-4">¿Que estás buscando?</h1> -->
           <br>

         <form action="" class="form">
             <div class="form-group">
                <label for="campo_busqueda"><h1 id="label_campo_busqueda">¿Que estás buscando?</h1></label>
                <div class="row">
                  <input id="campo_busqueda" type="text" class="form-control col-10" placeholder="Buscar">
                  <button id="boton_buscar" class="btn btn-default btn-warning col-2" type="submit" ><i class="fas fa-search"></i></button>
                </div>
             </div>
         </form>

       </div>

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
                }
            ?>
          </ul>
        </center>
     </div>

<br>

<!-- BANNER EMPRESAS -->
<div class="container-fluid d-none d-md-block">
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
<div class="container-fluid d-md-none">
   <div class="item">
       <ul id="content-slider2" class="content-slider">
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



</body>


</html>
