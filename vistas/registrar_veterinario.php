<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <link  href="../css/registrar_veterinario.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
</head>
<body>
<?php require_once '../header/header.php'; ?>   
 <div id="container">
    <div class="titulo"><h1><center>Registro Veterinario</center></h1></div>
    <div class="columna-1">
    <form action="../php/cod_registrar_veterinario.php" method="POST">
            <label for="fname" class="letra">Identificación</label>
            <input type="text"  class=" form1" placeholder="Ingrese su número de identificación" name="identificacionveterinario" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Primer nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer nombre" name="nombre1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo nombre" name="nombre2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Primer apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer apellido" name="apellido1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo apellido" name="apellido2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">E-mail</label>
            <input type="email" class=" form1" placeholder="Ingrese su correo e-mail" name="emailveterinario" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
  
    </div>
    <div class="columna-2">    
    <label for="fname" class="letra">Telefono</label>
            <input type="tel" class=" form1" placeholder="Ingrese su número de telefono" name="telefono1" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Celular</label>
            <input type="tel" class=" form1" placeholder="Ingrese su número de celular" name="celular1" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Usuario</label>
            <input type="text" class=" form1" placeholder="Ingrese su usuario" name="usuarioveterinario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña" name="claveveterinario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Verificar contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña verificada" name="confirmarclave"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
        </div>
        <br>
        <input type="submit" id="boton" name="btn" value="Registrar">
        <br>
    </form>
</div>
</div>
    
</body>
</html>