<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['veterinario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cambiar_clave.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Cambiar contraseña</title>
</head>
<body>
<div id="container">
<?php require_once '../header/header_veterinario.php'; ?>
    <div class="cambiar">
                <h4>Cambiar Clave</h4>
                <br>
                <form action="../php/cod_cambiar_clave.php" method="POST">
                    <input type="text" name="clave_propietario" id="" placeholder="Ingrese su contraseña actual">
                    <input type="password" name="nuevaPassword" id="" placeholder="Nueva contraseña">
                    <input type="password" name="confirmarPassword" id="" placeholder="Confirmar contraseña">
                    <input type="submit" name="btn_cambiar" id="boton" value="Cambiar contraseña">
                </form>
</div> 
    </div>  
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}
?>