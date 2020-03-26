<?php
include '../php/conexion.php';
session_start();
if (isset($_SESSION['veterinario'])) {

if($_GET['historia']){
$codigoMascota = $_GET['historia'];
$query = mysqli_query($conexion,"SELECT * FROM tbl_historia_clinica where `codigo_de_mascota` = $codigoMascota");
$consulta = mysqli_num_rows($query);
if($consulta == 0){
    header ('location: ../php/ver_historia_clinica.php');

}}else{
    header('location: editar.php');
}

if(isset($_POST['submit'])){

$fecha_consulta =$_POST['fecha_editar'];
$nombre_mascota=$_POST['nombre_mascota_editar'];
$fecha_de_nacimiento =$_POST['fecha_nacimiento_editar'];
$raza = $_POST['raza_editar'];
$sexo =$_POST['sexo_editar'];
$diagnostico_mascota =$_POST['diagnostico_editar'];
$motivo_consulta =$_POST['motivo_editar'];

   // process form

   $sql = mysqli_query($conexion, "UPDATE tbl_historia_clinica SET fecha_consulta='$fecha_consulta',nombre_mascota ='$nombre_mascota',
   fecha_de_nacimiento ='$fecha_de_nacimiento',raza = '$raza',sexo ='$sexo',diagnostico_mascota='$diagnostico_mascota',
   motivo_consulta ='$motivo_consulta' WHERE codigo_de_mascota='$codigoMascota'" or die (mysqli_error($sql)));




}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/editar.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Editar historia clinica</title>
</head>
<body>
    
<div id="containerheader"> 
    <header>
    <div id="logo"><img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a></div>
            <nav class="nav">
                <ul>
                    <li><a href="../vistas/pagina_veterinario.php">Inicio</a>
                    </li>
                    <li><a href="../vistas/perfil_veterinario.php">Perfil</a>
                    </li>
                      <li><a href="#">Chat</a>
                    </li>
                    <li><a href="#">Historia clínica</a>
                        <ul>
                           <li><a href="../vistas/historia_clinica1.php">Crear</a></li>
                           <li><a href="../vistas/ver_historia_clinica.php">Ver</a></li>
                        </ul>
                      </li>
                      <li><a href="../vistas/cambiar_clave_veterinario.php">Cambiar contraseña</a>
                    </li>
                    <li><a href="../php/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <br> <br>
    <div class="container">
        <form action="../php/codeditar.php" method="POST">
        <h1 class="titulo"><center><img src="../images/icono.png" class="icono">Historia clínica</center></h1>
        <br>
        <?php



                        while($row = mysqli_fetch_array($query)){
                        
                          ?>
        <div class="container1">
            <input type="text" value="<?php echo $row['codigo_de_mascota'];?>" name="codigo_mascota_editar" hidden>
            <label for="fname" class="letra">Nombre de la mascota</label>
            <input type="text" class="form1"  name="nombre_mascota_editar" value="<?php echo $row['nombre_mascota'];?>">

            <label for="fname" class="letra">Raza</label>
            <input type="text" class="form1" name="raza_editar" value="<?php echo $row['raza'];?>">

            <label for="fname" class="letra">Fecha de nacimiento de la mascota</label>
            <input type="text" class="form1" name="fecha_nacimiento_editar" value="<?php echo $row['fecha_de_nacimiento'];?>">

            <label for="fname" class="letra">Diagnostico</label>
            <input type="text" class="form3" name="diagnostico_editar" value="<?php echo $row['diagnostico_mascota'];?>">

        </div>
        <div class="container2">
             <label for="fname" class="letra">Fecha de consulta</label>
            <input type="text" class="form1"  name="fecha_editar" value="<?php echo $row['fecha_consulta'];?>"> 

            <label for="fname" class="letra">Sexo</label>
            <select id="sexo" name="sexo_editar" value="<?php echo $row['sexo'];?>">
                <option value="au">Hembra</option>
                <option value="ca">Macho</option>
            </select>

            <label for="fname" class="letra">Motivo de la consulta</label>
            <input type="text" class="form3"  name="motivo_editar" value="<?php echo $row['motivo_consulta'];?>">
        </div>
        <br>
        <input type="submit" class="boton" name="submit" value="Actualizar">
        <br>
        <?php
        }
        ?>        
    </form>
    </div>

</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}

?>