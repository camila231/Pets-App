<?php
include "conexion.php";
/**
 * Se definen 11 variables
 * @var String $identificacion_propietario
 * @var String $nombre_1
 * @var String $nombre_2
 * @var String $apellido_1
 * @var String $apellido_2
 * @var String $email_propietario
 * @var String $direccion
 * @var String $celular_1
 * @var String $usuario_propietario
 * @var String $clave_propietario
 * @var String $confirmar
 */
	if (isset($_POST['btn'])) {
		$identificacion_propietario = $_POST['identificacionpropietario'];
		$nombre_1 = $_POST['nombre1'];
		$nombre_2 = $_POST['nombre2'];
		$apellido_1 = $_POST['apellido1'];
		$apellido_2 = $_POST['apellido2'];
		$email_propietario = $_POST['emailpropietario'];
		$direccion = $_POST['direccion'];
		$celular_1 = $_POST['celular1'];
		$usuario_propietario = $_POST['usuariopropietario'];
		$clave_propietario = $_POST['clavepropietario'];
		$confirmar = $_POST['verificarcontraseña'];	
	}
/**
 * Si la clave propietario es igual a confirmar
 */
if ($clave_propietario == $confirmar) {
/**
 * Sentencia sql para insertar datos en la tabla propietario
 */
    mysqli_query($conexion ,"INSERT INTO tbl_propietario (identificacion_propietario,nombre_1,nombre_2,apellido_1,apellido_2,email_propietario,direccion,celular_1,usuario_propietario,clave_propietario)
     VALUES ('$identificacion_propietario','$nombre_1','$nombre_2','$apellido_1','$apellido_2',
     '$email_propietario','$direccion','$celular_1','$usuario_propietario','$clave_propietario')")or 
     die (mysqli_error($conexion));
	 echo "<script>alert('Se registro exitosamente.')</script>";
	 echo "<script> window.location = '../vistas/inicio_de_sesion.php'</script>";
	}
/**
 * Sino se inserta correctamente,marca error
 */
	else{
	   echo "Error";
	}
?>