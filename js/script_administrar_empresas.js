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


			$.ajax({
				url:"./metodos_ajax/empresas/crear_empresa.php",
				method:"POST",
				data: $("#mantenedor_ingresar_empresa").serialize(),
				success:function(respuesta){
					 // alert(respuesta);

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

			$.ajax({
				url:"./metodos_ajax/empresas/editar_empresa.php",
				method:"POST",
				data: $("#mantenedor_modificar_empresa").serialize(),
				success:function(respuesta){
					 alert(respuesta);

					 if(respuesta==1){
						 swal("Guardado","Los datos se han guardado correctamente.","success");
						 listarEmpresas();
						 eliminarCamposEmpresa();
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");

				   }
				}
			});
}

function eliminarEmpresa(id){

	swal({
			title: "¿Eliminar Usuario?",
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
