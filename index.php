<!DOCTYPE html>
<html lang="es">
     <head>

       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
       <title>Todo Fácil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='./css/fullcalendar.min.css' rel='stylesheet' />
        <link href='./css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/estilos.css">


        <script src='./js/jquery-3.1.0.min.js'></script>
        <script src='./js/moment.min.js'></script>
        <script src='./js/bootstrap.min.js'></script>
        <script src="./js/scriptLogin.js"></script>
        <script src="./js/validaciones.js"></script>
     </head>
<body>


  <div class="container-fluid">


<style>
.bg-light {
    background-color: #ffffff!important;
}
.nav-link{
    background-color: #fc8132!important;
    color:white!important;
    font-size: 20px;
    margin-right: 2px;
    padding:5px;
}
</style>

    <nav id="menu_principal" class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="./img/logo.png" width="240" height="110" class="d-inline-block align-top" alt="">
      </a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

          <ul class="navbar-nav mr-sm-2">
            <li class="nav-item active">
              <a class="nav-link" href="#">INICIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">NUESTROS CLIENTES<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">EVENTOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">QUIENES SOMOS<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">CONTACTANOS<span class="sr-only">(current)</span></a>
            </li>

          </ul>

      </div>

    </nav>

  </div>


  <!-- imagen principal -->

<style >
  .imagen_principal{
    background-image: url('./img/principal');
  }
  #listado_categorias{
    background: #37626e;
    padding-top:5px;
    padding-bottom:5px;

  }

  #listado_categorias li{
    text-decoration: none;
    display: inline;
    color:white;
    font-size: 30px;
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
     margin-top: -300px;
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
             <a href="#" >COMIDA > </a>
           </li>
           <li>
             <a href="#" >HOTELES > </a>
           </li>
           <li>
             <a href="#" >RESTAURANT > </a>
           </li>
           <li>
             <a href="#" >SALUD > </a>
           </li>
           <li>
             <a href="#" >DIVERSIÓN > </a>
           </li>
           <li>
             <a href="#" >AUTOMOVIL > </a>
           </li>
           <li>
             <a href="#" >TECNOLOGÍA > </a>
           </li>
         </ul>
    </div>

		<footer>

		</footer>
</body>
</html>
