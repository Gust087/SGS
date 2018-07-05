<?php
require 'conexion.php';
error_reporting(0);

if(isset($_GET['f_inicial'])){
	$f_in= $_GET['f_inicial'];
	$f_fi= $_GET['f_final'];
}
else{
	$f_in= $_POST['f_inicial'];
	$f_fi= $_POST['f_final'];

}

$registros = 5; 

$pag = isset ($_GET['pag']) ? (int) $_GET['pag'] : 0;

if (!$pag) {
$inicio = 0;
$pag = 1;
}
else {
$inicio = ($pag - 1) * $registros;
} 
$_pagi_sql = "SELECT fecha, id_punto_venta, num_fact,
 nombre AS membrete, 'Hiperlink' AS destinatario, 
 'Compra' AS operacion, nom_prod, 
 '+' AS signo, cantidad,
 subtotal AS INGRESO, 0 AS EGRESO
FROM ENTRADAS
WHERE fecha  BETWEEN '$f_in' AND '$f_fi'
UNION ALL
SELECT fecha, id_punto_venta, num_fact, 
'Hiperlink' AS membrete, nombre AS destinatario, 
'Venta' AS operacion, nom_prod,
'-' AS signo, cantidad, 
0 AS INGRESO, subtotal AS EGRESO
FROM SALIDAS
WHERE fecha  BETWEEN '$f_in' AND '$f_fi'
ORDER BY fecha";

$result = mysqli_query($conexion, $_pagi_sql);
$total_registros = mysqli_num_rows($result);
$result = mysqli_query($conexion, "".$_pagi_sql." DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);

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
	while($row=mysqli_fetch_array($result)){
	  echo" <tr>";
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
		<!--?php// print $_pagi_navegacion;?-->
		<?php
	if(($pag - 1) > 0) {
		echo "<a href='index.php?pagina=x_fechas&pag=".($pag-1)."&f_inicial=".$f_in."&f_final=".$f_fi."'>< Anterior </a>";} 
	for ($i=1; $i<=$total_paginas; $i++){
		if ($pag == $i) {
			echo "<b>".$pag."</b> ";} 
		else {
		if(($pag-1) == $i OR ($pag+1) == $i){
			echo "<a href='index.php?pagina=x_fechas&pag=".$i."&f_inicial=".$f_in."&f_final=".$f_fi."'>".$i."</a> ";} 
			}
	}
	if(($pag + 1)<=$total_paginas) {
		echo "<a href='index.php?pagina=x_fechas&pag=".($pag+1)."&f_inicial=".$f_in."&f_final=".$f_fi."'>Siguiente ></a>";} 
	$f_in= str_replace("-", "", $f_in);//se les borra los guiones medios.
	$f_fi= str_replace("-", "", $f_fi);//se les borra los guiones medios.
	?>
		<button style="margin-left:200px;" type="submit" name="sali" id="button" onclick="imprimirMov('x_fecha',<?php echo"".$f_in."";?>,<?php echo"".$f_fi."";?>);">Imprimir</button></div>
	</form>
</div>
</section>
</body>
</html>