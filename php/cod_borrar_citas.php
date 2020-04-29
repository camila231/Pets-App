<?php
include 'conexion.php';
/**
 * Se define 1 variable
 * @var Integer $codigo_solicitar
 * Si le da click en el botón solicitar cita
 */
if(isset($_POST['borrar_solicitar'])){
    $codigo_solicitar = $_POST['codigo'];
/**
 * Sentencia sql para borrar datos de la tabla solicitar cita
 */
    $eliminar=mysqli_query($conexion,"DELETE FROM tbl_solicitar_cita WHERE codigo_solicitar='$codigo_solicitar'") or die ('error al eliminar');
    echo "<script>alert('Sus datos han sido eliminados')</script>";
    header('location: ../vistas/cancelar_cita.php'); 
 }
?>