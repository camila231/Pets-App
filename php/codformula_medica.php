<?php

include "conexion.php";

$nombre_mascota_formula =$_POST['nombre_mascota_formula1'];
$fecha =$_POST['fecha_formula'];
$descripcion =$_POST['descripcion_formula'];

    mysqli_query($conexion ,"INSERT INTO tbl_formula_medica(nombre_mascota_formula,fecha,descripcion) VALUES 
    ('$nombre_mascota_formula','$fecha','$descripcion')") or die (mysqli_error('conexion'));
    header ('location:../php/formula_medica.php');


?>