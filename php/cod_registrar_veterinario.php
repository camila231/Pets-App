
<?php
include "conexion.php";
/**
 * Se definen 11 variables
 * @var String $identificacion_veterinario
 * @var String $nombre_1
 * @var String $nombre_2
 * @var String $apellido_1
 * @var String $apellido_2
 * @var String $email_veterinario
 * @var String $telefono_1
 * @var String $celular_1
 * @var String $usuario_veterinario
 * @var String $clave_veterinario
 * @var String $estado
 */
$identificacion_veterinario = $_POST['identificacionveterinario'];
$nombre_1 = $_POST['nombre1'];
$nombre_2 = $_POST['nombre2'];
$apellido_1 = $_POST['apellido1'];
$apellido_2 = $_POST['apellido2'];
$email_veterinario = $_POST['emailveterinario'];
$telefono_1 = $_POST['telefono1'];
$celular_1 = $_POST['celular1'];
$usuario_veterinario = $_POST['usuarioveterinario'];
$clave_veterinario = $_POST['claveveterinario'];
$estado = 'Disponible';

$confirmarclave = $_POST['confirmarclave'];
/**
 * Si clave veterinario es igual a confirmar clave
 */
    if ($clave_veterinario == $confirmarclave) {
/**
 * Sentencia sql para insertar datos de la tabla veterinario
 */
        mysqli_query($conexion ,"INSERT INTO tbl_veterinario (identificacion_veterinario,nombre_1,nombre_2,
        apellido_1,apellido_2,email_veterinario,telefono_1,celular_1,usuario_veterinario,clave_veterinario,estado)
         VALUES ('$identificacion_veterinario','$nombre_1','$nombre_2','$apellido_1','$apellido_2',
         '$email_veterinario','$telefono_1','$celular_1','$usuario_veterinario','$clave_veterinario','$estado')"
         ) or die (mysqli_error($conexion));
        
 echo "<script>alert('Se registro exitosamente.')</script>";
 echo "<script> window.location = '../vistas/inicio_de_sesion.php'</script>";

}
/**
 * Sino se inserta correctamente va mostrar error
 */
else{
   echo "Error";
}
?>