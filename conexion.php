<?php
$conexion = mysqli_connect("localhost", "root", "", "sistema_stock") OR DIE("No ha sido posible conectar a la tabla");
@mysqli_query($conexion, "SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
$prueba = "La conexion anda bien";
?>