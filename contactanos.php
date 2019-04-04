<?php
require("comun.php");
require("./clases/Empresa.php");
 ?>
<!DOCTYPE html>
<html lang="es">
     <head>
       <title>Contactanos</title>

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

<div class="container">
  <div class="card col-12 col-md-6">

      <form action="" id="formularioMensajes" name="formularioMensajes" method="POST" class="">
        <legend align="center">Contacto</legend>

        <div class="row">
                  <div class="form-group col-12 col-md-6">
                     <label for="nombre">Nombre:</label>
                     <input class="form-control" required id="nombre" name="nombre" type="text" placeholder="Nombre">
                  </div>
                  <div class="form-group col-12 col-md-6">
                      <label for="apellido">Apellido</label>
                      <input class="form-control" required id="apellido" name="apellido" type="text" placeholder="Apellido">
                  </div>
                  <div class="form-group col-12 col-md-12">
                     <label for="correo">Correo Electrónico:</label>
                     <input class="form-control" required id="correo" name="correo" type="email" placeholder="Correo">
                  </div>
                  <div class="form-group col-12 col-md-12">
                     <label for="mensaje">Mensaje</label>
                     <textarea class="form-control col-xs-12" rows="5" required id="mensaje"  name="mensaje" placeholder="Escriba su mensaje"></textarea>
                  </div>
                  <div class="form-group col-12 col-md-12">
                        <label for="">&nbsp;</label>
                        <br><input type="submit" class="btn btn-lg btn-primary btn-block" style=""></input>
                  </div>
          </div>
      </form>

  </div>
</div>

<br>

<footer>


</footer>

<?php
  sub_footer();
  ?>


<script>

   $("#formularioMensajes").submit(function(){//captura cuando se envia el formulario
      event.preventDefault();//detiene el envio del formulario
 // alert(respuesta);
      if($("#nombre").val()=="" || $("#apellido").val()=="" || $("#correo").val()=="" || $("#mensaje").val()==""){
           alert("No puede dejar campos vacios");
      }else{

          $.ajax({//realiza el envio del formulario pero por ajax para no tener que recargar pagina

              url:"./metodos_ajax/contactanos/enviar_correo.php", //donde se va a ingresar el mensaje "insertarMensaje.php"
              data:$("#formularioMensajes").serialize(),
              success:function(respuesta){
                  // alert(respuesta);
                  if(respuesta == 1){
                      swal("Mensaje Enviado.","Le responderemos a la brevedad","success");
                  }else{
                    swal("Ha ocurrido un error","","danger");

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
