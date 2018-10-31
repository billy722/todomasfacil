<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Descuentos</title>
       <?php
       cargarHead();
        ?>
        <link href="./css/camera.css" rel="stylesheet" type="text/css"/>
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
    font-size: 2rem;
    color:#ffffff;
    background-color: rgba(9, 65, 91, 0.84);
    padding-top:5px;
    padding-bottom:5px;
    padding-left:15px;
    padding-right:15px;
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

  #contenedor_buscador{
    margin-top: 200px;
    z-index: 30000;
    position: absolute;

  }

</style>



<div class="container-fluid">

    <div class="row">

        <!--Camera Slide-->
         <div class="camera_wrap">
            <div data-src="./img/principal.jpg">
                <img src="./img/principall.jpg">
            </div>
            <div data-src="./img/principal2.jpg">
                <img src="./img/principal2.jpg" class="img-responsive">
            </div>
            <div data-src="./img/principal3.jpg">
                <img src="./img/principal3.jpg">
            </div>

        </div>   <!--------Camera Slide End-->
    </div>   <!--***********  Row End-->
</div>  <!--************** Container End-->


  <?php cargarCategorias(); ?>

<br>






       </div>


    <footer>

    <?php
      sub_footer();
      ?>
	</footer>
</body>
</html>
