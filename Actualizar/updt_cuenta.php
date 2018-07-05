<?php
include "conexion.php";	

if (isset ( $_GET['user'])){
		$id = $_GET['user'];
		$result=mysqli_query($conexion, "SELECT * FROM `users` WHERE id_user = $id ;");
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar contraseña del usuario <b>$row[1]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['user'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nom = ucwords($_POST['user']);//Primera Letra de cada palabra en Mayusculas
	$pass = $_POST['pass1'];
	$id = $_POST['id'];
		
	$update = mysqli_query($conexion, "UPDATE users SET password='".$pass."' WHERE id_user = '".$id."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Usuario actualizado correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=rpt_cuenta'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=rpt_cuenta'); 
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
		<legend id="nombre_tabla"><?php echo "Modificar contraseña:";?></legend>
		  <fieldset id="cuadro">
		  	</br></br></br>	
				<div id="column2">
				<label id="label-reg"><b>Nombre:</b></label>
				<input id="input-reg" value=<?php echo "'$row[1]'";?> type="text"  name="user" readonly />
				</br>
				<label id="label-reg"><b>Contraseña:</b></label>
				<input id="input-reg" name="pass1" type="password" required autofocus />
				</br>
				<label id="label-reg"><b>Repetir Contraseña:</b></label>
				<input id="input-reg" name="pass2" type="password" required autofocus />
				</br>
				</div></br>
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="id" value=<?php echo "'$row[0]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=rpt_cuenta" style="text-decoration:none; color:black;"> Regresar </a></button>
		    </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>