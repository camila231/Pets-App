<?php
include '../php/conexion.php';
/**
 * Librerias para utilizar el PhpMailer
 */
require '../librerias/Exception.php';
require '../librerias/PHPMailer.php';
require '../librerias/SMTP.php';
/**
 * Se definen 5 variable
 * @var String $direccion
 * @var String $tipo_Consulta
 * @var String $identificacion_propietario
 * @var String $barrio
 * @var Integer $leido
 */
if(isset($_POST['btn_solicitar'])){
    $direccion = $_POST['direccion'];
    $tipo_Consulta = $_POST['tipo_Consulta'];
    $identificacion_propietario = $_POST['identificacion_propietario'];
    $barrio = $_POST['barrio'];
    $leido = 0;
/**
 * Cuerpo del mensaje
 */
    $body ="EL propietario identificado con " . $identificacion_propietario . "<br>Ubicado en " . $direccion . "<br>
    En el barrio " . $barrio . "<br>A solicitado el tipo de consulta para " . $tipo_Consulta;
    $query = mysqli_query($conexion,"INSERT INTO tbl_solicitar_cita(direccion,tipo_Consulta,identificacion_propietario,barrio,leido) VALUES ('$direccion','$tipo_Consulta','$identificacion_propietario','$barrio','$leido')") or die(mysqli_error($conexion));    
/**
 * Consulta de la tabla veterinario
 */
    $query = mysqli_query($conexion, "SELECT * FROM tbl_veterinario");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
      try{
/**
 * Para usar el SMTP
 */
        $mail->isSMTP();
/**
 * Habilitar el Debug
 */
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
/**
 * Habilitar autenticacion SMTP
 */
        $mail->SMTPAuth = true;
/**
 * Puerto
 */
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
/**
 * Usuario del correo que se va utilizar para el envio
 */
        $mail->Username = "kevinparra2709@gmail.com";
/**
 * Clave del correo que se va utilizar para el emvio
 */
        $mail->Password = "3117027938kevin";
/**
 * El mismo usuario del Username para ejecutar correctamente el correo PHP
 */
        $mail->setFrom('kevinparra2709@gmail.com', "PETS APP");
        while($correos=mysqli_fetch_array($query)){
/**
 * Los correos donde va a llegar el mensaje 
 */
          $mail->addAddress($correos['email_veterinario'],"<br>");
      }
/**
 * Establece el tipo de mensaje a HTML
 */
        $mail->isHTML(true);
/**
 * El asusto del mensaje
 */
        $mail->Subject = "Hola, te estamos contactando desde PETS APP";
/**
 * Cuerpo del mensaje
 */
        $mail->Body = "$body";
        $mail-> CharSet = 'UTF8';     
/**
 * Envia el mensaje
 */
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