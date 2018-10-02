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

        <link href='./css/fullcalendar.min.css' rel='stylesheet' />
        <link href='./css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/estilos.css">
        <!-- <link rel="stylesheet" href="./css/estilosSlider.css"> -->
        <link rel="stylesheet" type="text/css" href="./css/sweet-alert.css">
        <link rel="stylesheet" type="text/css" href="./css/sweet-alert.css">
        <!-- <link rel="stylesheet" type="text/css" href="./slick/slick.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> -->

        <script src='./js/jquery-3.1.0.min.js'></script>
        <script src='./js/moment.min.js'></script>
        <script src='./js/bootstrap.min.js'></script>
        <script src="./js/scriptLogin.js"></script>
        <script src="./js/validaciones.js"></script>
        <script src="./js/fontawesome-all.min.js"></script>
        <script src="./js/sweetalert.min.js"></script>
        <!-- <script src="./js/lightbox.js"></script> -->
        <!-- <script src="./js/lightbox.min.js"></script> -->




        </script>
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
.bg-light {
    background-color: #ffffff!important;
}
.nav-link{
    background-color: #fc8132!important;
    color:white!important;
    font-size: 20px;
    margin-right: 2px;
    padding-top:15px;
    padding-bottom:15px;  /*inferior*/
}
</style>

    <nav id="menu_principal" class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="./img/logo.png" width="240" height="110" class="d-inline-block align-top" alt="">
      </a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03" >

          <ul class="navbar-nav mr-sm-2  ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">INICIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="nuestros_clientes.php">NUESTROS CLIENTES<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="eventos.php">EVENTOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="quienes_somos.php">QUIENES SOMOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contactanos.php">CONTACTANOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contactanos.php" data-toggle="modal" data-target="#modal-id-1">:0<span class="sr-only">(current)</span></a>
            </li>
          </ul>
      </div>
    </nav>
  </div>

  <!-- modal -->


  <!-- The Modal -->
 <div class="modal fade" id="modal-id-1">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">INGRESAR</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
         <form class="" name="inicio_sesion" id="inicio_sesion" action="">
           <div class="form-group">
             <input type="text" class="form-control" onkeypress="" placeholder="Ingrese su rut" id="run_usuario" name="run_usuario" required autofocus>
             <br>
             <input type="password" class="form-control" placeholder="Contraseña" name="password_usuario" required>

           </div>

             <button class="btn btn-lg btn-primary btn-block" type="submit"   >
                 Aceptar</button>
                 <button class="btn btn-lg btn-danger btn-block" type="" data-dismiss="modal">
                 Cancelar</button>
          </form>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>

     </div>
   </div>
 </div>



<?php
}
function sub_footer(){
 ?>

<div class="sub_footer">
    <span>&copy;Todos Los Derechos Reservados</span>
</div>

<?php }

function login(){ ?>
  <script>
      $('#inicio_sesion').submit(function(){
          event.preventDefault();
          $.ajax({
              url:"../comun/validarSesion.php",
              data:$('#inicio_sesion').serialize(),
              success:function(respuesta){

              if(respuesta == '1'){
              window.location = 'indexAdmin.php';
              }else if(respuesta == '2'){
                  window.location = 'perfil-usuario.php';

              }else{
                   alert("Usuario no Registrado en el sistema o sin los permisos Necesarios.");
                   location.reload();
              }
          }

          });
      });
  </script>
  <?php } 
