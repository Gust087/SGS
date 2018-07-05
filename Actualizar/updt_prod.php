<?php

require "select.php"; 
include "conexion.php";
	if (isset ( $_GET['cod'])){
		$id = $_GET['cod'];
		$result=mysqli_query($conexion, "SELECT * FROM producto WHERE codigo = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error($conexion));
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos del producto <b>$row[1]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['mark']) && !empty($_POST['model']) && !empty($_POST['base'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores	
	
	$codigo = $_POST['cod'];
	$nombre = ucwords($_POST['nom']);//Primera Letra de cada palabra en Mayusculas
	$marca = ucwords($_POST['mark']);
	$modelo = ucwords($_POST['model']);
	$base = $_POST['base'];
	$publico = $_POST['pub'];
	$stock = $_POST['stock'];
	$descr = $_POST['descr'];
	$max = $_POST['max'];
	$min = $_POST['min'];
	$cat= $_POST['cat'];
		
	$update = mysqli_query($conexion, "UPDATE producto SET marca='".$marca."', modelo='".$modelo."', precio_cpra='".$base."', precio_vta='".$publico."', existencia='".$stock."', descripcion='".$descr."', max='".$max."', min='".$min."', id_cat='".$cat."' WHERE codigo = '".$codigo."' AND nombre = '".$nombre."';")or die ( "Error en query: $update, el error  es: " . mysqli_error($conexion));
	
		echo '<div id="contenido"><div align="center">Registro actualizado correctamente</div></div>';
		header('Refresh: 2; URL= index.php?pagina=RProd'); 
		require 'cerrar_conexion.php';
		exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=RProd'); 
		require 'cerrar_conexion.php';
		exit;
	
	}
	}else{
		// mostramos el mensaje
		echo "<p>".$mensaje."</p>";?>
		
<!DOCTYPE HTML>
<html lang="es">
<body >
  <body>
	<section id="seccion">
		<form name="formulario" action="<?php $_SERVER['PHP_SELF']; ?>" method= "POST">
		<legend id="nombre_tabla"><?php echo "Datos:";?></legend>
		  <fieldset id="cuadro">
		  	</br>
				<div id="column1">
				<label id="label-reg"><b>Código:</b></label>
				<input id="input-reg" value=<?php echo "'$row[0]'";?> type="number"  name="cod" readonly />
					
				<label id="label-reg"><b>Nombre:</b></label>
				<input id="input-reg" name="nom" value=<?php echo "'$row[1]'";?> type="text" readonly>
			
		<?php	echo '<label id="label-reg"><b>Categoria:</b></label> <select id="input-reg" name="cat">'.$options_nom_cat_prod.'</select>';?>
				
				<label id="label-reg"><b>Marca:</b></label>
				<input id="input-reg" name="mark" value=<?php echo "'$row[3]'";?> type="text" required autofocus />
				
				<label id="label-reg"><b>Modelo:</b></label>
				<input id="input-reg" type="text"  name="model" value=<?php echo "'$row[4]'";?> required />
				
				<label id="label-reg"><b>Precio Base:</b></label>
				<input id="input-reg" type="number" step="any"  name="base" value=<?php echo "'$row[5]'";?> required />
				</div>
				<div id="column2">
				<label id="label-reg"><b>Precio Público:</b></label>
				<input id="input-reg" type="number" step="any"  name="pub" value=<?php echo "'$row[6]'";?> />
				
				<label id="label-reg"><b>Existencia:</b></label>
				<input id="input-reg" type="number" name="stock" value=<?php echo "'$row[7]'";?> required />
				
				<label id="label-reg"><b>Descripción:</b></label>
				<input id="input-reg" type="text"  name="descr" value=<?php echo "'$row[8]'";?> />
				
				<label id="label-reg"><b>Stock Máx.:</b></label>
				<input id="input-reg" type="number"  name="max" value=<?php echo "'$row[9]'";?> />
				
				<label id="label-reg"><b>Stock Mín.:</b></label>
				<input id="input-reg" type="number"  name="min" value=<?php echo "'$row[10]'";?> />
				</div>
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="cod" value=<?php echo "'$row[0]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=RProd" style="text-decoration:none; color:black;"> Regresar </a></button>
			</div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>