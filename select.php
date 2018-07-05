<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con los nombres de las formas de pago !-->
	<?php
		$sql_f_p = "SELECT DISTINCT tipo, id_forma_pago FROM forma_pago ORDER BY tipo ASC ";
		$result_f_p = mysqli_query($conexion, $sql_f_p) or die(mysqli_error($conexion). " Query: " . $sql_f_p);
		$options_nom_f_p = '';
		while ($row_nom_f_p = mysqli_fetch_array($result_f_p))
			{	$options_nom_f_p = $options_nom_f_p.'<option value="'.$row_nom_f_p['id_forma_pago'].'">'.$row_nom_f_p['tipo'].'</option>';}
		/* liberar la serie de resultados */
		mysqli_free_result($result_f_p);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con los nombres de FORMAS PAGO!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con los nombres de las formas de pago !-->
	<?php
		$sql_membrt = "SELECT DISTINCT nombre, id_membrete FROM membrete ORDER BY id_membrete ASC ";
		$result_membrt = mysqli_query($conexion, $sql_membrt) or die(mysqli_error($conexion). " Query: " . $sql_membrt);
		$options_membrt= '';
		while ($row_membrt = mysqli_fetch_array($result_membrt))
			{	$options_membrt = $options_membrt.'<option value="'.$row_membrt['id_membrete'].'">'.$row_membrt['id_membrete'].', '.$row_membrt['nombre'].'</option>';}
		/* liberar la serie de resultados */
		mysqli_free_result($result_membrt);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con los nombres de FORMAS PAGO!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con los nombres de las categorias !-->
	<?php
		$sql_cat_serv = "SELECT DISTINCT nombre, id_cat FROM categoria_serv ORDER BY nombre ASC ";
		$result_cat_serv = mysqli_query($conexion, $sql_cat_serv) or die(mysqli_error($conexion). " Query: " . $sql_cat_serv);
		$options_nom_cat_serv = '';
		while ($row_nom_cat_serv = mysqli_fetch_array($result_cat_serv))
			{	$options_nom_cat_serv = $options_nom_cat_serv.'<option value="'.$row_nom_cat_serv['id_cat'].'">'.$row_nom_cat_serv['nombre'].'</option>';}
		/* liberar la serie de resultados */
		mysqli_free_result($result_cat_serv);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con los nombres de CATEGORIA_SERV!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con los nombres de las categorias !-->
	<?php
		$sql_cat_prod = "SELECT DISTINCT nombre, id_cat FROM categoria_prod ORDER BY nombre ASC ";
		$result_cat_prod = mysqli_query($conexion, $sql_cat_prod) or die(mysqli_error($conexion). " Query: " . $sql_cat_prod);
		$options_nom_cat_prod = '';
		while ($row_nom_cat_prod = mysqli_fetch_array($result_cat_prod))
			{	$options_nom_cat_prod = $options_nom_cat_prod.'<option value="'.$row_nom_cat_prod['id_cat'].'">'.$row_nom_cat_prod['nombre'].'</option>';}
		/* liberar la serie de resultados */
		mysqli_free_result($result_cat_prod);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con los nombres de CATEGORIA_PROD!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con los nombres de las proveedores !-->
	<?php
		$sql_prvdr = "SELECT DISTINCT nombre, id_proveed FROM proveedor ORDER BY nombre ASC ";
		$result_prvdr = mysqli_query($conexion, $sql_prvdr) or die(mysqli_error($conexion). " Query: " . $sql_prvdr);
		$options_nom_prov = '';
		while ($row_nom_prov = mysqli_fetch_array($result_prvdr))
			{	$options_nom_prov = $options_nom_prov.'<option value="'.$row_nom_prov['id_proveed'].'">'.$row_nom_prov['nombre'].'</option>';}
		/* liberar la serie de resultados */
		mysqli_free_result($result_prvdr);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con los nombres de PROVEEDOR!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con el registro del ultimo compra !-->
	<?php
		$sql_ing = "SELECT num_fact, fecha FROM fact_cpra ORDER BY fecha DESC LIMIT 1 ";
		$result_ing = mysqli_query($conexion, $sql_ing) or die(mysqli_error($conexion). " Query: " . $sql_ing);
		$ult_ing = '';
		$row_ult_ing = mysqli_fetch_array($result_ing);
		$ult_ing = $row_ult_ing['num_fact'];
		/* liberar la serie de resultados */
		mysqli_free_result($result_ing);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con ultimo COMPRA!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con el registro del ultimo detalle !-->
	<?php
		$sql_det = "SELECT id_detalle FROM detalle_fact_cpra ORDER BY id_detalle DESC LIMIT 1 ";
		$result_det = mysqli_query($conexion, $sql_det) or die(mysqli_error($conexion). " Query: " . $sql_det);
		$ult_det = '';
		$row_ult_det = mysqli_fetch_array($result_det);
		$ult_det = $row_ult_det['id_detalle'];
		/* liberar la serie de resultados */
		mysqli_free_result($result_det);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con ultimo DETALLE!-->
<?php require 'conexion.php'; ?>

<!--INICIO  construccion del select con el registro del ultimo vta !-->
	<?php
		$sql_egr = "SELECT * FROM fact_vta ORDER BY fecha DESC LIMIT 1 ";
		$result_egr = mysqli_query($conexion, $sql_egr) or die(mysqli_error($conexion). " Query: " . $sql_egr);
		$ult_egr = '';
		$row_ult_egr = mysqli_fetch_array($result_egr);
		$ult_egr = $row_ult_egr['num_fact'];
		$ult_mbrt = $row_ult_egr['id_membrete'];
		// liberar la serie de resultados 
		mysqli_free_result($result_egr);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con ultimo VENTA!-->
<?php require 'conexion.php'; ?>
<!--INICIO  construccion del select con el registro del ultimo detalle !-->
	<?php/*
		$sql_det_vta = "SELECT * FROM detalle_fact_vta WHERE id_fact = ".$ult_egr." ORDER BY id_detalle DESC";
		$result_det_vta = mysqli_query($conexion, $sql_det_vta) or die(mysqli_error($conexion). " Query: " . $sql_det_vta);
		$ult_det_vta = '';
		$row_ult_det_vta = mysqli_fetch_array($result_det_vta);
		$ult_det_vta = $row_ult_det_vta['id_detalle'];
		/* liberar la serie de resultados 
		mysqli_free_result($result_det_vta);

		/* cerrar la conexión */
		mysqli_close($conexion);
	?> 
<!--FIN  construccion del select con ultimo DETALLE!-->