<?php
@session_start();
require_once 'comun.php';
require_once './clases/Departamento.php';
require_once './clases/Usuario.php';
comprobarSession();
$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Agenda DAEM</title>
   <?php cargarHead(); ?>


  <script src="./js/scripts_agenda.js"></script>
   <script>



     $(document).ready(function() {

       var eventos_agendados=0;


            var initialLocaleCode = 'es';

            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
              },
              navLinks: true, // can click day/week names to navigate views
              <?php
                  if($usuario['tipo_usuario']==1){
                       echo "editable: true,";
                  }else{
                    echo "editable: false,";
                  }
               ?>
          			eventLimit: true, // allow "more" link when too many events
                selectable: true,
          			selectHelper: true,
              dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles',
                       'Jueves', 'Viernes', 'Sabado'],
              dayNamesShort:['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
              monthNames:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
              monthNamesShort:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
              buttonText: {
                        today:    'Hoy',
                        month:    'Mes',
                        week:     'Semana',
                        day:      'Dia',
                        list:     'Lista'
                    },
              allDayText:"Todo el dia",
              hiddenDays: [0],
              minTime:"08:00:00",
              maxTime:"22:00:00",
              firstDay:1,
              columnFormat:'ddd D',
              titleFormat:'MMMM YYYY',
              defaultView:'agendaWeek',

                       select: function(start, end){

                        $("#formulario_actividad")[0].reset();
                        $("#txt_id_actividad").val("");
                 				$("#modal_actividad #txt_inicio").val(moment(start).format('DD-MM-YYYY HH:mm'));
                 				$("#modal_actividad #txt_fin").val(moment(end).format('DD-MM-YYYY HH:mm'));
                        $("#btn_eliminar_actividad").addClass("d-none");

                 				$("#modal_actividad").modal('show');

                 			},
                 			eventRender: function(event, element){
                 				element.bind('click', function(){
                 					$('#modal_actividad #txt_id_actividad').val(event.id);
                 					$('#modal_actividad #txt_descripcion_actividad').val(event.title);
                 					$('#modal_actividad #txt_lugar_actividad').val(event.lugar);
                          $("#btn_eliminar_actividad").removeClass("d-none");

                          $("#modal_actividad #txt_inicio").val(event.start.format('DD-MM-YYYY HH:mm'));
                   				$("#modal_actividad #txt_fin").val(event.end.format('DD-MM-YYYY HH:mm'));

                           <?php
                        //PERMITE QUE SOLO PUEDA EDITAR LAS ACTIVIDADES EL DEPARTAMENTO QUE LAS CREO

                        //consulta el tipo de usuario logeado para permitirle al usuario editar solo los evento que el ha creado
                        echo "var departamento_usuario_logeado = ".$usuario['departamento'].";";?>

                             if(departamento_usuario_logeado==event.id_departamento){

                               $("#modal_actividad").modal('show');

                             }else{
                               // swal("No permitido","No tiene permisos para modificar este evento","info");
                               $('#modal_informacion_actividad #txt_descripcion_informacion').val(event.title);
                               $('#modal_informacion_actividad #txt_lugar_informacion').val(event.lugar);

                               $("#modal_informacion_actividad #txt_inicio_informacion").val(event.start.format('DD-MM-YYYY HH:mm'));
                               $("#modal_informacion_actividad #txt_fin_informacion").val(event.end.format('DD-MM-YYYY HH:mm'));

                               $("#modal_informacion_actividad").modal('show');

                             }

                 				});
                 			},
                 			eventDrop: function(event, delta, revertFunc) { // si changement de position

                 				modificarFechaActividad(event.id,event.start.format(),event.end.format());

                 			},
                 			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                        modificarFechaActividad(event.id,event.start.format(),event.end.format());

                 			},


              events:[
                        {
                         id: '1',
                         title: 'hola',
                         start: '2018-04-02 13:00',
                         end: '2018-04-02 14:00',
                       },
                   ],

            });
         });

$(document).ready(function(){
  actualizarEventos(false);
});

   </script>

   <style>


     #calendar {
       /* max-width: 900px;
       margin: 0 auto; */
     }

   </style>
</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>



