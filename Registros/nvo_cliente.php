<?php
require 'conexion.php';
// declarando las variables provenientes desde producto.php

$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$apellido = ucwords($_POST['apellido']);
$direccion = ucwords($_POST['direccion']);
$ciudad = ucwords($_POST['ciudad']);
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$email = $_POST['email'];

$sql_insert = "INSERT INTO cliente (nombre, apellido, direccion, ciudad, celular, telefono, documento, email)
				VALUES ( '$nombre', '$apellido', '$direccion', '$ciudad', '$celular', '$telefono', '$documento', '$email');";
		
	

	if (mysqli_real_query($conexion, $sql_insert)){
		header('Refresh: 2; URL= index.php?pagina=MVend');/*http://localhost/SGS/Movimientos/venta.php'); */
		require 'cerrar_conexion.php';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=RClient');
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		exit;
	}
?>