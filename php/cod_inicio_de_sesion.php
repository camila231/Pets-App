<?php
include 'conexion.php';
 session_start();
/**
 * Se definen 3 variables
 * @var String $usuario
 * @var String $clave
 * @var String $rol
 */
$usuario=$_POST['usuario'];
$clave=$_POST['password'];
$rol=$_POST['rol'];
/**
 * Si la variable rol es igual a propietario
 */
if($rol == 'propietario') {
/**
 * Se realiza una consulta en la tabla propietario
 */
   $propietario = mysqli_query ($conexion, "SELECT *  FROM tbl_propietario where usuario_propietario = '$usuario' and clave_propietario = '$clave'");
/**
 * Si propietario es igual a 1
 * se inicia sesión 
 */
if(mysqli_num_rows ($propietario) == 1) {
    session_start() ;
$row =mysqli_fetch_array($propietario) ;
$_SESSION ['propietario' ]  = $row['identificacion_propietario'] ;
header("Location: ../vistas/perfil_propietario.php");

}
/**
 * Sino encuentra resultados en la consulta le muestra una alerta y lo deja en el inicio de sesión
*/
else{
    echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
    echo "<script>window.location='..';</script>";
}
}
/**
 * Si rol es igual a veterinario
 */
if($rol == 'veterinario') {
/**
 * Se realiza una consulta en la tabla veterinario
 */
    $veterinario = mysqli_query ($conexion, "SELECT *  FROM tbl_veterinario where usuario_veterinario = '$usuario' and clave_veterinario = '$clave'");
 /**
  * Si veterinario es igual a 1
  * Se inicia sesión
  */
 if(mysqli_num_rows ($veterinario) == 1) {
     session_start() ;
 $row =mysqli_fetch_array($veterinario) ;
 $_SESSION ['veterinario' ]  = $row['identificacion_veterinario'] ;
 header("Location: ../vistas/pagina_veterinario.php");
 
 }
 /**
 * Sino encuentra resultados en la consulta le muestra una alerta y lo deja en el inicio de sesión
*/
else{
     echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
     echo "<script>window.location='..';</script>";
    
     
 }
 }
?>   
