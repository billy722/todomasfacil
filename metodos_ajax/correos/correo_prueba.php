<?php

function enviarCorreoNuevaActividad($arg_departamento,$arg_descripcion,$arg_lugar){

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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
        $mail->addAddress('billy.salazar1992@gmail.com', 'billy');     // Add a recipient
        // $mail->addCC($correoAlcaldia['correo_copia']);
        // $mail->addAddress('billy.salazar1992@gmail.com');               // Name is optional
        // $mail->addReplyTo('bill_722@icloud.com', 'Information');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mensaje = 'El departamento "'.$arg_departamento.'" ha agendado la siguiente actividad: "'.$arg_descripcion.'". Dicha actividad se llevará a cabo en "'.$arg_lugar.'".';

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Aviso de nueva actividad agendada.';
        $mail->Body    = $mensaje;
        $mail->AltBody = 'Si no puede ver el contenido de este correo contactese al administrador del sistema.';

        $mail->send();
        echo 'El mensaje ha sido enviado';


    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

 ?>
