<?php 
include 'conexion.php';

if (isset($_POST['btn_actualizar'])){
$codigo_mascota = $_POST['codigo'];
$nombre_mascota_e = $_POST['nombre_mascota'];
$raza_mascota_e = $_POST['raza_mascota'];
$color_mascota_e = $_POST['color_mascota'];
$tamano_mascota_e = $_POST['tamano_mascota'];
$fecha_nacimiento_e = $_POST['fecha_nacimiento_mascota'];
// $foto_mascota_e = $_POST['foto_mascota'];

   $insert=mysqli_query($conexion,"UPDATE tbl_mascota SET nombre_mascota='$nombre_mascota_e',raza_mascota ='$raza_mascota_e',
   color_mascota ='$color_mascota_e',tamano_mascota ='$tamano_mascota_e',fecha_nacimiento = '$fecha_nacimiento_e'
    WHERE codigo_mascota='$codigo_mascota'") or die (mysqli_error($conexion));
    header ('location: ../vistas/agregar_mascotas.php');
}elseif(isset($_POST['btn_eliminar'])){
   $codigo_mascota = $_POST['codigo'];
   $eliminar=mysqli_query($conexion,"DELETE FROM tbl_mascota WHERE codigo_mascota='$codigo_mascota'") or die ('error al eliminar');
   echo "<script>alert('Sus datos han sido eliminados')</script>";
      header('location: ../vistas/agregar_mascotas.php');
   
}

   
?>