<?php

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    require_once '../../clases/Conexion.php';


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
      $mail->Username = 'marketing@todomasfacil.cl';   // SMTP username
      $mail->Password = 'todomasfacil30';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                               // TCP port to connect to





        //recibimos variables del formulario
        $nombre_recibido = $_REQUEST['nombre'];
        $apellido_recibido = $_REQUEST['apellido'];
        $correo_recibido = $_REQUEST['correo'];
        $mensaje_recibido = $_REQUEST['mensaje'];

        //Recipients
        $mail->setFrom('marketing@todomasfacil.cl', 'Contacto www.todomasfacil.cl '.$nombre_recibido);
        $mail->addAddress('marketing@todomasfacil.cl','Marketing');
        $mail->addAddress('billy.salazar1992@gmail.com','Marketing');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contacto desde www.todomasfacil.cl';


        $mail->Body    = "Nombre del contacto: ".$nombre_recibido." ".$apellido_recibido." del correo ".$correo_recibido." ha escrito el siguiente mensaje: ".$mensaje_recibido;
        $mail->AltBody = 'Si no puede ver el contenido de este correo contactese al administrador del sistema.';

        $mail->send();

        echo "1";

    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }


 ?>
