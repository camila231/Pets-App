<?php

    include "conexion.php";

    require '../librerias/Exception.php';
    require '../librerias/PHPMailer.php';
    require '../librerias/SMTP.php';

    try{
        if (isset($_POST['btn_recuperar'])) {
            $clave_propietario = substr(md5(microtime()), 1, 10);
            $email= $_POST['email'];
        }

        $sql = "UPDATE tbl_propietario SET email='$email' WHERE email_propietario='$email'";

        if ($sql) {
            echo "<script> alert ('Se actualizo correctamente');</script>";
        }else{
            echo "Error";
        }
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $To = $_POST['email'];
        $From = "From: " . "Masterhouse";
        $Subject = "Recordar contraseña";
        $Message = "El sistema le asigno la siguiente clave" . $pass;

        mail($To,$Subject,$Message,$From);
        echo 'Correo enviado satisfactoriamente a ' . $_POST['mail'];

    }catch(Exception $e){
        echo 'Error: ', $e->getMessage(), "\n";

    }

?>