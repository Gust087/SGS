<?php 
//require 'conexion.php';
?>

<!DOCTYPE HTML>
<html lang="es">
<body>
<section id="seccion">
<div id="buscar">
<form action="index.php?pagina=RegBP" method="POST">
	<fieldset id="cuadro">
	<label id="label"><b>Búsqueda De Artículos Por Marca</b></label></br>
	<input id="input" name="busqueda" type="text" placeholder="Ej: Kignton" required autofocus>
	<button id="button" type="submit">Buscar</button>
	</fieldset>
</div>
</form>  
  
 <?php
 //iniciamos buscador 
if (isset ($_POST["busqueda"]))
{
$busqueda = $_POST["busqueda"];
trim($busqueda); //Evitar espacios en blanco en la busqueda
$busqueda = addslashes($busqueda); //Marca una cadena con barras
  
//comenzamos la consulta 
$consulta = "SELECT * FROM producto WHERE marca like '%".$busqueda."%' ORDER BY marca ASC";
$resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
}
else{
     exit;
  }
?>
	<div id="contenido">
		<form method="POST" action="index.php?pagina=RegBP" name="formulario" >
		<legend id="nombre_tabla">Productos</legend>
		<fieldset id="cuadro">
			<table id="tabla">
				<tr>
					<td><b>Código</b></td>
					<td><b>Nombre</b></td>	
					<td><b>Marca</b></td>
					<td><b>Modelo</b></td>
					<td><b>&#36 Cpra</b></td>
					<td><b>&#36 Vta</b></td>
					<td><b>Stock</b></td>
					<td><b>Descripción</b></td>
					<td><b>Máx</b></td>
					<td><b>Mín</b></td>				
				</tr>
				
<?php 
	while($row=mysqli_fetch_array($resultado)){
	  echo" <tr>";
		echo"		<td>".$row['codigo']."</td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['marca']."</td>";
		echo"		<td>".$row['modelo']."</td>";
		echo"		<td>".$row['precio_cpra']."</td>";
		echo"		<td>".$row['precio_vta']."</td>";
		echo"		<td>".$row['existencia']."</td>";
		echo"		<td>".$row['descripcion']."</td>";
		echo"		<td>".$row['max']."</td>";
		echo"		<td>".$row['min']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarprod&cod=".$row['codigo']."&nombre=".$row['nombre']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&cod=".$row['codigo']."&nombre=".$row['nombre']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	echo"		</tr>";}
echo "</table>";
echo "</fieldset>";
mysqli_free_result($resultado);
require 'cerrar_conexion.php';
?>		
		</div>
		</form>
	</section>
</body>
</html>