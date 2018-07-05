<?php require 'conexion.php';
$user = ucwords($_SESSION['s_username']);
	//	$result=mysqli_query($conexion, "SELECT * FROM users WHERE name = $user");
	//	$row=mysqli_fetch_row($result);
	//	$user = $row['id_user'];  
 require 'select.php';

?>

<!DOCTYPE HTML>
<html lang="es">
<body >
<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=updt_cuenta" name="formulario" >
		<div id="column1">
		<legend id="nombre_tabla" style="margin-left:80px;"><b>Usuario: <?php echo "".$user.""; ?></b></legend>
		</br><fieldset style="margin-right:25px; padding-bottom:35px; width: 300px;border-color:#f8fbf3;border-radius:40px;">
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=updt_cuenta&user=2" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/updt.png">Actualizar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_cuenta&add_cuenta" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/add.png">Agregar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_cuenta" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/delt.png">Eliminar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_cuenta&ver_cuenta" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/search.png">Ver</a></b></label>
		</div>
		</fieldset>
		<div id="column2">
		<legend id="nombre_tabla" style="margin-left:20px;"><b>Encabezado de Factura Venta:</b></legend>
		</br><fieldset style="margin-right:25px; padding-bottom:35px; width: 300px; border-color:#f8fbf3;border-radius:40px;">
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=updt_membrete&id=<?=$ult_mbrt?>" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/updt.png">Actualizar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_membrete&add_membrete" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/add.png">Agregar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_membrete" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/delt.png">Eliminar</a></b></label>
		</br><label id="label-reg" style="margin-left:50px;"><b><td><a href="index.php?pagina=rpt_membrete&ver_membrete" ><img id="icon" style="margin-right:25px" src="/SGS/Iconos/search.png">Ver</a></b></label>
		</div>
		</fieldset>

</form>
</div>
</section>
</body>
</html>