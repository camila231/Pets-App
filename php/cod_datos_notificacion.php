<?php
    include "../php/conexion.php";

    if (isset($_POST['aceptar'])) {
        $codigo_solicitar = $_POST['codigo_solicitar'];
        $leido = 1;
        
        $query=mysqli_query($conexion,"UPDATE tbl_solicitar_cita SET leido = '$leido'
         WHERE codigo_solicitar='$codigo_solicitar'") or die (mysqli_error($conexion));
         echo "<script> window.location = '../vistas/datos_notificacion.php'</script>";
    }
        ?>