
listarEmpresas();

function listarEmpresas(){


		$.ajax({
			url:"./metodos_ajax/empresas/mostrar_empresas.php",
			method:"POST",
			success:function(respuesta){
				 $("#contenedor_listado_empresas").html(respuesta);
			}
		});
}


function guardar_nueva_empresa(){
	swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});

	var formData = new FormData(document.getElementById("mantenedor_ingresar_empresa"));

			$.ajax({
				url:"./metodos_ajax/empresas/crear_empresa.php",
				dataType: "html",
				type:'post',
				data: formData,
				cache: false,
				contentType: false,
				processData:false,
				success:function(respuesta){
					 //alert(respuesta);
					 //console.log(respuesta);

					 if(respuesta==1){
						 swal("Guardado","Los datos se han guardado correctamente.","success");
						 eliminarCamposEmpresa();
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});

}


function modificar_empresa(){
  // alert("contador: "+$("#contadorFotos").val());
	swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});


	var formData = new FormData(document.getElementById("mantenedor_modificar_empresa"));

   $("#btn_guardar_cambios").val("GUARDANDO...");
   $("#btn_guardar_cambios").addClass("btn-danger");

			$.ajax({
				url:"./metodos_ajax/empresas/editar_empresa.php",
				dataType: "html",
				type:'post',
				data: formData,
				cache: false,
				contentType: false,
				processData:false,
				success:function(respuesta){
             // alert(respuesta);

						 if(respuesta==1){
							 swal("Guardado","Los datos se han guardado correctamente.","success");
							 listarImagenesEmpresa();

							 $(document).ready(function() {
								 $("#btn_guardar_cambios").val("GUARDAR CAMBIOS");
								 $("#btn_guardar_cambios").removeClass("btn-danger");
								 $("#btn_guardar_cambios").addClass("btn-primary");
							 });

							 // eliminarCamposEmpresa();
						 }else if(respuesta==2){
							 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");

					   }
				}
			});
}

function eliminarEmpresa(id){
	swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});


	swal({
			title: "¿Eliminar Empresa?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar!",
			cancelButtonText: "Cancelar!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function(isConfirm){
					if (isConfirm) {
			$.ajax({
				url:"./metodos_ajax/empresas/eliminar_empresa.php?id_empresa="+id,
				method:"POST",
				success:function(respuesta){
					 // alert(respuesta);
					 if(respuesta==1){
						 swal("Eliminado correctamente","Los datos se han guardado correctamente.","success");
						 listarEmpresas();
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});
		} else {
				swal("Cancelado", "", "error");
		}
		});
		}


function listarImagenesEmpresa(){


			$.ajax({
				url:"./metodos_ajax/empresas/mostrar_imagenes_empresa.php?id_empresa="+id_empresa,
				method:"POST",
				success:function(respuesta){
					$("#divInferiorImagenesActuales").html(respuesta);
				}
			});
}


function soloUnaPrincipal(id){//permite presionar solo un checkbox

	 var cantidad= $("#contadorFotos").val();


	 for(var c=1;c<=cantidad;c++){
			 $('#principal'+c).prop('checked', false);
	 }
	 $("#principal"+id).prop('checked', true);

}

function soloUnAfiche(id){//permite presionar solo un checkbox
	 var cantidad= $("#contadorFotos").val();


	 for(var c=1;c<=cantidad;c++){
			 $('#afiche'+c).prop('checked', false);
	 }
	 $("#afiche"+id).prop('checked', true);

}



function agregarCampoFoto(){
					var contadorTr=$("#tablaFotosIngreso tr").length-1;
					contadorTr++;

					//alert(contadorTr);
							$("#tablaFotosIngreso").append('<tr><td><input required class="form-control" name="foto'+contadorTr+'" type="file"></input></td><td><input class="form-control" type="checkbox" onclick="soloUnaPrincipal('+contadorTr+')" name="principal'+contadorTr+'" id="principal'+contadorTr+'"></td><td><input class="form-control" type="checkbox" onclick="soloUnAfiche('+contadorTr+')" name="afiche'+contadorTr+'" id="afiche'+contadorTr+'"></td></tr>');
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

function eliminarImagenEmpresa(idFoto){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});

					$.ajax({
						url:"./metodos_ajax/empresas/eliminar_imagen.php?id_imagen="+idFoto,
						success:function(respuesta){
							// alert(respuesta);
							 if(respuesta==1){

								 listarImagenesEmpresa();
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

function seleccionarImagenPrincipalEmpresa(idFoto,idEmpresa){
					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});
					$.ajax({
						url:"./metodos_ajax/empresas/seleccionar_imagen_principal.php?id_imagen="+idFoto+"&id_empresa="+idEmpresa,
						success:function(respuesta){
							 if(respuesta==1){
								 listarImagenesEmpresa();
								 swal("Operacion exitosa!", "Imagen Principal Cambiada", "success");
							 }
						}
					});
}

function seleccionarAficheEmpresa(idFoto,idEmpresa){

					swal({title:"Cargando", text:"Espere un momento.", showConfirmButton:false,allowOutsideClick:false,showCancelButton: false,closeOnConfirm: false});
					$.ajax({
						url:"./metodos_ajax/empresas/seleccionar_afiche_empresa.php?id_imagen="+idFoto+"&id_empresa="+idEmpresa,
						success:function(respuesta){
							 if(respuesta==1){
								 listarImagenesEmpresa();
								 swal("Operacion exitosa!", "Imagen Principal Cambiada", "success");
							 }
						}
					});
}