<div class="container-fluid">
  <div class="row">
      <div class="col-12 col-md-3">



        <div class="card text-dark">
          <div class="card-header ">
              OPCIONES
          </div>
          <div class="card-body">
                  <button onclick="actualizarEventos(false)" class="btn btn-info btn-sm col-12">Agenda completa<span class="glyphicon glyphicon-chevron-right"></span></button>
                  <hr>
                  <!-- <button onclick="actualizarEventos(true)" class="btn btn-info btn-sm col-12">Agenda de mi departamento<span class="glyphicon glyphicon-chevron-right"></span></button> -->
              </div>
        </div>

        <div class="card text-dark">
          <div class="card-header ">
              SIMBOLOGIA
          </div>
          <div class="card-body">
            <?php
              $departamento = new Departamento();
              $listadoDepartamento= $departamento->obtenerDepartamentos();

                while($filas= $listadoDepartamento->fetch_array()){
                    echo '<span class="badge badge-pill" style="background-color:'.$filas['color_simbologia'].';">&nbsp;</span>'.$filas['nombre_departamento'].'</span></br>';
                }

             ?>
          </div>
        </div>

      </div>

       <div class="col-12 col-md-9">

              <div id='calendar' style="" class=" card col-12"></div>

       </div>
  </div>

</div>



<div>
  <hr>
</div>





  <!-- Modal -->
  <div class="modal fade" id="modal_actividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
    <form class="form-horizontal" id="formulario_actividad" method="POST" action="javascript:crearModificarActividad()">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Agregar nueva actividad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">


                <div class="form-group" >
                    <label for="title" class="col-12 control-label">Descripcion de actividad</label>
                    <div class="col-12">
                        <textarea required class="form-control" name="txt_descripcion_actividad" id="txt_descripcion_actividad" rows="4" ></textarea>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="title" class="col-12 control-label">Lugar donde se realizará la actividad</label>
                    <div class="col-12">
                        <textarea required class="form-control" name="txt_lugar_actividad" id="txt_lugar_actividad" rows="4" ></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-6">
                      <label for="start" class="col-12 control-label">Fecha Inicial</label>
                      <div class="col-12">
                        <input type="text" name="txt_inicio" class="form-control" id="txt_inicio" readonly>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="end" class="col-12 control-label">Fecha Final</label>
                      <div class="col-12">
                        <input type="text" name="txt_fin" class="form-control" id="txt_fin" readonly>
                      </div>
                    </div>

                </div>

                <div class="">
                  <hr>
                </div>

                <div class="form-group card border-info" >
                  <center>
                    <label for="title" class="col-12 control-label"><strong>Se enviará una notificación a Direccion</strong></label>
                  </center>
                </div>

                <input type="hidden" name="txt_id_actividad" id="txt_id_actividad">

      </div>
      <div class="modal-footer">

            <button type="button" id="btn_eliminar_actividad" class="col-md-6 btn btn-danger btn-block d-none" onclick="eliminarActividad()" data-dismiss="modal">Eliminar</button>
            <button type="submit" class="col-md-6 btn btn-primary btn-block">Guardar</button>


      </div>

    </form>

    </div>
    </div>
  </div>

  <!-- MODAL INFORMACION DE ACTVIDAD-->
  <div class="modal fade" id="modal_informacion_actividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Información de actividad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">


                <div class="form-group" >
                    <label for="title" class="col-12 control-label">Descripcion de actividad</label>
                    <div class="col-12">
                        <textarea readonly class="form-control" name="txt_descripcion_informacion" id="txt_descripcion_informacion" rows="4" ></textarea>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="title" class="col-12 control-label">Lugar donde se realizará la actividad</label>
                    <div class="col-12">
                        <textarea readonly class="form-control" name="txt_lugar_informacion" id="txt_lugar_informacion" rows="4" ></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-6">
                      <label for="start" class="col-12 control-label">Fecha Inicial</label>
                      <div class="col-12">
                        <input type="text" name="txt_inicio_informacion" class="form-control" id="txt_inicio_informacion" readonly>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="end" class="col-12 control-label">Fecha Final</label>
                      <div class="col-12">
                        <input type="text" name="txt_fin_informacion" class="form-control" id="txt_fin_informacion" readonly>
                      </div>
                    </div>

                </div>



      </div>


    </div>
    </div>
  </div>



 <div id="contenedor_prueba"></div>

  <!-- <script src="./js/crear_documento.js"></script> -->


</body>
</html>
