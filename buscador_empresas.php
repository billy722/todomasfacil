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

 $campo_busqueda = $_REQUEST['campo_busqueda'];

 echo "esta buscando: ".$campo_busqueda;

          // $id_categoria = $_REQUEST['id'];
          // // $id_categoria = $_REQUEST['idEmpresa'];
          //
          // $empresa_creada = new Empresa();
          // $empresa_creada->setCategoria($id_categoria);
          // $respuesta = $empresa_creada->obtenerEmpresasPorCategorias();
          //
          //    while ($filas = $respuesta->fetch_array()) {
          //      // echo "\".$id_categoria\".";
          //
          //
          //     echo '
          //     <div class="col-md-4">
          //
          //         <div class=" card bg-white border-info mb-3 text-black" >
          //               <a href="descripcion_empresa.php?idEmpresa='.$filas['id_empresa'].'" >
          //               <img class="card-img-top" style="height:200px" src="./imagenes/empresas/'.$filas['ruta_foto'].'" alt="Card image">
          //               </a>
          //
          //               <div class="card-body">
          //                 <h5 class="card-title">'.$filas['nombre_empresa'].'</h5>
          //                 <p class="card-text">'.substr($filas['descripcion_empresa'], 0, 100).' ...</p>
          //
          //               </div>
          //          </div>
          //     </div>';
          //
          //   }

       ?>

  </div>
</div>
<div><hr></div>




  <?php cargarCategorias(); ?>

    <?php
      sub_footer();
      ?>
</body>
</html>
