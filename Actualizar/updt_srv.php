<?php

require "select.php"; 
include "conexion.php";	

if (isset ( $_GET['codigo'])){
		$id = $_GET['codigo'];
		$result=mysqli_query($conexion, "SELECT * FROM servicio WHERE codigo = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos del servicio <b>$row[0]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['nombre']) && !empty($_POST['publico']) && !empty($_POST['cat'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
	$publico = $_POST['publico'];
	$descr = $_POST['descripcion'];
	$cat= $_POST['cat'];
	$codigo = $_POST['codigo'];
		
	$update = mysqli_query($conexion, "UPDATE servicio SET id_cat='".$cat."', nombre='".$nombre."', precio='".$publico."', descripcion='".$descr."' WHERE codigo = '".$codigo."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Registro actualizado correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=RServ'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe completar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=RServ'); 
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
				<label id="label-reg"><b>Código:</b></label>
				<input id="input-reg" value=<?php echo "'$row[4]'";?> type="number"  name="cod" readonly />
				</br>
				<label id="label-reg"><b>Nombre:</b></label>
				<input id="input-reg" value=<?php echo "'$row[0]'";?> name="nombre" type="text" required autofocus />
				</br>
		<?php	echo '<label id="label-reg"><b>Categoria:</b></label> <select id="input-reg" name="cat">'.$options_nom_cat_serv.'</select>';
		?>
				</div></br>
				<div id="column2">
				<label id="label-reg"><b>Precio Público:</b></label>
				<input id="input-reg" type="number" step ="any" value=<?php echo "'$row[1]'";?> name="publico"/>
				</br>
				<label id="label-reg"><b>Descripción:</b></label>
				<input id="input-reg" type="text" value=<?php echo "'$row[2]'";?> name="descripcion" />
				</div>
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="codigo" value=<?php echo "'$row[4]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=RServ" style="text-decoration:none; color:black;"> Regresar </a></button>
		    </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>