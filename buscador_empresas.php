<?php
require("comun.php");
require("./clases/Categoria.php");
require("./clases/Empresa.php");
require("./clases/Funciones.php");
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

      $Funciones = new Funciones();
      $campo_busqueda = $Funciones->limpiarTexto($_REQUEST['campo_busqueda']);
 ?>

 <div>

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
       /* margin-top: 2; */
       z-index: 30000;
       position: relative;
       padding:20px;

     }

     #contenedor_resultado_busqueda{
       margin-top: 10px;
     }
     #div_texto_resultado{
       background: rgba(204, 73, 9, 0.13);
       background-position: center;
       color:#0A425B;
       font-weight: 100;
       margin-left: -20px;
       margin-right: -20px;
       font-size: 10px;
     }

   </style>



<div class="container-fluid" style="background-image:url('./img/principal3.jpg')">

     <div id="contenedor_buscador" class="row justify-content-center align-self-center col-12  ">

       <form action="./buscador_empresas.php" class="form">
           <div class="form-group">
              <label for="campo_busqueda"><h1 id="label_campo_busqueda">¿Que estás buscando?</h1></label>
              <div class="row">
                <input id="campo_busqueda" name="campo_busqueda" type="text" class="form-control col-10" placeholder="Buscar" value="<?php echo $campo_busqueda; ?>">
                <button id="boton_buscar" class="btn btn-default btn-warning col-2" type="submit" ><i class="fas fa-search"></i></button>
              </div>
           </div>
       </form>

     </div>
</div>


 <div class="container-fluid" >
   <div >


       <div class="" id="div_texto_resultado">
           <center>
             <h4>Resultado de tu búsqueda</h4>
           </center>
       </div>



       <div id="contenedor_resultado_busqueda">



        <?php


         // echo "esta buscando: ".$campo_busqueda;

                  $empresa = new Empresa();
                  $respuesta = $empresa->buscarEmpresas($campo_busqueda);

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
</div>

<div><hr></div>




  <?php cargarCategorias(); ?>

    <?php
      sub_footer();
      ?>
</body>
</html>
