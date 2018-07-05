<?php 
require 'conexion.php';

$registros = 2; 

$pagina = isset ($_GET['pagina']) ? (int) $_GET['pagina'] : 0;

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
} 

if($result = mysqli_query($conexion, "SELECT * FROM producto WHERE 'visible' = 0")){

	$total_registros = mysqli_num_rows($result) or die ( "Error en query: $result, el error  es: No hay datos");
	$result = mysqli_query($conexion, "SELECT * FROM producto WHERE 'visible' = 0 ORDER BY nombre DESC LIMIT $inicio, $registros");
	$total_paginas = ceil($total_registros / $registros);
}
?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
		<form method="POST" action="rpt_productos.php" name="formulario" >
		<fieldset style='width:990px; text-align:center; border: 1px solid #000000; display: block;'>
			<legend >Productos</legend>
			<table>
				<tr>
					<td><b>Selección</b></td>
					<td><b>Código</b></td>
					<td><b>Nombre</b></td>
					<td><b>Marca</b></td>
					<td><b>Modelo</b></td>
					<td><b>Precio Compra</b></td>
					<td><b>Precio Venta</b></td>
					<td><b>Existencia</b></td>
					<td><b>Descripción</b></td>
					<td><b>Máximo</b></td>
					<td><b>Mínimo</b></td>
					<td><b></b></td>					
				</tr>
				
<?php 
	while($row=mysqli_fetch_row($result)){
	  echo" <tr>
	  <tr bgcolor='#FFFACD'>
<td><div align=\"center\"><font color=\"#000000\"><font face=\"Verdana\"><input type=\"checkbox\" name=\"select[]\" value=\"".$row[11]."\"></font></font></div></td>
				<td>$row['codigo']</td>
				<td>$row['nombre']</td>
				<td>$row['marca']</td>
				<td>$row['modelo']</td>
				<td>$row['precio_cpra']</td>
				<td>$row['precio_vta']</td>
				<td>$row['existencia']</td>
				<td>$row['descripcion']</td>
				<td>$row['max']</td>
				<td>$row['min']</td>
				<td><a href='../Actualizar/updt_prod.php?id_prod=$row['id_prod']'>Actualizar</a></td>				
				<td><a href='../Borrar/borrar_registros.php?id_prod=$row['id_prod']'>Borrar</a></td>
			</tr>";}
	
//	echo"</table></br></br>";
print "</form> \n";
echo "</table> \n <p><p>";
print "<div align=\"center\"><input type='submit' name='pedir' value='Realizar Pedido'></div>";
if(isset($_POST['pedir']) && $_POST['pedir'] == 'Realizar Pedido'){
if (count($_POST['select']))
{
$id_fact = $ult_ped;
foreach ($_POST['select'] as $v)
{
$sql_insert="INSERT INTO detalle_prod (id_prod, id_fact) VALUES ('".$v."', '".$id_fact."')";
$ins = mysqli_query($conexion, $sql_insert);
}
header('Refresh: 2; URL= http://localhost/SGS/Movimientos/detalles.php'); 
require 'cerrar_conexion.php';
exit;
}
}
mysqli_free_result($result);
require 'cerrar_conexion.php';
?>
		</fieldset>
		</form>
	</section>
</body>
<footer style='text-align:center; width:990px;'>
<?php
	if(($pagina - 1) > 0) {
		echo "<a href='rpt_productos.php?pagina=".($pagina-1)."'>< Anterior</a>";} 
	for ($i=1; $i<=$total_paginas; $i++){
		if ($pagina == $i) {
			echo "<b>".$pagina."</b> ";} 
		else {
			echo "<a href='rpt_productos.php?pagina=$i'>$i</a> ";} 
	}
	if(($pagina + 1)<=$total_paginas) {
		echo "<a href='rpt_productos.php?pagina=".($pagina+1)."'>Siguiente ></a>";} 
?>
</footer>
</html>