<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM cliente";

include "paginator.php";

?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
	<div id="contenido">
		<form name="formulario" method="POST" action="index.php?pagina=RClient" >
		<fieldset id="cuadro">
			<legend id="nombre_tabla">Clientes</legend>
			<table id="tabla">
				<tr>
					<td><b>Selct</b></td>
					<td><b>Nombre</b></td>
					<td><b>Apellido</b></td>
					<td><b>Dirección</b></td>
					<td><b>Ciudad</b></td>
					<td><b>Celular</b></td>
					<td><b>Teléfono</b></td>
					<td><b>DNI</b></td>
					<td><b>email</b></td>
				</tr>
				
<?php 

	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input type=\"checkbox\" name=\"select[]\" value=\"".$row[8]."\"></td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['apellido']."</td>";
		echo"		<td>".$row['direccion']."</td>";
		echo"		<td>".$row['ciudad']."</td>";
		echo"		<td>".$row['celular']."</td>";
		echo"		<td>".$row['telefono']."</td>";
		echo"		<td>".$row['documento']."</td>";
		echo"		<td>".$row['email']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarclient&id_client=".$row['id_client']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&id_client=".$row['id_client']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
	  
?>
		</table>
		</fieldset>
		<div align="right">
		<?php print $_pagi_navegacion;?>
		<input style="margin-left:200px;" type="submit" name="borrar" id="button" value="Borrar Seleccion">
		<button type="submit" name="clie" id="button" onclick="imprimir('clie');">Imprimir</button></div>
		</form>
	</div>
</section>
</body>
 <?php if(isset($_POST['borrar']) && $_POST['borrar'] == 'Borrar Seleccion'){
if (count($_POST['select']))
{
foreach ($_POST['select'] as $v)
{
$sql_delete="DELETE FROM cliente WHERE id_client = '$v'";
$del = mysqli_query($conexion, $sql_delete);
}
}
echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
header('Refresh: 2; URL= index.php?pagina=RClient'); 
require 'cerrar_conexion.php';
exit;
}

mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';

?>
</html>