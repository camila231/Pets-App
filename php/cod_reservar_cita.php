<?php
    include "../php/conexion.php";
    include "../vistas/reservar_cita.php";

    if (isset($_POST['btn_reservar'])) {
        $id = $_SESSION['propietario'];
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $fecha =$_POST['fecha'];
        $hora =$_POST['hora'];
        $tipo_Consulta = $_POST['tipo_Consulta'];
        $veterinario = $_POST['veterinario'];
        
        
        $query = mysqli_query($conexion,"INSERT INTO tbl_reservar_cita(direccion_reserva,barrio_reserva,fecha_reserva,
        hora_reserva,tipo_Consulta,veterinario,identificacion_propietario) 
        VALUES ('$direccion','$barrio','$fecha','$hora','$tipo_Consulta','$veterinario','$id')") 
        or die(mysqli_error($conexion));    

        if ($query) {
            echo "<script>alert('Reservo su cita correctamente')</script>";
            echo "<script> window.location = '../vistas/reservar_cita.php'</script>";
        }
        else{
            echo "Error";
        }
    }



?>