<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/recuperar_contraseña.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<center>
<?php
include '../php/conexion.php';
if(isset($_POST['enviar'])){

    $rol = $_POST['rol'];
    $token = $_POST['token'];
        $nuevaContraseña = $_POST['nuevacontraseña'];
        $confirmarContraseña = $_POST['confirmarcontraseña'];
    
    if($rol == 'propietario') {
       if($nuevaContraseña = $confirmarContraseña){
       $contraseña = $nuevaContraseña;
    
       $propietario = mysqli_query($conexion,"UPDATE tbl_propietario SET clave_propietario = '$contraseña' WHERE token = '$token'");
       echo "<script> alert ('Contraseña actualizada.'); </script>";
        header ('location: ../vistas/inicio_de_sesion.php');
        
    }else{
        $error = "Error al cambiar la contraseña";
        echo "<script type='text/javascript'>alert($error)</script>";
                }
                }
    if($rol == 'veterinario') {
       if($nuevaContraseña = $confirmarContraseña){
       $contraseña = $nuevaContraseña;
    
       $veterinario = mysqli_query($conexion,"UPDATE tbl_veterinario SET clave_veterinario = '$contraseña' WHERE token = '$token'");
       echo "<script> alert ('Contraseña actualizada.'); </script>";
        header ('location: ../vistas/inicio_de_sesion.php');
        
    }else{
        $error = "Error al cambiar la contraseña";
        echo "<script type='text/javascript'>alert($error)</script>";
                }
                }
            }
    ?>
    <form  action="#" method="POST">
        <h1>Recuperar contraseña</h1>
        <br>
    <label class="codigo">Código</label>
    <br>
    <input  type="text" name="token"  required="yes">
    <br>
    <label class="nuevacontraseña" >Nueva contraseña</label>
    <br>
    <input  type="password" name="nuevacontraseña" autocomplete="off" required="yes">
    <br>
    <label>Confirmar contraseña</label>
    <br>
    <input  type="password" name="confirmarcontraseña"  required="yes">
    <br>
    <select class="rol" name="rol">
                               <option  disabled selected>Rol</option>
                               <option value="propietario" >Propietario</option>
                               <option value="veterinario" >Veterinario</option>
                             </select>
                             <br>
    <input type="submit" class="button" value="Cambiar contraseña" name="enviar">
    </form>
</center>
</body>
</html>