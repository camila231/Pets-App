<?php
include '../php/conexion.php';

require '../librerias/Exception.php';
require '../librerias/PHPMailer.php';
require '../librerias/SMTP.php';

if(isset($_POST['btn_solicitar'])){
    $direccion = $_POST['direccion'];
    $tipo_Consulta = $_POST['tipo_Consulta'];
    $identificacion_propietario = $_POST['identificacion_propietario'];
    $barrio = $_POST['barrio'];

    $body ="EL propietario identificado con " . $identificacion_propietario . "<br>Ubicado en " . $direccion . "<br>En el barrio " . $barrio . "<br>A solicitado el tipo de consulta para " . $tipo_Consulta;
    $query = mysqli_query($conexion,"INSERT INTO tbl_solicitar_cita(direccion,tipo_Consulta,identificacion_propietario,barrio) VALUES ('$direccion','$tipo_Consulta','$identificacion_propietario','$barrio')") or die(mysqli_error($conexion));    

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
            echo "<script> window.location = '../vistas/solicitar_cita.php'</script>";
        }   
      } catch (Exception $e){
          echo 'hubo un error al enviar el mensaje', $mail->ErrorInfo;
      }
 
    }
?>