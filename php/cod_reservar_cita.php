<?php
    include "../php/conexion.php";
    include "../vistas/reservar_cita.php";
/**
 * Se definen 7 variables
 * @var String $id
 * @var String $direccion
 * @var String $barrio
 * @var String $fecha
 * @var String $hora
 * @var String $tipo_Consulta
 * @var String $veterinario
 */
/**
 * Si le da click en el botón reservar
 */
    if (isset($_POST['btn_reservar'])) {
/**
 * La variable id es para traer la identificación del propietario
 */
        $id = $_SESSION['propietario'];
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $fecha =$_POST['fecha'];
        $hora =$_POST['hora'];
        $tipo_Consulta = $_POST['tipo_Consulta'];
        $veterinario = $_POST['veterinario'];
/**
 * Sentencia sql para insertar datos en la tabla reservar cita
 */       
        $query = mysqli_query($conexion,"INSERT INTO tbl_reservar_cita(direccion_reserva,barrio_reserva,fecha_reserva,
        hora_reserva,tipo_Consulta,veterinario,identificacion_propietario) 
        VALUES ('$direccion','$barrio','$fecha','$hora','$tipo_Consulta','$veterinario','$id')") 
        or die(mysqli_error($conexion));    
/**
 * Si se inserta correctamente le muestra una alerta
 */
        if ($query) {
            echo "<script>alert('Su cita se reservo exitosamente.')</script>";
            header('location: ../vistas/reservar_cita.php');
        }
        
    }



?>