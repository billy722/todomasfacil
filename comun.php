<?php
function comprobarSession(){
  @session_start();
  if(isset($_SESSION['run']) and isset($_SESSION['nombre'])){

  }else{
     header("location: index.php");
  }
}

function cargarHead(){
?>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="stylesheet" href="./sweetalert/sweet-alert.css">
  <link rel="stylesheet" href='./css/fullcalendar.min.css' />
  <link rel="stylesheet" href='./css/fullcalendar.print.min.css' media='print' />

  <script src='./js/jquery-3.1.0.min.js'></script>
  <script src='./js/bootstrap.min.js'></script>
  <script src="./js/validaciones.js"></script>
  <script src="./sweetalert/sweet-alert.min.js"></script>
  <script src='./js/moment.min.js'></script>
  <script src='./js/fullcalendar.min.js'></script>
  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script> -->
  <script src="./js/fontawesome-all.min.js"></script>

  <script src="./js/validaciones.js"></script>
  <?php
}


function VentanaCargando(){
  ?>
<style>
.loader,
.loader:before,
.loader:after {
  background: #b63333;
  -webkit-animation: load1 1s infinite ease-in-out;
  animation: load1 1s infinite ease-in-out;
  width: 1em;
  height: 4em;
}
.loader:before,
.loader:after {
  position: absolute;
  top: 0;
  content: '';
}
.loader:before {
  left: -1.5em;
}
.loader {
  text-indent: -9999em;
  margin: 40% auto;
  position: relative;
  font-size: 11px;
  -webkit-animation-delay: 0.16s;
  animation-delay: 0.16s;
}
.loader:after {
  left: 1.5em;
  -webkit-animation-delay: 0.32s;
  animation-delay: 0.32s;
}
@-webkit-keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
@keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
</style>
  <div id="contenedor">
      <div class="loader" id="loader">Loading...</div>
   </div>

  <?php
}

function cargarMenuConfiguraciones(){
  $url= basename($_SERVER['PHP_SELF']);

  if($url=="usuarios.php"){
      echo '<a href="./usuarios.php" class="active btn btn-info col-12">Usuarios </a>';
  }else{
      echo '<a href="./usuarios.php" class="btn btn-info col-12">Usuarios </a>';
  }

     echo'<hr>';

  if($url=="departamentos.php"){
      echo '<a href="./departamentos.php" class="active btn btn-info col-12">Departamentos </a>';
  }else{
      echo '<a href="./departamentos.php" class="btn btn-info col-12">Departamentos </a>';
  }

  ?>


  <?php
}

function cargarMenuPrincipal(){
?>
<style>

#contenedor_logo_menu{
  height:40px;
  width: 40px;
  background:white;
  margin-top: -10px;
  margin-bottom: -10px;
  margin-left: -10px;
}
#logo_menu{
  background-image: url("./img/logo_daem.png");
  height: 100%;
  width:100%;
  background-size: cover;
  background-position: center;
}

.nav-link{
  /* background-color: rgb(28, 196, 201); */
  margin-right: 5px;
}
.nav-link:hover{
 color:white;
 /* background-color: rgb(13, 112, 115); */

}
</style>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-image: url('img/fondo.jpg');">
  <a class="navbar-brand" href="#">
    <div id="contenedor_logo_menu">
      <div id="logo_menu"></div>
    </div>
    <!-- <img src="./img/logo.png" width="80" height="50" class="d-inline-block align-top" alt=""> -->
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">

     <?php
     $url= basename($_SERVER['PHP_SELF']);

     require_once './clases/Usuario.php';
     $usuario= new Usuario();
     $usuario= $usuario->obtenerUsuarioActual();

     if($usuario['tipo_usuario']==1 || $usuario['tipo_usuario']==2){

            //UN LINK
            echo '<li class="nav-item">';
                  if($url=="agenda_general.php"){
                    echo '<a class="nav-link active" href="./agenda_general.php">Agenda General</span></a>';
                  }else{
                    echo '<a class="nav-link" href="./agenda_general.php">Agenda General</span></a>';
                  }
            echo '</li>';

      }
      if($usuario['tipo_usuario']==1){

             //UN LINK
             echo '<li class="nav-item">';
                   if($url=="configuraciones.php" || $url=="usuarios.php" ){
                     echo '<a class="nav-link active" href="./configuraciones.php">Configuraciones</span></a>';
                   }else{
                     echo '<a class="nav-link" href="./configuraciones.php">Configuraciones</span></a>';
                   }
             echo '</li>';
       }


     ?>

    </ul>

     <label class="text-white"><?php echo $usuario['nombre'].', área de &nbsp;'.$usuario['nombre_departamento'].' &nbsp;'; ?></label>
     <a href="./cerrarSesion.php" class="btn btn-danger my-2 my-sm-0" >Salir</a>
  </div>
</nav>
<div><hr></div>
<div><hr></div>

<?php
}

 ?>
