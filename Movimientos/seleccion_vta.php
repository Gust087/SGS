<?php 
require 'conexion.php';

$num_fact = $_POST['nro_fact'];
$fact = $_POST['fact'];
$pto_vta = $_POST['punto_vta']; 
$cliente =$_POST['id'];
$mbrt = $_POST['membrt'];
$forma_pago = $_POST['forma_pago'];
$fecha = $_POST['fecha'];
$total = $_POST['balance'];

$Venta = "INSERT INTO fact_vta (num_fact, id_punto_vta, tipo_fact, id_membrete, id_client, forma_pago, fecha, total) VALUES ('".$num_fact."','".$pto_vta."','".$fact."','".$mbrt."','".$cliente."', '".$forma_pago."', '".$fecha."', '".$total."') ";
$Venta_in = mysqli_query($conexion, $Venta);
	
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
				continue;}
	}
	$items = "INSERT INTO detalle_fact_vta (id_fact, pto_vta, codigo, nom_prod, mark_prod, cantidad, precio_unit, subtotal) VALUES ('".$num_fact."','".$pto_vta."','".$codigo."', '".$nombre."', '".$marca."','".$cantidad."','".$precio."','".$subtotal."') ";
	$items_in = mysqli_query($conexion, $items);
	
	$consulta = "SELECT existencia FROM producto WHERE codigo='".$codigo."' AND nombre='".$nombre."'";	
	$result = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion). " Query: " . $consulta);
	
	$existencia = 0;
	$campo_exist = mysqli_fetch_array($result);
	$existencia = $campo_exist['existencia'];
		
	$stock = $existencia - $cantidad;
		
	$update = mysqli_query($conexion, "UPDATE producto SET precio_vta='".$precio."', existencia='".$stock."' WHERE codigo='".$codigo."' AND nombre='".$nombre."'");
			
}
?>

<!--body onLoad="imprimirFact(<?php echo"".$num_fact."";?>,<?php echo"".$pto_vta."";?>);">
</body-->
<?php 
if ($update){ 
		header('Refresh: 2; URL= http://localhost/SGS/index.php'); 
		echo '<div id=contenido><div id="contenido"><div id="contenido"><div align="center">La operación ha resultado satisfactoria</div></div></div>';
		require 'cerrar_conexion.php';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=venderProd'); 
		echo '<div id=contenido><div id="contenido"><div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		require 'cerrar_conexion.php';
		exit;
	}
?>
