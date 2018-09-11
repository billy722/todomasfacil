<?php
require("comun.php");
require("./clases/Empresa.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Todo Fácil</title>
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
</style>

<div>
  <img src="./img/principal.jpg" class="img-fluid" alt="Responsive image">
  <center>
    <div id="formulario_busqueda">
      <div class="form-group col-offset-5 col-12">
        <input class="form-control" type="text">
      </div>
    </div>
  </center>
</div>


    <div id="listado_categorias" class="container-fluid">
         <ul>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>COMIDA  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>HOTELES  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>RESTAURANT  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>SALUD  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>DIVERSIÓN  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>AUTOMOVIL  </a>
           </li>
           <li>
             <a href="#" ><span class="fas fa-utensils"> </span>TECNOLOGÍA   </a>
           </li>
         </ul>
    </div>


   <div>
       <?php
            $Empresa = new Empresa();  //creo instancia de la clase para poder usar sus metodos
            $resultado = $Empresa->obtenerEmpresasActivas();  //guardo en una variable lo que devuelve el metodo "ObtenerEMpresasActivas"

            while($filas = $resultado->fetch_array()){//recorro lo que esta en la variable resultado

                   echo "el nombre de la empresa es: ".$filas['nombre_empresa'];

            }

        ?>
   </div>


    <footer>

		</footer>
</body>
</html>
