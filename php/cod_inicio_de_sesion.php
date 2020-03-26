<?php
include 'conexion.php';
 session_start();
// variables
$usuario=$_POST['usuario'];
$clave=$_POST['password'];
$rol=$_POST['rol'];


if($rol == 'propietario') {
   $propietario = mysqli_query ($conexion, "SELECT *  FROM tbl_propietario where usuario_propietario = '$usuario' and clave_propietario = '$clave'");

if(mysqli_num_rows ($propietario) == 1) {
    session_start() ;
$row =mysqli_fetch_array($propietario) ;
$_SESSION ['propietario' ]  = $row['identificacion_propietario'] ;
header("Location: ../vistas/perfil_propietario.php");

}else{
    echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
    echo "<script>window.location='..';</script>";
    
    
}
}

if($rol == 'veterinario') {
    $veterinario = mysqli_query ($conexion, "SELECT *  FROM tbl_veterinario where usuario_veterinario = '$usuario' and clave_veterinario = '$clave'");
 
 if(mysqli_num_rows ($veterinario) == 1) {
     session_start() ;
 $row =mysqli_fetch_array($veterinario) ;
 $_SESSION ['veterinario' ]  = $row['identificacion_veterinario'] ;
 header("Location: ../vistas/pagina_veterinario.php");
 
 }else{
     echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
     echo "<script>window.location='..';</script>";
    
     
 }
 }
?>   
