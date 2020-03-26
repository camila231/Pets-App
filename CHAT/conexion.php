<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "chatonline";
    $port = "3306";

    $conexion = new mysqli($servidor,$usuario,$password,$bd);

    function formatearFecha($fecha){
        return date('g:i:a', strtotime($fecha));
    }

?>