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
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/historia_clinica.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Historia clínica</title>
</head>
<body>
    
    <div id="containerheader"> 
    <?php require_once '../header/header_veterinario.php'; ?>
    </div>
    <br> <br>
    <div class="container">
        <form action="../php/historia_clinica.php" method="POST">
        <h1 class="titulo"><center><img src="../images/icono.png" class="icono">Historia clínica</center></h1>
        <br>
        <div class="container1">

            <label for="fname" class="letra">Nombre de la mascota</label>
            <input type="text" class="form1" placeholder="Ingrese el nombre de la mascota" name="nombre_mascota_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">

            <label for="fname" class="letra">Fecha de consulta</label>
            <input type="date" class="form1" placeholder="Año/dia/mes" name="fecha_historia"  onkeypress="return SoloNumeros(event)" onpaste="return false" required="yes">

            <label for="fname" class="letra">Raza</label>
            <input type="text" class="form1" placeholder="Ingrese la raza" name="raza_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">

            <label for="fname" class="letra">Motivo de la consulta</label>
            <input type="text" class="form3" placeholder="Ingrese el motivo de la consulta" name="motivo_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">
            
        </div><br>
        <div class="container2">
        <label for="fname" class="letra">Identificación del propietario</label>
            <input type="text" class="form1" placeholder="Ingrese la identificación del propietario" name="idpropietario"  onkeypress="return SoloNumeros(event)" onpaste="return false" required="yes">

            <label for="fname" class="letra">Fecha de nacimiento de la mascota</label>
            <input type="date" class="form1" placeholder="Año/dia/mes" name="fecha_nacimiento"  onkeypress="return SoloNumeros(event)" onpaste="return false" required="yes">

            <label for="fname" class="letra">Sexo</label>
            <select id="sexo"placeholder="Ingrese el sexo" name="sexo_historia" required="yes">
                <option value="au">Hembra</option>
                <option value="ca">Macho</option>
            </select>

            <label for="fname" class="letra">Diagnostico</label>
            <input type="text" class="form3" placeholder="Ingrese el diagnostico" name="diagnostico_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">
           
        </div>
        <br>
        <input type="submit" class="boton" name="btn" value="Crear">
        <br>
    </form>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}

?>