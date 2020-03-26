<?php
require '../php/conexion.php';
require '../librerias/Exception.php';
require '../librerias/PHPMailer.php';
require '../librerias/SMTP.php';
if(isset($_POST['enviar'])){
  $email = $conexion ->real_escape_string($_POST['email']);
  $rol = $_POST['rol'];
  if($rol == 'propietario') {
  $propietario = mysqli_query ($conexion, "SELECT * FROM tbl_propietario where email_propietario = '$email'");
  if(mysqli_num_rows ($propietario) == 1) {
    $nombre =mysqli_fetch_array($propietario);
    $token = uniqid();
    $actualizar = $conexion ->query("UPDATE tbl_propietario SET token = '$token' WHERE email_propietario = '$email'");
    $ruta = 'http://localhost/Pets_App/vistas/nueva_clave.php?nombre='.$nombre['nombre_1']."&token".$nombre['token'];
    $mensaje = "Código para recuperar su contraseña" ." ".$token. " ". "<a href='$ruta'>Para cambiar tu contraseña da click aquí</a>";
  }else{
  echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
  echo "<script>window.location='..';</script>";
  }
  }
  if($rol == 'veterinario') {
    $veterinario = mysqli_query ($conexion, "SELECT * FROM tbl_veterinario where email_veterinario = '$email'");
    if(mysqli_num_rows ($veterinario) == 1) {
      $nombre =mysqli_fetch_array($veterinario);
      $token = uniqid();
      $actualizar = $conexion ->query("UPDATE tbl_veterinario SET token = '$token' WHERE email_veterinario = '$email'");
      $ruta = 'http://localhost/App_nuevo/vistas/nueva_clave.php?nombre='.$nombre['nombre_1']."&token".$nombre['token'];
      $mensaje = "Código para recuperar su contraseña" ." ".$token. " ". "<a href='$ruta'>Para cambiar tu contraseña da click aquí</a>";
    }else{
    echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
    echo "<script>window.location='..';</script>";
    }
    }
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
			  $mail->addAddress($email);
			  $mail->isHTML(true);
			  $mail->Subject = "Cambiar contraseña";
			  $mail->Body = "$mensaje";
			  $mail-> CharSet = 'UTF8';     
			  $mail->send();
			  if ($mail) {
				echo "<script> alert ('El correo se envio correctamente'); </script>";
        echo "<script>window.location = '../vistas/inicio_de_sesion.php'</script>";
			  }   
			} catch (Exception $e){
				echo 'hubo un error al enviar el mensaje', $mail->ErrorInfo;
			}
	   
		  }
	  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <link  href="../css/inicio_de_sesion.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Inicio de sesión</title>
</head>
<body>
<?php require_once '../header/header.php'; ?>
    <div class="INICIO">
                           <h4>Inicio de sesión</h4>
                           <br>
                           <form action="../php/cod_inicio_de_sesion.php" method="POST">
                             <input type="text" placeholder="Ingrese su usuario" name="usuario" id="usuario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
                             <input type="password" placeholder="Ingrese su contraseña" name="password" id="password" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
                             <select class="rol" name="rol">
                               <option  disabled selected>Rol</option>
                               <option value="propietario" >Propietario</option>
                               <option value="veterinario" >Veterinario</option>
                             </select>
                             <br>
                             <input id="boton" type="submit" value="Iniciar sesión">
                             <center><div class="reset-password" style="margin-top:-9px;">
                              <a href="../vistas/recuperar_clave.php">Olvide mi contraseña</a>
                              </div> </center>
                            </form>
                         </div>    
</body>
</html>