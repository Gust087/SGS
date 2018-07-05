<?php
require 'conexion.php';
// declarando las variables provenientes desde producto.php

$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$fecha = $_POST['fecha'];
$descr = $_POST['descripcion'];
$sistema= $_POST['stock'];
$real= $_POST['existencia'];
$cod= $_POST['codigo'];

if($real != $sistema){
	$update = mysqli_query($conexion, "UPDATE producto SET existencia='".$real."' WHERE codigo = '".$cod."' AND nombre = '".$nombre."';")or die ( "Error en query: $update, el error  es: " . mysqli_error($conexion));
}

$sql_insert = "INSERT INTO inventario (codigo, nombre, fecha, cant_prod, valor_real, descripcion ) VALUES  ('".$cod."', '".$nombre."', '".$fecha."', '".$sistema."', '".$real."', '".$descr."')";
$result= mysqli_query($conexion, $sql_insert) or die(mysqli_error($conexion). " Query: " . $sql_insert);


	if($result == TRUE ){
	header('Refresh: 2; URL= index.php'); 
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación se realizó con éxito.</div></div>';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=Inventario'); 
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		exit;
	}
?>