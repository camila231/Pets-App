<?php
include 'conexion.php';
include '../vistas/agregar_mascotas.php';

/**
 *Se definen 9 variables
 *@var String $id
 *@var String $nombre_mascota
 *@var String $raza_mascota
 *@var String $color_mascota
 *@var String $tamano_mascota
 *@var Date $fecha_nacimiento
 *@var String $foto_mascota
 *@var String $ruta
 *@var String $destino
 */
/**
 *La variable id es para llamar la identificación de la sesión propietario
 */
$id = $_SESSION['propietario'];
$nombre_mascota = $_POST['nombre_mascota'];
$raza_mascota = $_POST['raza_mascota'];
$color_mascota = $_POST['color_mascota'];
$tamano_mascota =$_POST['tamano_mascota'];
$fecha_nacimiento = $_POST['fecha_nacimiento_mascota'];
/**
 *Subir una imagen
 */
$foto_mascota = $_FILES["foto_mascota"]["name"];
$ruta = $_FILES["foto_mascota"]["tmp_name"];
$destino="../img_mascotas/";
$destino= $destino."/".$foto_mascota;
/**
 *move_uploaded_file si la imagen es valida se inserta la url y se sube el archivo a la carpeta img_mascotas
 */
move_uploaded_file($ruta,$destino);
/**
 * Sentencia sql para insertar datos en la tabla mascota
 */
mysqli_query($conexion ,"INSERT INTO tbl_mascota(nombre_mascota,raza_mascota,color_mascota,
tamano_mascota,fecha_nacimiento,foto_mascota, identificacion_propietario) VALUES ('$nombre_mascota','$raza_mascota',
'$color_mascota','$tamano_mascota','$fecha_nacimiento','$destino','$id')") or die (mysqli_error($conexion));
?>