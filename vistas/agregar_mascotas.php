<?php
include '../php/conexion.php';
session_start();
/**
 * Si existe la sesión del propietario haga lo siguiente
 */
if (isset($_SESSION['propietario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/agregar_mascotas.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Agregar mascotas</title>
<body>
<div id="container">
<?php require_once '../header/header_propietario.php'; ?>
  <br><br>
  <div class="boton">
    <button onclick="mostrar()">Agregar mascotas</button>  
  </div>
  <div class="columna1">
    
    <?php
    $id = $_SESSION['propietario'];
            $query = mysqli_query($conexion,"SELECT * FROM tbl_mascota where `identificacion_propietario` = '$id'");
            while($row = mysqli_fetch_array($query)){
              ?>


  <div class="formulario">
  <form action="../php/cod_editar_mascota.php" method="POST">
                        
                        <h2><center>Mi Mascota</center></h2>
                        <div class="img-form">
                        <?php
                        echo '<img src="'.$row["foto_mascota"].'">';
                        ?>
                        </div>
                        <textarea hidden name="codigo" id="" cols="30" rows="10"><?php echo $row['codigo_mascota'];?></textarea>
                    <label >Nombre</label>
                    <input type="text" placeholder="" name="nombre_mascota" value="<?php echo $row['nombre_mascota'];?>" required="yes" >
            
                    <label >Raza</label>
                     <input type="text" placeholder="" name="raza_mascota" value="<?php echo $row['raza_mascota'];?>" required="yes" >
            
                    <label>color</label>
                    <input type="text" placeholder="" name="color_mascota" value="<?php echo $row['color_mascota'];?>" required="yes" >
              
                    <label >Tamaño</label>
                    <input type="text" placeholder="" name="tamano_mascota" value="<?php echo $row['tamano_mascota'];?>" >
            
                    <label >Fecha de nacimiento</label>
                    <input type="date" placeholder="" name="fecha_nacimiento_mascota"  value="<?php echo $row['fecha_nacimiento'];?>" required="yes">
                    
                    <input class="boton_actualizar" type="submit" name="btn_actualizar" value="Actualizar"> 
                     <input class="boton_borrar" type="submit" name="btn_eliminar" value="Eliminar">
                    </form>
  </div>
      <br><br>
      <?php
        }
        ?>                        
  </div>

  <div class="columna2" id="columna2">
  
  <form  action="../php/cod_mascotas.php" id="enviar" method="POST" enctype="multipart/form-data">
                        
            <h2><center>Mi Mascota</center></h2>
            <center><img src="../images/img_agregar_mascota.png" class="img_mascota"></center>
            <label class="input_form2" >Nombre</label>
            <input type="text" id="nombre_mascota" class="input_form2" placeholder="Ingrese el nombre de su mascota" name="nombre_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">

            <label class="input_form2" >Raza</label>
            <input type="text" class="input_form2" placeholder="Ingrese la raza de su mascota" name="raza_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes" >

            <label class="input_form2">color</label>
            <input type="text" class="input_form2" placeholder="Ingrese el color de su mascota" name="color_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">

            <label class="input_form2">Tamaño</label>
            <input type="text" class="input_form2" placeholder="Ingrese el tamaño de su mascota" name="tamano_mascota" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false" required="yes" >

            <label class="input_form2">Fecha de nacimiento</label>
            <input type="date" class="input_form2" placeholder="" name="fecha_nacimiento_mascota" onkeypress="return SoloNumeros(event)" onpaste="return false" required="yes">
       
            <label class="input_form2">Foto de su mascota</label>
            <input type="file" class="input_form2" name="foto_mascota">
            <input class="boton_agregar" type="button" name="btn" value="Agregar" id="btn-quitar" onclick="quitar()">
                  </form>


  </div>

</div>
<script>
  function mostrar(){
    document.getElementById("columna2").style.visibility = "visible";
  }
  function quitar(){
if( document.getElementById("nombre_mascota").value == ""){
  alert("Debes llenar todos los datos de tu mascota.");
}else{
    document.getElementById("enviar").submit();
    document.getElementById("columna2").style.visibility = "hidden";
  }
  }
</script>
</body>
</html>
<?php
}
/**
 * Sino está la sesión  del propietario lo direccione al index
 */
else{
    header('Location: ../index.php');
}

?>