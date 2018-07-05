<?php
require 'conexion.php';

// declarando las variables provenientes desde producto.php
$codigo = $_POST['codigo'];
$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$marca = ucwords($_POST['marca']);
$modelo = ucwords($_POST['modelo']);
$base = $_POST['base'];
$publico = $_POST['publico'];
$cant = $_POST['cantidad'];
$descr = $_POST['descripcion'];
$max = $_POST['max'];
$min = $_POST['min'];
$fecha = $_POST['fecha'];
$cat= $_POST['cat'];
	
$sql_insert = "INSERT INTO producto (id_cat, nombre,  precio_vta, precio_cpra, codigo, existencia, max, descripcion, marca, modelo, min) 
				VALUES ( '".$cat."', '".$nombre."', '".$publico."', '".$base."', '".$codigo."', '".$cant."', '".$max."', '".$descr."', '".$marca."', '".$modelo."', '".$min."')";
//$sql_qty = "UPDATE productos SET  existencia =  existencia + '".$cant."' WHERE nombre = '".$nombre."' AND modelo = '".$modelo."'";
// and mysqli_query($conexion, $sql_qty) 

	if (mysqli_query($conexion, $sql_insert)){ 
		header('Refresh: 2; URL= index.php?pagina=RProd'); 
		echo '<div id="contenido"><div id="contenido"><div align="center">La operación ha resultado satisfactoria</div></div>';
		require 'cerrar_conexion.php';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=RProd'); 
		echo '<div id="contenido"><div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		require 'cerrar_conexion.php';
		exit;
	}
?>