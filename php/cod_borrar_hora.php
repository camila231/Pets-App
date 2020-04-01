<?php 
include '../php/conexion.php';
if(isset($_GET['hora'])){
    $identificacion_veterinario = $_GET['hora'];
    
    $query = mysqli_query($conexion ,"DELETE FROM tbl_horario WHERE codigo_hora = $identificacion_veterinario") 
    or die (mysqli_error($conexion));   

    if ($query) {
        
        echo "<script> window.location = '../vistas/pagina_veterinario.php'</script>";
    }
    else{
        echo "Error";
    }

    }
?>