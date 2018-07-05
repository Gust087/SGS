<?php
require 'conexion.php';?>
<?php require 'select.php'; ?>

<?php

$sql_select_det = 
			"SELECT id_prod, codigo, nombre, marca, modelo, precio_vta 
			FROM producto AS prod 
			INNER JOIN detalle_fact_cpra AS det 
			ON prod.id_prod = det.id_prod
			AND det.id_ped = '".$ult_ing."'";
			$mostrar = mysqli_query($conexion, $sql_select_det);
?>
						
<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" action="index.php?pagina=seleccion_ped" name="formulario">
		<fieldset  id="cuadro" >
			<legend id="nombre_tabla">Productos</legend>
			<table id="tabla">
				<tr>
					<td><b>Codigo</b></td>
					<td><b>Nombre</b></td>
					<td><b>Marca</b></td>
					<td><b>Modelo</b></td>
					<td><b>Precio Unitario</b></td>
					<td><b>Cantidad</b></td>
					<td><b>Subtotal</b></td>					
				</tr>
					
	<?php 
		while($row=mysqli_fetch_row($mostrar)){
		  echo"
		  <tr bgcolor='#FFFACD'>
					<td>'".$row['prod.codigo']."'</td>
					<td>'".$row['prod.nombre']."'</td>
					<td>'".$row['prod.marca']."'</td>
					<td>'".$row['prod.modelo']."'</td>
					<td>'".$row['det.precio_unit']."'</td>
					<td>'".$row['det.cantidad']."'</td>
					<td>'".$row['det.subtotal']."'</td>
					<td><input type='hidden'  name='id_prod' value=".$row['prod.id_prod']."/></label></td>
			</tr>";		
$total += $row['det.subtotal'];}
			echo"  
			<tr bgcolor='#FFFACD'>
					<td><b></b></td>
					<td><b></b></td>
					<td><b></b></td>
					<td><b></b></td>
					<td><b></b></td>
					<td><b></b></td>
					<td><b>'".$total."'</b></td>";
echo "</table>";
echo "</fieldset>";
echo "<div align=\"center\"><button id='button' type='submit'>Agregar</button>
	<button id='button'><a href='index.php?pagina=boton13' style='text-decoration:none; color:black;'> Regresar </a></button></div>";

require 'cerrar_conexion.php';
?>
		</form>
	</div>
	</section>
</body>
</html>
