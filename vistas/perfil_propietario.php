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
    <link  href="../css/perfil_propietario.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Perfil propietario</title>
</head>
<body>
<div id="container">
<?php require_once '../header/header_propietario.php'; ?>

    <div class="titulo"><h1><center>Perfil propietario</center></h1></div>
    <div class="columna-1">
    <?php
            include '../php/conexion.php';
            $id = $_SESSION['propietario'];
            $query = mysqli_query($conexion,"SELECT * FROM tbl_propietario WHERE `identificacion_propietario` = '$id'");
            while($row = mysqli_fetch_array($query)){
              ?>
    <form action="../php/cod_editar_propietario.php" method="post">
    <textarea hidden name="identificacionpropietario" id="" cols="30" rows="10"><?php echo $row['identificacion_propietario'];?></textarea>

            <label for="fname" class="letra">Primer nombre</label>
            <input type="text" class=" form1"  placeholder="" value="<?php echo $row['nombre_1'];?>" name="nombre1">

            <label for="fname" class="letra">Segundo nombre</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['nombre_2'];?>" name="nombre2">

            <label for="fname" class="letra">Primer apellido</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['apellido_1'];?>" name="apellido1">

            <label for="fname" class="letra">Segundo apellido</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['apellido_2'];?>" name="apellido2">

            <label for="fname" class="letra">E-mail</label>
            <input type="email" class=" form1" placeholder="" value="<?php echo $row['email_propietario'];?>" name="emailpropietario">
    </div>
    <div class="columna-2">   
    <label for="fname" class="letra">Dirección</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['direccion'];?>" name="direccion">


            <label for="fname" class="letra">Celular</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['celular_1'];?>" name="celular1">

            <label for="fname" class="letra">Usuario</label>
            <input type="text" class=" form1" placeholder="" value="<?php echo $row['usuario_propietario'];?>"  name="usuario_propietario">
            <?php
        }
        ?>  
        </div>
        <br>
        <input type="submit" id="boton" name="btn_actualizar" value="Actualizar">
        <br>
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