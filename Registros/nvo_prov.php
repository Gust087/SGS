<?php
require 'conexion.php';
// declarando las variables provenientes desde producto.php

$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$direccion = ucwords($_POST['direccion']);
$ciudad = ucwords($_POST['ciudad']);
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$descr = $_POST['descripcion'];
$email = $_POST['email'];

$sql_insert = "INSERT INTO proveedor (nombre, direccion, ciudad, celular, telefono, descripcion, email, estado)
				VALUES ( '".$nombre."', '".$direccion."', '".$ciudad."', '".$celular."', '".$telefono."', '".$descr."', '".$email."', '".true."');";
		
	

	if (mysqli_real_query($conexion, $sql_insert)){ 
		header('Refresh: 2; URL= index.php?pagina=MComp'); 
		require 'cerrar_conexion.php';

		exit;
	}
	else {
		echo mysqli_connect_error();
		header('Refresh: 2; URL= index.php?pagina=RProv'); 
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		require 'cerrar_conexion.php';		
		exit;
	}
?>5