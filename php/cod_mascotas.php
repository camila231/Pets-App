<?php
include 'conexion.php';
include '../vistas/agregar_mascotas.php';


$id = $_SESSION['propietario'];
$nombre_mascota = $_POST['nombre_mascota'];
$raza_mascota = $_POST['raza_mascota'];
$color_mascota = $_POST['color_mascota'];
$tamano_mascota =$_POST['tamano_mascota'];
$fecha_nacimiento = $_POST['fecha_nacimiento_mascota'];

$foto_mascota = $_FILES["foto_mascota"]["name"];
$ruta = $_FILES["foto_mascota"]["tmp_name"];
$destino="../img_mascotas/";
$destino= $destino."/".$foto_mascota;
move_uploaded_file($ruta,$destino);

mysqli_query($conexion ,"INSERT INTO tbl_mascota(nombre_mascota,raza_mascota,color_mascota,
tamano_mascota,fecha_nacimiento,foto_mascota, identificacion_propietario) VALUES ('$nombre_mascota','$raza_mascota',
'$color_mascota','$tamano_mascota','$fecha_nacimiento','$destino','$id')") or die (mysqli_error($conexion));



?>