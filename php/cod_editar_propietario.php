<?php 
include '../php/conexion.php';
/**
 * Se definen 9 variables
 * @var String $identificacion_propietario
 * @var String $nombre_1_p
 * @var String $nombre_2_p
 * @var String $apellido_1_p
 * @var String $apellido_2_p
 * @var String $email_propietario_p
 * @var String $direccion_p
 * @var String $celular_1_p
 * @var String $usuario_propietario_p
 */
if (isset($_POST['btn_actualizar'])){
$identificacion_propietario = $_POST['identificacionpropietario'];
$nombre_1_p = $_POST['nombre1'];
$nombre_2_p = $_POST['nombre2'];
$apellido_1_p = $_POST['apellido1'];
$apellido_2_p = $_POST['apellido2'];
$email_propietario_p = $_POST['emailpropietario'];
$direccion_p = $_POST['direccion'];
$celular_1_p = $_POST['celular1'];
$usuario_propietario_p = $_POST['usuario_propietario'];
/**
 * Sentencia sql para  actualizar datos en la tabla propietario
 */
   $insert=mysqli_query($conexion,"UPDATE tbl_propietario SET nombre_1='$nombre_1_p',nombre_2 ='$nombre_2_p',
   apellido_1 ='$apellido_1_p',apellido_2 ='$apellido_2_p',email_propietario = '$email_propietario_p',
   direccion = '$direccion_p',celular_1 = '$celular_1_p',usuario_propietario = '$usuario_propietario_p'
    WHERE identificacion_propietario='$identificacion_propietario'") or die (mysqli_error($conexion));

    header('location: ../vistas/perfil_propietario.php');
}
?>