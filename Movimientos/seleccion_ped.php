<?php 
require 'conexion.php';

$forma_pago = $_POST['forma_pago'];
$prov = $_POST['prov'];
$fact = $_POST['nro_fact'];
$pto_vta = $_POST['punto_vta'];
$fecha = $_POST['fecha'];
$total = $_POST['balance'];

$compra = "INSERT INTO fact_cpra (num_fact, id_punto_vta, id_provdr, forma_pago, fecha, subtotal, total) VALUES ('".$fact."','".$pto_vta."','".$prov."', '".$forma_pago."', '".$fecha."', '".$total."', '".$total."') ";
$compra_in = mysqli_query($conexion, $compra);

$qry_id="Select id_fact_cpra FROM fact_cpra ORDER BY id_fact_cpra DESC LIMIT 1";
$ult_id = mysqli_query($conexion, $qry_id);	
$id = '';
$row_ult_id = mysqli_fetch_array($ult_id);
$id = $row_ult_id['id_fact_cpra'];
		

$productos = array();
$i = 0;
$x=0;

foreach($_POST as $nombre => $valor){
	$esta = strpos($nombre, "items");
	if ($esta === FALSE){}
	else{
		$productos[$i][$x] = $valor; 
		$x++;}
	if ($x==6){	$i++; $x=0;}
}
 
for($a=0; $a<count($productos); $a++){
	for($b=0; $b<count($productos[$a]); $b++){
		switch ($b){ 
			case 0:
				$codigo=$productos[$a][$b];
				continue;
			case 1:
				$nombre=$productos[$a][$b];
				continue;
			case 2:
				$marca=$productos[$a][$b];
				continue;
			case 3:
				$precio=$productos[$a][$b];
				continue;
			case 4:
				$cantidad=$productos[$a][$b];
				continue;
			case 5:
				$subtotal=$productos[$a][$b];
				continue;
		}
	}
	$items = "INSERT INTO detalle_fact_cpra (id_fact, codigo, nom_prod, mark_prod, cantidad, precio_unit, subtotal) VALUES ('".$id."','".$codigo."', '".$nombre."', '".$marca."','".$cantidad."','".$precio."','".$subtotal."') ";
	$items_in = mysqli_query($conexion, $items);
	
	$consulta = "SELECT existencia FROM producto WHERE codigo='".$codigo."' AND nombre='".$nombre."'";	
	$result = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion). " Query: " . $consulta);
	
	$existencia = 0;
	$campo_exist = mysqli_fetch_array($result);
	$existencia = $campo_exist['existencia'];
		
	$stock = $existencia + $cantidad;
		
	$update = mysqli_query($conexion, "UPDATE producto SET precio_cpra='".$precio."', existencia='".$stock."' WHERE codigo='".$codigo."' AND nombre='".$nombre."'");
			
}
if ($update){ 
		header('Refresh: 2; URL= http://localhost/SGS/index.php'); 
		echo '<div id=contenido><div id="contenido"><div id="contenido"><div align="center">La operación ha resultado satisfactoria</div></div></div>';
		require 'cerrar_conexion.php';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=cargarItems'); 
		echo '<div id=contenido><div id="contenido"><div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		require 'cerrar_conexion.php';
		exit;
}
?>