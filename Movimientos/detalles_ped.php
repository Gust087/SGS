<?php
require 'conexion.php';

$id = $_GET['id_prod'];
	
$consulta="SELECT * FROM producto WHERE id_prod = '$id'";
$result = mysqli_query($conexion, $consulta);
?>
	
<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" action="index.php?pagina=detalles" name="formulario">
		<fieldset  id="cuadro" >
			<legend id="nombre_tabla">Productos</legend>
			<table id="tabla">
				<tr>
					<td><b>Codigo</b></td>
					<td><b>Nombre</b></td>	
					<td><b>Marca</b></td>
					<td><b>Modelo</b></td>
					<td><b>&#36 Cpra</b></td>
					<td><b>&#36 Vta</b></td>
					<td><b>Stock</b></td>
					<td><b>Descripcion</b></td>
					<td><b>Max</b></td>
					<td><b>Min</b></td>	
					<td><b>Cant</b></td>									
				</tr>
				
<?php 
	while($row=mysqli_fetch_array($result)){
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
		echo"		<td><input id='input-reg' type='number'  name='cant'/></td>";
		echo"		<td><input type='hidden'  name='id_prod' value=".$row['id_prod']."/></td>";
		echo"		<td><input type='hidden'  name='val' value=".$row['precio_cpra']."/></td>";
		if(isset($row['IVA'])){echo"<td><input type='hidden'  name='IVA' value=".$row['IVA']."/></td>";}
		}
echo "</table>";
echo "</fieldset>";
echo "<div align=\"center\"><button id='button' type='submit'>Confirmar</button>
	<button id='button'><a href='index.php?pagina=detalles&id_prod="$id"&val=".$row['precio_cpra']."' style='text-decoration:none; color:black;'> Regresar </a></button></div>";
mysqli_free_result($result);
require 'cerrar_conexion.php';
?>
		</form>
	</div>
	</section>
</body>
</html>
