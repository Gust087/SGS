<?php
require 'conexion.php';
// declarando las variables provenientes desde producto.php

$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$publico = $_POST['publico'];
$descr = $_POST['descripcion'];
$cat= $_POST['cat'];
$cod= $_POST['codigo'];
	
$sql_insert = "INSERT INTO servicio (id_cat, nombre, precio, descripcion, codigo) VALUES  ('".$cat."', '".$nombre."', '".$publico."', '".$descr."', '".$cod."')";
$result= mysqli_query($conexion, $sql_insert) or die(mysqli_error($conexion). " Query: " . $sql_insert);


	if($result == TRUE ){
	header('Refresh: 2; URL= index.php?pagina=RServ'); 
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación se realizó con éxito.</div></div>';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=RServ'); 
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		exit;
	}
?>