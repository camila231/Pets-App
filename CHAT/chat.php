<?php
    include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chat.css">
    <title>CHAT</title>
    
    <script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest();

        req.onreadystatechange = function(){
            if (req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        req.open('GET','chat.php', true);
        req.send();
    }
        //refrescar cada segundo
        setInterval(function(){ajax();},1000);
    </script>
</head>
<body onload="ajax();">
    <div id="contenedor">
        <div id="caja-chat">
            <div id="chat">
            <?php
                    $consulta = "SELECT *FROM chat ORDER BY id ";
                    $ejecutar = $conexion->query($consulta);
                    while ($fila = $ejecutar->fetch_array()):
                ?>
                <div id="datos-chat">
                    <span style="color: #1c62c4"><?php echo $fila['nombre']; ?>: </span>
                    <span style="color: black"><?php echo $fila['mensaje']; ?></span>
                    <span style="float: right"><?php echo formatearFecha($fila['fecha']); ?></span>
                </div>
                <?php 
                    endwhile; 
                ?>
            </div>
        </div>
            <form method="POST" action="codigoChat.php">
                <input type="text" placeholder="Ingresa tu nombre" name="nombre">
                <textarea placeholder="ingresa tu mensaje" name="mensaje"></textarea>
                <input type="submit" value="enviar" name="enviar">
            </form>
    </div>
</body>
</html>