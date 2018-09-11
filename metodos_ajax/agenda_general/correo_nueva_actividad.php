<?php

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    require_once '../../clases/Conexion.php';

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

function enviarCorreoNuevaActividad($arg_departamento,$arg_descripcion,$arg_lugar,$arg_fecha){


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();
      $mail->CharSet = 'UTF-8';                                // Set mailer to use SMTP
      $mail->Host = 'secureus148.sgcpanel.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'agenda@daemmulchen.cl';   // SMTP username
      $mail->Password = 'Agenda_daem123';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                               // TCP port to connect to




        //Recipients
        $mail->setFrom('agenda@daemmulchen.cl', 'Agenda DAEM');

        //buscar usuarios del departamento direccion para enviarle los correos
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
        $listaUsuariosDireccion = $conexion->query("select nombre, correo from tb_usuarios where departamento=1");

        while($filas = $listaUsuariosDireccion->fetch_array()){
          $mail->addAddress($filas['correo'], $filas['nombre']);
        }

        //Content
        $mensaje = 'El departamento "'.$arg_departamento.'" ha agendado la siguiente actividad: "'.$arg_descripcion.'". Dicha actividad se llevará a cabo el '.$arg_fecha.' en "'.$arg_lugar.'".';

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Aviso de nueva actividad agendada.';
        $mail->Body    = $mensaje;
        $mail->AltBody = 'Si no puede ver el contenido de este correo contactese al administrador del sistema.';

        $mail->send();
        // echo 'El mensaje ha sido enviado';


    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

 ?>
