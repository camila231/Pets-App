<?php
include "conexion.php";
                if (isset($_POST['enviar'])) {
                    $nombre = $_POST['nombre'];
                    $mensaje = $_POST['mensaje'];
                    echo $nombre;
                    echo $mensaje;
                   $consulta = "INSERT INTO chat(nombre,mensaje) VALUES ('$nombre','$mensaje')";
                    $ejecutar = $conexion->query($consulta);

                    /* $query = mysqli_query($conexion,"INSERT INTO chat(nombre,mensaje) VALUES ('$nombre','$mensaje')") or die(mysqli_error($conexion)); */
                    

                    if ($consulta) {
                        echo "<script> window.location = 'index.php'</script>";
                    }else{
                        echo "sadsa";
                    }
                }
            ?>