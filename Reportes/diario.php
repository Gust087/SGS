<?php
require 'conexion.php';
error_reporting(0);
ini_set("date.timezone", "America/Argentina/Buenos_Aires");

$fecha = date("Ymd");

$_pagi_sql = "SELECT fecha, id_punto_venta, num_fact,
 nombre AS membrete, 'Hiperlink' AS destinatario, 
 'Compra' AS operacion, nom_prod, 
 '+' AS signo, cantidad,
 subtotal AS INGRESO, 0 AS EGRESO
FROM ENTRADAS
WHERE fecha = ".$fecha."
UNION ALL
SELECT fecha, id_punto_venta, num_fact, 
'Hiperlink' AS membrete, nombre AS destinatario, 
'Venta' AS operacion, nom_prod,
'-' AS signo, cantidad, 
0 AS INGRESO, subtotal AS EGRESO
FROM SALIDAS
WHERE fecha = ".$fecha."
ORDER BY fecha";

include "paginator.php";

?>

<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" name="formulario">
		<fieldset  id="cuadro" >
			<legend id="nombre_tabla">Reporte Diario</legend>
			<table id="tabla">
				<tr>
					<td><b>Fecha Operaci&oacute;n</b></td>
					<td><b>Nro. Factura</b></td>
					<td><b>Membrete</b></td>	
					<td><b>Destinatario</b></td>	
					<td><b>Operaci&oacute;n</b></td>	
					<td><b>Stock</b></td>		
					<td><b>Debe</b></td>		
					<td><b>Haber</b></td>		
				</tr>
				
<?php
	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr> ";
		echo"		<td>".$row['fecha']."</td>";
		$pto_vta = str_pad($row['id_punto_venta'], 4, "0", STR_PAD_LEFT);
		$num_fact = str_pad($row['num_fact'], 8, "0", STR_PAD_LEFT);
		echo"		<td>".$pto_vta."";
		echo" 		".$num_fact."</td>";
		echo"		<td>".$row['membrete']."</td>";
		echo"		<td>".$row['destinatario']."</td>";
		echo"		<td>".$row['operacion']."";
		echo"			: ".$row['nom_prod']."</td>";
		echo"		<td>".$row['signo']."";					
		echo"			".$row['cantidad']."</td>";					
		echo"		<td>".$row['INGRESO']."</td>";					
		echo"		<td>".$row['EGRESO']."</td>";					
	echo"		</tr>";}
?>
		</table>
	</fieldset>
	<div align="right">
	<?php print $_pagi_navegacion;?>
		<button style="margin-left:200px;" type="submit" name="dia" id="button" onclick="imprimir('dia');">Imprimir</button></div>
		</form>
</div>
</section>
</body>
</html>