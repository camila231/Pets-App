<?php 
include '../php/conexion.php';
/**
 * Se definen 8 variables
 * @var String $identificacion_veterinario_v
 * @var String $nombre_1_v
 * @var String $nombre_2_v
 * @var String $apellido_1_v
 * @var String $apellido_2_v
 * @var String $email_veterinario_v
 * @var String $celular_1_v
 * @var String $telefono_1_v
 */
if (isset($_POST['btn'])){
$identificacion_veterinario_v = $_POST['identificacionveterinario'];
$nombre_1_v = $_POST['nombre1'];
$nombre_2_v = $_POST['nombre2'];
$apellido_1_v = $_POST['apellido1'];
$apellido_2_v = $_POST['apellido2'];
$email_veterinario_v = $_POST['emailveterinario'];
$celular_1_v = $_POST['celular1'];
$telefono_1_v =$_POST['telefono1'];
/**
 * Sentencia sql para actualizar datos de la tabla veterinario
 */
  mysqli_query($conexion,"UPDATE tbl_veterinario SET nombre_1='$nombre_1_v',nombre_2 ='$nombre_2_v',
   apellido_1 ='$apellido_1_v',apellido_2 ='$apellido_2_v',email_veterinario= '$email_veterinario_v'
   ,celular_1 = '$celular_1_v',telefono_1 = '$telefono_1_v'
   WHERE identificacion_veterinario='$identificacion_veterinario_v'") or die (mysqli_error($conexion));
  echo "<script>alert('Se actualizo exitosamente..')</script>";
  echo "<script> window.location = '../vistas/perfil_veterinario.php'</script>";
}
?>