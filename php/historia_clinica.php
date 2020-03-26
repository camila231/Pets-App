<?php

include "conexion.php";

$nombre_mascota =$_POST['nombre_mascota_historia'];
$fecha_consulta =$_POST['fecha_historia'];
$fecha_de_nacimiento =$_POST['fecha_nacimiento'];
$identificacionpropietario =$_POST['idpropietario'];
$raza =$_POST['raza_historia'];
$sexo =$_POST['sexo_historia'];
$diagnostico_mascota =$_POST['diagnostico_historia'];
$motivo_consulta =$_POST['motivo_historia'];


    mysqli_query($conexion ,"INSERT INTO tbl_historia_clinica(nombre_mascota,fecha_consulta,fecha_de_nacimiento,raza,
    sexo,diagnostico_mascota,motivo_consulta,id_propietario) VALUES ('$nombre_mascota','$fecha_consulta','$fecha_de_nacimiento','$raza',
    '$sexo','$diagnostico_mascota','$motivo_consulta','$identificacionpropietario')") or die ("<h2> Error al envio </h2>");


    header('location:../vistas/ver_historia_clinica.php');
?>