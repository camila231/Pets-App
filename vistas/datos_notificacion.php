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
    <link rel="stylesheet" href="../css/datos_notificacion.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
    <?php require_once '../header/header_veterinario.php'; ?>
    <div class="colum-1">
        <br>
        <center>
    <table>
        <tr>
            <th>Dirección</th>
            <th>Barrio</th>
            <th>Tipo de consulta</th>
            <th>Identificacion propietario</th>
            <th>Acción</th>
            </tr>
            <?php
            include '../php/conexion.php';
            $query = mysqli_query($conexion,"SELECT * FROM tbl_solicitar_cita");
            while($row = mysqli_fetch_array($query)){
              ?>
            <tr>
            <td><?php echo $row['direccion'];?></td>
            <td><?php echo $row['barrio'];?></td>
            <td><?php echo $row['tipo_consulta'];?></td>
            <td><?php echo $row['identificacion_propietario'];?></td>
            <td><center><input type="submit" name="aceptar" value="Aceptar"></center></td>
        </tr>
            <?php } ?>
      </table>
      </center>
    </div>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}
?>