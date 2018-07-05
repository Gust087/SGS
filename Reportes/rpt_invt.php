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
$_pagi_sql = "SELECT * FROM inventario WHERE fecha BETWEEN '$f_in' AND '$f_fi'";
$result = mysqli_query($conexion, $_pagi_sql);
$total_registros = mysqli_num_rows($result);
$result = mysqli_query($conexion, "SELECT * FROM inventario WHERE fecha BETWEEN  '$f_in' AND '$f_fi' ORDER BY num_inv DESC LIMIT $inicio, $registros");
//$result = mysqli_query($conexion, "SELECT * FROM servicio WHERE 'visible' = 0 ORDER BY nombre DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros);
//include "paginator.php";
?>
<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" name="formulario" action="index.php">
		<fieldset  id="cuadro" >
			<legend id="nombre_tabla">Inventarios</legend>
			<table id="tabla">
				<tr>
					<td><b>Nro.</b></td>
					<td><b>Código Producto</b></td>
					<td><b>Nombre Producto</b></td>	
					<td><b>Fecha</b></td>
					<td><b>Stock Sistema</b></td>
					<td><b>Stock Real</b></td>
					<td><b>Descripción Inventario</b></td>							
				</tr>
				
<?php 
	while($row=mysqli_fetch_array($result)){
	  echo" <tr>";
		echo"		<td>".$row['num_inv']."</td>";
		echo"		<td>".$row['codigo']."</td>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['fecha']."</td>";
		echo"		<td>".$row['cant_prod']."</td>";
		echo"		<td>".$row['valor_real']."</td>";					
		echo"		<td>".$row['descripcion']."</td>";					
	echo"		</tr>";}
?>
		</table>
	</fieldset>
	<div align="right">
		<!--?php// print $_pagi_navegacion;?-->
		<?php
	if(($pag - 1) > 0) {
		echo "<a href='index.php?pagina=rpt_invt&pag=".($pag-1)."&f_inicial=".$f_in."&f_final=".$f_fi."'>< Anterior </a>";} 
	for ($i=1; $i<=$total_paginas; $i++){
		if ($pag == $i) {
			echo "<b>".$pag."</b> ";} 
		else {
		if(($pag-1) == $i OR ($pag+1) == $i){
			echo "<a href='index.php?pagina=rpt_invt&pag=".$i."&f_inicial=".$f_in."&f_final=".$f_fi."'>".$i."</a> ";} 
			}
	}
	if(($pag + 1)<=$total_paginas) {
		echo "<a href='index.php?pagina=rpt_invt&pag=".($pag+1)."&f_inicial=".$f_in."&f_final=".$f_fi."'>Siguiente ></a>";} 

	$f_in= str_replace("-", "", $f_in);//se les borra los guiones medios.
	$f_fi= str_replace("-", "", $f_fi);//se les borra los guiones medios.
	?>
		<button style="margin-left:200px;" type="submit" name="sali" id="button" onclick="imprimirMov('invt',<?php echo"".$f_in."";?>,<?php echo"".$f_fi."";?>);">Imprimir</button></div>
	</form>
</div>
</section>
</body>
</html>