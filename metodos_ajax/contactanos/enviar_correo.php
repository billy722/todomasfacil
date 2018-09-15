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
      $mail->Host = 'a2plcpnl0592.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'formulario_contacto@todomasfacil.cl';   // SMTP username
      $mail->Password = 'todomasfacil123';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                               // TCP port to connect to




        //Recipients
        $mail->setFrom('contacto@todomasfacil.cl', 'Contacto');
        $mail->addAddress('ceaceajohnny@gmail.com','Johnnyto');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contacto desde www.todomasfacil.cl';

        //recibimos variables del formulario
        $nombre_recibido = $_REQUEST['nombre'];
        $apellido_recibido = $_REQUEST['nombre'];
        $correo_recibido = $_REQUEST['nombre'];
        $mensaje_recibido = $_REQUEST['nombre'];



        $mail->Body    = "Nombre del contacto: ".$nombre_recibido." ".$apellido_recibido." del correo ".$correo_recibido." ha escrito el siguiente mensaje: ".$mensaje_recibido;
        $mail->AltBody = 'Si no puede ver el contenido de este correo contactese al administrador del sistema.';

        $mail->send();

        echo "1";

    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }


 ?>
