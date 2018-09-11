<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="./js/jquery-3.1.0.min.js"></script>

</head>
<body>

<label for="">Ingrese rut</label>
<input type="text" id="txt_rut">
<label for="">Ingrese clave</label>
<input type="password" id="txt_clave">
<input onclick="generarClave()" type="button" value="GENERAR CLAVE">

<script>
  function generarClave(){
     var rut=$("#txt_rut").val();
     var clave=$("#txt_clave").val();
// alert(rut);
// alert(clave);
     $.ajax({
       url:"./metodos_ajax/generador_claves.php?rut="+rut+"&clave="+clave,
       success:function(respuesta){
          alert(respuesta);
       }
     });
   }
</script>


</body>
</html>
