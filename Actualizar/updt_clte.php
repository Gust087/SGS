<?php
 
include "conexion.php";	if (isset ( $_GET['id_client'])){
		$id = $_GET['id_client'];
		$result=mysqli_query($conexion, "SELECT * FROM cliente WHERE id_client = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos del servicio <b>$row[0] $row[1]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['direccion'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
	$apellido = ucwords($_POST['apellido']);
	$direccion = ucwords($_POST['direccion']);
	$ciudad = ucwords($_POST['ciudad']);
	$celular = $_POST['celular'];
	$telefono = $_POST['telefono'];
	$documento = $_POST['documento'];
	$email = $_POST['email'];
	$id = $_POST['id_client'];
			
	$update = mysqli_query($conexion, "UPDATE cliente SET apellido='".$apellido."', nombre='".$nombre."', direccion='".$direccion."', ciudad='".$ciudad."', celular='".$celular."', telefono='".$telefono."', documento='".$documento."', email='".$email."' WHERE id_client = '".$id."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Registro actualizado correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=RClient'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=RClient'); 
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
		  	</br></br></br>
			<div id="column1">
			<label id="label-reg"><b>Nombre:</b></label>
			<input id="input-reg" value=<?php echo "'$row[0]'";?> name="nombre" type="text" required autofocus />
			
			<label id="label-reg"><b>Apellido:</b></label>
			<input id="input-reg" value=<?php echo "'$row[1]'";?> name="apellido" type="text" required />
			
			<label id="label-reg"><b>Dirección:</b></label>
			<input id="input-reg" value=<?php echo "'$row[2]'";?> name="direccion" type="text" required />
			
			<label id="label-reg"><b>Ciudad:</b></label>
			<input id="input-reg" value=<?php echo "'$row[3]'";?> name="ciudad" type="text" required />
			</div>
			<div id="column2">	
			<label id="label-reg"><b>Celular:</b></label>
			<input id="input-reg" value=<?php echo "'$row[4]'";?> name="celular" type="tel"/>
			
			<label id="label-reg"><b>Teléfono:</b></label>
			<input id="input-reg" value=<?php echo "'$row[5]'";?> name="telefono" type="tel"/>
			
			<label id="label-reg"><b>Documento:</b></label>
			<input id="input-reg" value=<?php echo "'$row[6]'";?> name="documento" type="number"/>
			
			<label id="label-reg"><b>Email:</b></label>
			<input id="input-reg" value=<?php echo "'$row[7]'";?> name="email" type="email" />
			</div>
				
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="id_client" value=<?php echo "'$row[8]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=RClient" style="text-decoration:none; color:black;"> Regresar </a></button>
		  </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>