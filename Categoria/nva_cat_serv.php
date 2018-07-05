<?php
require 'conexion.php';
// declarando las variables provenientes desde cat_serv.php

$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$descr = $_POST['descripcion'];
	
$sql_insert = "INSERT INTO categoria_serv (nombre, descripcion) VALUES  ('".$nombre."','".$descr."')";
$result= mysqli_query($conexion, $sql_insert) or die(mysqli_error($conexion). " Query: " . $sql_insert);


	if($result == TRUE ){
	header('Refresh: 2; URL= index.php?pagina=CatS'); 
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación se realizó con éxito.</div></div>';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=CatS'); 
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		exit;
	}
?>