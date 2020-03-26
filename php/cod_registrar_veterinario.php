
<?php
include "conexion.php";
//obtener los valores del formulario
	
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
$estado = 'activar';

$confirmarclave = $_POST['confirmarclave'];

    if ($clave_veterinario == $confirmarclave) {

        mysqli_query($conexion ,"INSERT INTO tbl_veterinario (identificacion_veterinario,nombre_1,nombre_2,
        apellido_1,apellido_2,email_veterinario,telefono_1,celular_1,usuario_veterinario,clave_veterinario,estado)
         VALUES ('$identificacion_veterinario','$nombre_1','$nombre_2','$apellido_1','$apellido_2',
         '$email_veterinario','$telefono_1','$celular_1','$usuario_veterinario','$clave_veterinario','$estado')"
         ) or die (mysqli_error($conexion));
        
 echo "<script>alert('Se registro exitosamente.')</script>";
 echo "<script> window.location = '../vistas/inicio_de_sesion.php'</script>";

}
else{
   echo "Error";
}



?>