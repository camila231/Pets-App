<?php
include 'conexion.php';

session_start();
session_unset();
session_destroy();

echo "<script>alert('Cerrando sesión');</script>";
echo "<script>window.location='../index.php';</script>";
?>