<?php

    include "conexion.php";

    if (isset($_POST['btn_cambiar'])) {
        $clave_propietario = $_POST['clave_propietario'];
        $nuevaPass = $_POST['nuevaPassword'];
        $confirmarPass = $_POST['confirmarPassword'];

        if ($nuevaPass == $confirmarPass) {
            
            $sql = mysqli_query($conexion, "UPDATE tbl_propietario SET clave_propietario = '$nuevaPass' 
            WHERE clave_propietario = '$clave_propietario' ") or die (mysqli_error($conexion));

            echo "<script> alert('Contraseña actualizada');</script>";
            echo "<script>window.location='../vistas/inicio_de_sesion.php';</script>";
            
        }
        else{
            echo "<script type='text/javascript'>alert('Las contraseñas no coinciden')</script>"; 
            echo "<script>window.location='../vistas/cambiar_clave.php';</script>";

        }
    }


?>