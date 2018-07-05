<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM categoria_serv";

include "paginator.php";

?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
	<div id="contenido">
		<form name="formulario" method="POST" action="index.php?pagina=cat_serv">
		<fieldset id="cuadro">
			<legend id="nombre_tabla">Categorías Servicios</legend>
			</br>
			<div style="margin-left:25px;margin-top:15px;margin-right:25px; float:left">
			<button style="border:none; background-color:white;"><img src="Iconos/agregar.png" /></button>
			</div>
			<div id="column2">
			<table id="tabla">
				<tr>
					<td><b>Código</b></td>
					<td><b>Nombre</b></td>
					<td><b>Descripción</b></td>
				</tr>
				
<?php 

	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td>".$row['id_cat']."</td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['descripcion']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarCatS&id_cat=".$row['id_cat']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&id_catS=".$row['id_cat']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
	  
?>
		</table>
		</div>
		</fieldset>
		<div align="right" style="margin-right:200px;">
		<?php print $_pagi_navegacion;?>
		</div>
		</form>			
</section>
</body>
 <?php 
mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';
?>
</html>