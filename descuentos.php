<?php
require("comun.php");
require("./clases/Empresa.php");
require("./clases/Categoria.php");
require("./clases/Descuento.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Descuentos</title>
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

 a{
    text-decoration: none;
    color:white;

  }
  a:hover{
    color:#f9913c;
    text-decoration: none;

  }

  #imagen_index{
    background-image:url('./img/principal.jpg');
    height:550px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }


  .tarjeta_descuento{
    height: 300px;
  background-position: center;
  background-position: top;
  background-size: cover;
  background-repeat:no-repeat;
  }

  .tarjeta_descuento:hover{
  opacity: 0.8;
  }
</style>



<div class="container card">
    <div class="row">
        <!--Camera Slide-->



            <?php
            $descuentos = new Descuento();
            $listado_descuentos = $descuentos->listarImagenesDescuentos();

            while($filas = $listado_descuentos->fetch_array()) {

              echo '
                <a href="#" data-toggle="modal" data-target="#modal_imagen_'.$filas['id_descuento'].'" class="card col-12 col-md-4 tarjeta_descuento"  style="background-image: url(\'./imagenes/descuentos/'.$filas['ruta_imagen'].'\');"></a>

              ';

            }

              ?>

    </div>   <!--***********  Row End-->
  <br>

</div>  <!--************** Container End-->


  <?php cargarCategorias(); ?>

<br>



<?php
$descuentos = new Descuento();
$listado_descuentos = $descuentos->listarImagenesDescuentos();

while($filas = $listado_descuentos->fetch_array()) {

  echo '

      <div class="modal" id="modal_imagen_'.$filas['id_descuento'].'" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >

              <div class="row">
                  <img class="col-12" style="height:100%;" src="./imagenes/descuentos/'.$filas['ruta_imagen'].'" alt="" />
              </div>

            </div>

          </div>
        </div>
      </div>
  ';
}

?>



       </div>


    <footer>

    <?php
      sub_footer();
      ?>
	</footer>

  <script type='text/javascript' src='./js/jquery.min.js'></script>


</body>
</html>
