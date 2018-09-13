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
<br>
<main class="contenido-principal"><!--contenido-principal-->
<div class="container">

    <form id="formularioMensajes" name="formularioMensajes" method="POST" class="col-md-8 col-md-offset-2">
      <legend align="center">Contacto</legend>
                <div class="form-group">
                   <label for="nombre">Nombre:</label>
                   <input class="form-control" required id="nombre" name="nombre" type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input class="form-control" required id="apellido" name="apellido" type="text" placeholder="Apellido">
                </div>
                <div class="form-group">
                   <label for="correo">Correo Electrónico:</label>
                   <input class="form-control" required id="correo" name="correo" type="email" placeholder="Correo">
                </div>
                <div class="form-group">
                   <label for="mensaje">Mensaje</label>
                   <textarea class="form-control col-xs-12" required id="mensaje"  name="mensaje" placeholder="Escriba su mensaje"></textarea>
                </div>
                <div class="form-group">
                  <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                      <br><input type="submit" class="btn btn-warning col-xs-12 "></input>
                  </div>
                </div>
           </form>

    </div>

</main><!--contenido-principal-->

<br>

<footer>


</footer>
<?php
  sub_footer();
  ?>

<script>

function eliminarCamposMensaje(){ /*AQUI LE DOY UN NOMBRE CUALQUIERA A LA FUNCION*/
        $("#nombre").val("");
        $("#apellido").val("");
        $("#correo").val("");
        $("#mensaje").val("");

}

function eventoAlertCorrecto(){
  swal({
    title: "Mensaje enviado correctamente",
    text: "",
    timer: 2000,
    showConfirmButton: false,
    });
}
</script>
<script>

   $("#formularioMensajes").submit(function(){//captura cuando se envia el formulario
      event.preventDefault();//detiene el envio del formulario
 // alert(respuesta);
      if($("#nombre").val()=="" || $("#apellido").val()=="" || $("#correo").val()=="" || $("#mensaje").val()==""){
           alert("No puede dejar campos vacios");
           alert(respuesta);
      }else{

          $.ajax({//realiza el envio del formulario pero por ajax para no tener que recargar pagina

              url:"insertMensaje.php", //donde se va a ingresar el mensaje "insertarMensaje.php"
              data:$("#formularioMensajes").serialize(),
              success:function(respuesta){
                  if(respuesta == 1){
                    //alert("mensaje enviado.");
                      eventoAlertCorrecto();
                      eliminarCamposMensaje();


                  }else{
                      alert("Ha ocurrido un error.");
                  }

              }
          });
          return false;
        }
  });


</script>

<script src='./js/jquery-3.1.0.min.js'></script>

</body>

</html>
