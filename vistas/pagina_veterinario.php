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
    <link  href="../css/pagina_veterinario.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/5e676b5ade.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Pagina veterinario</title>
</head>
<body>
    <div class="container">
    <?php require_once '../header/header_veterinario.php'; ?>
    <br>
    <div class="containertitulo">
    <?php
            include '../php/conexion.php';
            $idveterinario = $_SESSION['veterinario'];
            $query = mysqli_query($conexion,"SELECT * FROM tbl_veterinario WHERE `identificacion_veterinario` = '$idveterinario'");
            while($row = mysqli_fetch_array($query)){
              ?>
       <center> <h1>Bienvenido/a  <?php echo $row['nombre_1'];?> <?php echo $row['nombre_2'];?> <?php echo $row['apellido_1'];?> <?php echo $row['apellido_2'];?>.</center></h1>
        <?php
        }
    ?>
    </div>
    <!--inicio estado-->
    <div> 
    <?php
            include '../php/conexion.php';
            $id_v = $_SESSION['veterinario'];
            $query = mysqli_query($conexion,"SELECT * FROM tbl_veterinario WHERE `identificacion_veterinario` = '$id_v'");
            while($row = mysqli_fetch_array($query)){
              ?>
<br>

<h5><?php echo $row['nombre_1'];?> <?php echo $row['apellido_1'];?>, desde este momento tu estado para atender nuestros
servicios es disponible, si no <br>lo deseas así debes ingresar no disponible, cuando quieras volver a estar disponible lo único
que <br> tienes que hacer es ingresar disponible.</h5>
<br>
<center><form action="../vistas/pagina_veterinario.php" method="POST">
<textarea hidden name="identificacion_veterinario" id="" cols="30" rows="10"><?php echo $row['identificacion_veterinario'];?></textarea>
    <input type="text" name="estado" disabled class="estado" value="<?php echo $row['estado'];?>">
    <select name="estado" class="estado">
                <option disable selected>Disponibilidad</option>
                <option >Disponible</option>
                <option >No disponible</option>
               </select>
    <input type="submit" name="btn_estado" id="boton"  value="Actualizar">
<?php
        }
        ?>
    </div>
    <?php 
include '../php/conexion.php';

if (isset($_POST['btn_estado'])){
    $estado = $_POST['estado'];
    $identificacion_veterinario = $_POST['identificacion_veterinario'];

  mysqli_query($conexion,"UPDATE tbl_veterinario SET estado='$estado' WHERE identificacion_veterinario='$identificacion_veterinario'") or die (mysqli_error($conexion));
echo "<script>alert('Se actualizo exitosamente..')</script>";
echo "<script> window.location = '../vistas/pagina_veterinario.php'</script>";
}
?>
    <!--fin estado-->
    <!--inicio horario-->
    <div><br>
    <center>
        <form action="../vistas/pagina_veterinario.php" method="POST">
        <h5><center>Agrega los horarios en los que quieres trabajar.</center></h5>
        <br><br>
        <input type="time" class="hora" name="hora_1">
        <input type="submit" value="Agregar" name="btn" id="horabutton">
        </form>
    </center>
    <h5><center>Horario</center></h5>
    <?php
    include '../php/conexion.php';
    $id_v = $_SESSION['veterinario'];
    $query = mysqli_query($conexion,"SELECT hora_1 FROM tbl_horario WHERE identificacion_veterinario = '$id_v'");
    while($fila = mysqli_fetch_array($query)){
    ?>
    <form action="../vistas/pagina_veterinario.php">
    <input type="text" class="hora" disabled value="<?php echo $fila['hora_1'];?>" name="identificacion_veterinario" ><i class="fa fa-trash-o icono" name="btn_borrar" id="icono"></i>
    <?php
    }
    ?>
    </form>
    <!--borrar horario-->
    <?php 
include '../php/conexion.php';

if (isset($_POST['btn_borrar'])){
    $hora_1 = $_POST['hora_1'];
    $identificacion_veterinario = $_POST['identificacion_veterinario'];
    
    
    $query = mysqli_query($conexion ,"DELETE FROM tbl_horario WHERE identificacion_veterinario = '$identificacion_veterinario'") or die (mysqli_error($conexion));   

    if ($query) {
        echo "<script>alert('Su horario se agrego exitosamente..')</script>";
        echo "<script> window.location = '../vistas/pagina_veterinario.php'</script>";
    }
    else{
        echo "Error";
    }
}
?>

</div>
    <!--fin horario-->
    </div>
</body>
<script type="text/javascript" src='../js/modal.js'></script>
</html>
<!--Agregar horario-->
<?php 
include '../php/conexion.php';

if (isset($_POST['btn'])){
    $id_v = $_SESSION['veterinario'];
    $hora_1 = $_POST['hora_1'];
    
    
    $query = mysqli_query($conexion ,"INSERT INTO tbl_horario(hora_1,identificacion_veterinario) VALUES ('$hora_1','$id_v')") or die (mysqli_error($conexion));   

    if ($query) {
        echo "<script>alert('Su horario se agrego exitosamente..')</script>";
        echo "<script> window.location = '../vistas/pagina_veterinario.php'</script>";
    }
    else{
        echo "Error";
    }
}
?>
<!--fin horario-->
<?php
}else{
    header('Location: ../index.php');
}
?>