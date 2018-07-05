<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM proveedor";

include "paginator.php";

?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
	<div id="contenido">
		<form  name="formulario" method="POST" action="index.php?pagina=RProv" >
		<fieldset id="cuadro">
			<legend id="nombre_tabla">Proveedores</legend>
			<table id="tabla">
				<tr>
					<td><b>Selct</b></td>
					<td><b>Nombre</b></td>
					<td><b>Dirección</b></td>
					<td><b>Ciudad</b></td>
					<td><b>Celular</b></td>
					<td><b>Teléfono</b></td>
					<td><b>Descripción</b></td>
					<td><b>email</b></td>
					<td><b>Estado</b></td>
				</tr>
				
<?php 
	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input type=\"checkbox\" name=\"select[]\" value=\"".$row[8]."\"></td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['direccion']."</td>";
		echo"		<td>".$row['ciudad']."</td>";
		echo"		<td>".$row['celular']."</td>";
		echo"		<td>".$row['telefono']."</td>";
		echo"		<td>".$row['descripcion']."</td>";
		echo"		<td>".$row['email']."</td>";
		echo"		<td>".$row['estado']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarprov&id_proveed=".$row['id_proveed']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&id_proveed=".$row['id_proveed']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}?>
		</table>
		</fieldset>
		<div align="right">
		<?php print $_pagi_navegacion;?>
		<input style="margin-left:200px;" type="submit" name="borrar" id="button" value="Borrar Seleccion">
		<button type="submit" name="prov" id="button" onclick="imprimir('prov');">Imprimir</button></div>
		</form>
	</div>
</section>
</body>
 <?php if(isset($_POST['borrar']) && $_POST['borrar'] == 'Borrar Seleccion'){
if (count($_POST['select']))
{
foreach ($_POST['select'] as $v)
{
$sql_delete="DELETE FROM proveedor WHERE id_proveed = '$v'";
$del = mysqli_query($conexion, $sql_delete);
}
}
echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
header('Refresh: 2; URL= index.php?pagina=RProv'); 
require 'cerrar_conexion.php';
exit;
}

mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';
?>
</html>