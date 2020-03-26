<?php 
include '../php/conexion.php';

$codigo_de_mascota =$_POST['codigo_mascota_editar'];
$fecha_consulta =$_POST['fecha_editar'];
$nombre_mascota=$_POST['nombre_mascota_editar'];
$fecha_de_nacimiento =$_POST['fecha_nacimiento_editar'];
$raza = $_POST['raza_editar'];
$sexo =$_POST['sexo_editar'];
$diagnostico_mascota =$_POST['diagnostico_editar'];
$motivo_consulta =$_POST['motivo_editar'];

   // process form
   $link = mysqli_connect("localhost", "root","","pets_app");
   /* $sql = "SELECT * FROM tbl_historia_clinica WHERE codigo_de_mascota = $codigo_de_mascota";
   $result = mysqli_query($link,$sql); */
   $sql = "UPDATE tbl_historia_clinica SET fecha_consulta='$fecha_consulta',nombre_mascota ='$nombre_mascota',
   fecha_de_nacimiento ='$fecha_de_nacimiento',raza = '$raza',sexo ='$sexo',diagnostico_mascota='$diagnostico_mascota',
   motivo_consulta ='$motivo_consulta' WHERE codigo_de_mascota='$codigo_de_mascota'";
   $result = mysqli_query($link,$sql) or die (mysqli_error($link)); 

   echo "<script>alert('Historia clínica actualizada exitosamente.')</script>";
   echo "<script> window.location = '../vistas/ver_historia_clinica.php'</script>";

?>