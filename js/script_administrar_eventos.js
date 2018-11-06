

function listarImagenesEventos(){


			$.ajax({
				url:"./metodos_ajax/eventos/mostrar_eventos.php",
				method:"POST",
				success:function(respuesta){
					$("#contedorImgEventos").html(respuesta);
				}
			});
}


function agregar_eventos(){

	var formData = new FormData(document.getElementById("formulario_eventos_imagen"));

			$.ajax({
				url:"./metodos_ajax/eventos/crear_eventos.php",
				dataType: "html",
				type:'post',
				data: formData,
				cache: false,
				contentType: false,
				processData:false,
				success:function(respuesta){
					 alert(respuesta);

					 if(respuesta==1){
						 swal("Guardado","Los datos se han guardado correctamente.","success");
						 listarImagenesEventos();
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});

}


function soloUnaPrincipal(id){//permite presionar solo un checkbox
	 var cantidad= $("#contadorFotos").val();

	 for(var c=1;c<=cantidad;c++){
			 $('#tipoFoto'+c).prop('checked', false);
	 }
	 $("#tipoFoto"+id).prop('checked', true);

}



function agregarCampoFoto(){
					var contadorTr=$("#tablaFotosIngreso tr").length-1;
					contadorTr++;

					//alert(contadorTr);
							$("#tablaFotosIngreso").append('<tr><td><input required class="form-control" name="foto'+contadorTr+'" type="file"></input></td><td><input class="form-control" type="checkbox" onclick="soloUnaPrincipal('+contadorTr+')" name="principal'+contadorTr+'" id="principal'+contadorTr+'"></td><td><input class="form-control" type="checkbox" onclick="soloUnaPrincipal('+contadorTr+')" name="afiche'+contadorTr+'" id="afiche'+contadorTr+'"></td></tr>');
							$("#contadorFotos").val(contadorTr);
}


function removerCampoFoto(){
						 var cantidad= $("#contadorFotos").val();

						 if(cantidad!=0){
								 $("#tablaFotosIngreso tr:last").remove();

									cantidad--;
									 $("#contadorFotos").val(cantidad);
							}
}

function eliminarImagenEmpresa(idEventos){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:true,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});

					$.ajax({
						url:"./metodos_ajax/eventos/eliminar_imagen.php?id_eventos="+idEventos,
						success:function(respuesta){
							alert(respuesta);
							 if(respuesta==1){
								 listarImagenesEventos();
								 swal("Operacion exitosa!", "Imagen Eliminada", "success");
							 }
							 else if(respuesta==2){
								 swal("Empresa debe tener al menos una imagen!", "", "warning");
							 }
							 else{
								 swal("Operacion exitosa!", "Imagen Eliminada", "success");
							 }
						}
					});
}

function fotoPrincipal(idFoto,run){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:true,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});
					$.ajax({
						url:"controladorMantenedores.php?mant=7&func=6",
						data:"idFoto="+idFoto+"&run="+run,
						success:function(respuesta){
							 if(respuesta==1){
								 cargarImagenesActuales(run);
								 swal("Operacion exitosa!", "Imagen Principal Cambiada", "success");
							 }
						}
					});
}
