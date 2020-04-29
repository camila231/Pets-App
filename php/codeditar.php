<?php 
include '../php/conexion.php';
/**
 * Se definen 8 variables
 * @var Integer $codigo_de_mascota
 * @var Date $fecha_consulta
 * @var String $nombre_mascota
 * @var Date $fecha_de_nacimiento
 * @var String $raza
 * @var String $sexo
 * @var String $diagnostico_mascota
 * @var String $motivo_consulta
 */
$codigo_de_mascota =$_POST['codigo_mascota_editar'];
$fecha_consulta =$_POST['fecha_editar'];
$nombre_mascota=$_POST['nombre_mascota_editar'];
$fecha_de_nacimiento =$_POST['fecha_nacimiento_editar'];
$raza = $_POST['raza_editar'];
$sexo =$_POST['sexo_editar'];
$diagnostico_mascota =$_POST['diagnostico_editar'];
$motivo_consulta =$_POST['motivo_editar'];
/**
 * Sentencia sql para actualizar datos de la tabla historia clínica
 */
   $sql = "UPDATE tbl_historia_clinica SET fecha_consulta='$fecha_consulta',nombre_mascota ='$nombre_mascota',
   fecha_de_nacimiento ='$fecha_de_nacimiento',raza = '$raza',sexo ='$sexo',diagnostico_mascota='$diagnostico_mascota',
   motivo_consulta ='$motivo_consulta' WHERE codigo_de_mascota='$codigo_de_mascota'";
   $result = mysqli_query($conexion,$sql) or die (mysqli_error($conexion)); 
   echo "<script>alert('Historia clínica actualizada exitosamente.')</script>";
   echo "<script> window.location = '../vistas/ver_historia_clinica.php'</script>";

?>