<?php
include '../php/conexion.php';

require '../php/Exception.php';
require '../php/PHPMailer.php';
require '../php/SMTP.php';

if(isset($_POST['btn_reservar'])){
    $identificacion_propietario = $_POST['identificacion_propietario'];
    $direccion_reserva = $_POST['direccion_reserva'];
    $barrio_reserva = $_POST['barrio_reserva'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $tipo_Consulta = $_POST['tipo_Consulta'];
    $veterinario = $_POST['veterinario'];

    $body ="El propietario identificado con " . $identificacion_propietario . "<br>Ubicado en " . $direccion_reserva . "<br>En el barrio ". $barrio_reserva . "<br>A solicitado el tipo de consulta de " . $tipo_Consulta . "<br>Para el dia " . $fecha_reserva . "<br>A la hora " . $hora_reserva;
    $query = mysqli_query($conexion,"INSERT INTO tbl_reservar_cita(direccion_reserva,barrio_reserva,fecha_reserva,hora_reserva,tipo_Consulta,identificacion_propietario) VALUES ('$direccion_reserva','$barrio_reserva','$fecha_reserva','$hora_reserva','$tipo_Consulta','$veterinario','$identificacion_propietario')") or die(mysqli_error($conexion));    

    $query = mysqli_query($conexion, "SELECT * FROM tbl_veterinario");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
      try{  
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        
        $mail->SMTPSecure = 'tls';
        $mail->Username = "kevinparra2709@gmail.com";
        $mail->Password = "3117027938kevin";
        $mail->setFrom('kevinparra2709@gmail.com', "PETS APP");
        while($correos=mysqli_fetch_array($query)){
          $mail->addAddress($correos['email_veterinario'],"<br>");
      }
        $mail->isHTML(true);
        $mail->Subject = "Hola, te estamos contactando desde PETS APP";
        $mail->Body = "$body";
        $mail-> CharSet = 'UTF8';     
        $mail->send();
        if ($mail) {
            echo "<script> alert ('El mensaje se envio correctamente'); </script>";
            echo "<script> window.location = '../vistas/reservar_cita.php'</script>";
        }   
      } catch (Exception $e){
          echo 'hubo un error al enviar el mensaje', $mail->ErrorInfo;
      }
 
    }
?>