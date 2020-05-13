<?php
include '../php/conexion.php';
session_start();
/**
 * Si existe la sesión del administrador haga lo siguiente
 */
if (isset($_SESSION['administrador'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/clave_administrador.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<div id="container">
<!--Menú navegador --> 
<div class="menu">
    <header>
        <div id="logo"><img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a></div>
            <nav class="nav">
            <ul>
            <li><a href="../vistas/pagina_administrador.php">Inicio</a>
            </li>
            <li><a href="../vistas/clave_administrador.php">Cambiar contraseña</a>
            </li>
            <li><a href="../php/salir.php">Cerrar sesión</a>
            </li>
            </ul>
            </nav>
    </header>
</div>
<div>
<!--Formulario para cambiar contraseña del administrador --> 
<div id="container">
    <div class="cambiar">
                <center><h1>Cambiar Clave</h1></center>
                <br>
                <form action="../php/cod_clave_administrador.php" method="POST" onsubmit="return claveVeterinario();">
                    <input type="text" name="clave_administrador" id="clave" placeholder="Ingrese su contraseña actual">
                    <input type="password" name="nuevaPassword" id="claveNueva" placeholder="Nueva contraseña">
                    <input type="password" name="confirmarPassword" id="confirmar" placeholder="Confirmar contraseña">
                    <input type="submit" name="btn_cambiar" id="boton" value="Cambiar contraseña">
                </form>
</div> 
    </div>  
</body>
</html>
<?php
}
/**
 * Sino está la sesión  del administrador lo direccione al index
 */
else{
    header('Location: ../index.php');
}
?>