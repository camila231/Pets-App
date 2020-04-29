<?php
include 'conexion.php';
/**
 * Inicia la sesión
 */
session_start();
/**
 * Elimina las variables de la sesión actual
 */
session_unset();
/**
 * Destruir toda la sesión
 */
session_destroy();
echo "<script>alert('Cerrando sesión');</script>";
/**
 * Se direcciona al index
 */
echo "<script>window.location='../index.php';</script>";
?>