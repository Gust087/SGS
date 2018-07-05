<?php
include "conexion.php";	

if (isset ( $_GET['id'])){
		$id = $_GET['id'];
		$result=mysqli_query($conexion, "SELECT * FROM membrete WHERE id_membrete = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos del membrete <b>$row[1]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['nombre'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$direccion = $_POST['direccion'];
	$slogan = $_POST['slogan'];
	$email = $_POST['email'];
	$id = $_POST['id'];
	
	$update = mysqli_query($conexion, "UPDATE membrete SET nombre='".$nombre."', telefono='".$telefono."', celular='".$celular."', direccion='".$direccion."', slogan='".$slogan."', email='".$email."' WHERE id_membrete = '".$id."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Encabezado actualizado correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=rpt_membrete'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=rpt_membrete'); 
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
		<legend id="nombre_tabla"><?php echo "Datos encabezado:";?></legend>
		  <fieldset id="cuadro">
		  	</br></br></br>	
				<div id="column1">
				<label id="label-reg"><b>Nombre:</b></label>
				<input id="input-reg" value=<?php echo "'$row[1]'";?> name="nombre" type="text" required autofocus />
				</br>
				<label id="label-reg"><b>Teléfono:</b></label>
				<input id="input-reg" value=<?php echo "'$row[2]'";?> type="number"  name="telefono" required />
				</br>
				<label id="label-reg"><b>Celular:</b></label>
				<input id="input-reg" value=<?php echo "'$row[3]'";?> type="number"  name="celular" required />
				</br>
				</div></br>
				<div id="column2">
				<label id="label-reg"><b>Dirección:</b></label>
				<input id="input-reg" type="text" value=<?php echo "'$row[4]'";?> name="direccion" required />
				<label id="label-reg"><b>Slogan:</b></label>
				<input id="input-reg" value=<?php echo "'$row[5]'";?> type="text"  name="slogan" required />
				</br>
				<label id="label-reg"><b>email:</b></label>
				<input id="input-reg" value=<?php echo "'$row[6]'";?> type="text"  name="email" required />
				</br>
				</div>
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="id" value=<?php echo "'$row[0]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=CatP" style="text-decoration:none; color:black;"> Regresar </a></button>
		    </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>