<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/recuperar_contraseña.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<center>
    <form  action="../vistas/inicio_de_sesion.php" method="POST">
        <h1>Recuperar contraseña</h1>
    <br>
    <select class="rol" name="rol">
                               <option  disabled selected>Rol</option>
                               <option value="propietario" >Propietario</option>
                               <option value="veterinario" >Veterinario</option>
                             </select>
                             <br>
    <input  type="email" name="email" placeholder="Ingrese su correo electrónico"required="yes">
    <br>
    <input type="submit" class="button" value="Enviar" name="enviar">
    </form>
</center>
</body>
</html>