<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['propietario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/solicitar_cita.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Solicitar cita</title>
</head>
<body>
<div id="container">
<?php require_once '../header/header_propietario.php'; ?>
<div class="columna1">
    <div class="solicitar">
    <form action="../php/correo_solicitar.php" method="POST" class="solicitar_cita">
    <h1><center>Solicitar cita inmediata</center></h1>
              <label>Identificacion</label>
              <input type="text" placeholder="Ingrese su identificación" name="identificacion_propietario" onkeypress="return SoloNumeros(event)" onpaste="return false">
                <label>Dirección</label>
                <input type="text" placeholder="Ingrese su dirección" name="direccion"  onkeypress="return SoloNumerosYLetras(event)" onpaste="return false">
                <label>Barrio</label>
                <input type="text" placeholder="Ingrese su barrio" name="barrio"  onkeypress="return SoloLetras(event)" onpaste="return false">
                <label>Tipo de consulta</label>
                <select name="tipo_Consulta">
                <option>Ingrese el tipo de consulta</option>
                <option>Vacunación</option>
                <option>Consulta general</option>
               </select>
               <button  name="btn_solicitar">Solicitar cita</button>
    </form>
    </div>
</div>

</div>
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}

?>