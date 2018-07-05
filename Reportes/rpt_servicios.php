<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM servicio";

include "paginator.php";

?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
		<div id="contenido">
		<form name="formulario" method="POST" action="index.php?pagina=RServ" >
		<fieldset id="cuadro">
		<legend id="nombre_tabla">Servicios</legend>
			<table id="tabla">
				<tr>
					<td><b>Selct</b></td>
					<td><b>Código</b></td>
					<td><b>Nombre</b></td>
					<td><b>Precio</b></td>
					<td><b>Descripción</b></td>				
				</tr>
				
<?php 

	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input type=\"checkbox\" name=\"select[]\" value=\"".$row[4]."\"></td>";
		echo"		<td>".$row['codigo']."</td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['precio']."</td>";
		echo"		<td>".$row['descripcion']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarserv&codigo=".$row['codigo']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&codigo=".$row['codigo']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
echo "</table>";
?>
		</fieldset>
		<div align="right">
		<?php print $_pagi_navegacion;?>
		<input style="margin-left:200px;" type="submit" name="borrar" id="button" value="Borrar Seleccion">
		<button type="submit" name="serv" id="button" onclick="imprimir('serv');">Imprimir</button></div>
		</form>
	</div>
</section>
</body>
 <?php if(isset($_POST['borrar']) && $_POST['borrar'] == 'Borrar Seleccion'){
if (count($_POST['select']))
{
foreach ($_POST['select'] as $v)
{
$sql_delete="DELETE FROM servicio WHERE codigo = '$v'";
$del = mysqli_query($conexion, $sql_delete);
}
}
echo '<div id="contenido"><div align="center">Registros borrados correctamente</div></div>';
header('Refresh: 2; URL= index.php?pagina=RServ'); 
require 'cerrar_conexion.php';
exit;
}

mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';
?>

</html>