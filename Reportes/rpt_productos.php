<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM producto";

include "paginator.php";

?>

<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" action="index.php?pagina=RProd" name="formulario">
		<fieldset  id="cuadro" >
			<legend id="nombre_tabla">Productos</legend>
			<table id="tabla">
				<tr>
					<td><b>Selct</b></td>
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
	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input type=\"checkbox\" name=\"select[]\" value=\"".$row[0]."\"></td>";
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
	echo"		</tr>";}?>
		</table>
		</fieldset>
		<div align="right">
		<?php print $_pagi_navegacion;?>
		<input style="margin-left:200px;" type="submit" name="borrar" id="button" value="Borrar Seleccion">
		<button type="submit" name="prod" id="button" onclick="imprimir('prod');">Imprimir</button></div>
		</form>
	</div>
</section>
</body>
 <?php
if(isset($_POST['borrar']) && $_POST['borrar'] == 'Borrar Seleccion'){
if (count($_POST['select']))
{
foreach ($_POST['select'] as $v)
{
$sql_delete="DELETE FROM producto WHERE codigo = '$v'";
$del = mysqli_query($conexion, $sql_delete);
}
}
echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
header('Refresh: 2; URL= index.php?pagina=RProd'); 
require 'cerrar_conexion.php';
exit;
}

mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';
?>
</html>