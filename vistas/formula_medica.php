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
    <link  href="../css/formula_medica.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Fórmula médica</title>
</head>
<body>
    
<div id="containerheader"> 
        <header>
            <nav class="nav">
                <ul>
                    <img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a>
                    <li><a href="../vistas/pagina_veterinario.php">Inicio</a>
                    </li>
                    <li><a href="../vistas/perfil_veterinario.php">Perfil</a>
                    </li>
                    <li><a href="#">Historia clínica</a>
                        <ul>
                           <li><a href="../vistas/historia_clinica1.php"><center>Crear</center></a></li>
                           <li><a href="../vistas/ver_historia_clinica.php"><center>Ver</center>  </a></li>
                        </ul>
                      </li>
                      <li><a href="../vistas/formula_medica.php">Fórmula Médica</a>
                      </li>
                    <li><a href="../php/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <br>
              <form  action="codformula_medica.php" method="POST" class="form">
                <div class="formula_medica">
                        <div class="row">
                                <div class="col-12">
                        <br>
                      
                                  <h2><center><img src="../images/formula.png" class="imagen">Fórmula Médica</center></h2>
                                  <br>
                                  <label for="fname" class="label2">Nombre:</label>
                                  <input type="text" placeholder="Nombre mascota" name="nombre_mascota_formula1" class="input2">
                                  <br><br>
                                  <label for="fname" class="label3">Fecha:</label>
                                  <input type="text" placeholder="AA/DD/MM" name="fecha_formula" class="input3">
                                  <br><br>
                                  <label for="fname" class="label3">Descripción:</label>
                                  <textarea  placeholder="Descripción:" name="descripcion_formula" class="texarea1"></textarea>
                                  <br>
                                  <input type="submit"  class="boton"   name="btn" value="Enviar">
                                
                                  
                                </div>
                                </div>
                                </div>
              </form>
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}

?>