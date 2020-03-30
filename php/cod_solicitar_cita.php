<?php
    include "../php/conexion.php";

    if (isset($_POST['btn_solicitar'])) {
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $tipo_Consulta = $_POST['tipo_Consulta'];
        $leido = 0;
        $identificacion_propietario = $_POST['identificacion_propietario'];
        
        
        $query = mysqli_query($conexion,"INSERT INTO tbl_solicitar_cita(direccion,barrio,tipo_Consulta,leido
        ,identificacion_propietario)
         VALUES ('$direccion','$barrio','$tipo_Consulta','$leido','$identificacion_propietario'
         )") or die(mysqli_error($conexion));    
        if ($query) {
            echo "<script>alert('Solicito su cita inmediata correctamente.')</script>";
            echo "<script> window.location = '../vistas/solicitar_cita.php'</script>";
        }
        else{
            echo "Error";
        }

    }
?>