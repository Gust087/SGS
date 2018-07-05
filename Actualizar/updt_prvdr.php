<?php

include "conexion.php";	if (isset ( $_GET['id_proveed'])){
		$id = $_GET['id_proveed'];
		$result=mysqli_query($conexion, "SELECT * FROM proveedor WHERE id_proveed = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos del proveedor <b>$row[0]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['nombre']) && !empty($_POST['id_prvdr']) && !empty($_POST['email'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
	$direccion = ucwords($_POST['direccion']);
	$ciudad = ucwords($_POST['ciudad']);
	$celular = $_POST['celular'];
	$telefono = $_POST['telefono'];
	$descr = $_POST['descripcion'];
	$email = $_POST['email'];
	$estado = $_POST['estado'];
	$id = $_POST['id_prvdr'];
	
	$update = mysqli_query($conexion, "UPDATE proveedor SET nombre='".$nombre."', direccion='".$direccion."', ciudad='".$ciudad."', celular='".$celular."', telefono='".$telefono."', descripcion='".$descr."', email='".$email."', estado='".$estado."' WHERE id_proveed = '".$id."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Registro actualizado correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=RProv'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=RProv'); 
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
			<label id="label-reg"><b>Nombre:</b></label>
			<input id="input-reg" value=<?php echo "'$row[0]'";?> name="nombre" type="text" required autofocus />
		
			<label id="label-reg"><b>Dirección:</b></label>
			<input id="input-reg" value=<?php echo "'$row[1]'";?> name="direccion" type="text"/>
			
			<label id="label-reg"><b>Ciudad:</b></label>
			<input id="input-reg" value=<?php echo "'$row[2]'";?> name="ciudad" type="text"/>
			
			<label id="label-reg"><b>Celular:</b></label>
			<input id="input-reg" value=<?php echo "'$row[3]'";?> name="celular" type="tel"/>
			</div>
			<div id="column2">	
			<label id="label-reg"><b>Teléfono:</b></label>
			<input id="input-reg" value=<?php echo "'$row[4]'";?> name="telefono" type="tel"/>
			
			<label id="label-reg"><b>Decripción:</b></label>
			<input id="input-reg" value=<?php echo "'$row[5]'";?> name="descripcion" type="text"/>
			
			<label id="label-reg"><b>Email:</b></label>
			<input id="input-reg" value=<?php echo "'$row[6]'";?> name="email" type="email"/>
			
			<label id="label-reg"><b>Estado:</b></label>
			<input id="input-reg" value=<?php echo "'$row[7]'";?> name="estado" type="text"/>
		</div>
				
		</fieldset>
			<div id="sector_button">
				<input type="hidden" name="id_prvdr" value=<?php echo "'$row[8]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=RProv" style="text-decoration:none; color:black;"> Regresar </a></button>
		  </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>