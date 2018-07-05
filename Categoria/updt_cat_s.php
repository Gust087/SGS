<?php
include "conexion.php";	

if (isset ( $_GET['id_cat'])){
		$id = $_GET['id_cat'];
		$result=mysqli_query($conexion, "SELECT * FROM categoria_serv WHERE id_cat = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
		$mensaje = "Actualizar los datos de categoría <b>$row[1]</b>";
	}
	// comprobamos si ha sido enviado el formulario
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
	
	// comprobamos que no lleguen campos vacios
	if(!empty($_POST['codigo'])){
	// creamos las variables que vamos a usar en la consulta UPDATE y le asignamos sus valores			
	$nombre = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
	$descr = $_POST['descripcion'];
	$codigo = $_POST['codigo'];
		
	$update = mysqli_query($conexion, "UPDATE categoria_serv SET nombre='".$nombre."', descripcion='".$descr."' WHERE id_cat = '".$codigo."';")or die ( "Error en query: $update, el error  es: " . mysqli_error());
	
	echo '<div id="contenido"><div align="center">Categoría actualizada correctamente</div></div>';
	header('Refresh: 2; URL= index.php?pagina=CatS'); 
	require 'cerrar_conexion.php';
	exit;

	}else{
		echo '<div id="contenido"><div align="center">Debe llenar todos los campos</div></div>';
		header('Refresh: 2; URL= index.php?pagina=CatS'); 
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
				<input id="input-reg" value=<?php echo "'$row[0]'";?> type="number"  name="cod" readonly />
				</br>
				<label id="label-reg"><b>Nombre:</b></label>
				<input id="input-reg" value=<?php echo "'$row[1]'";?> name="nombre" type="text" required autofocus />
				</br>
				</div></br>
				<div id="column2">
				<label id="label-reg"><b>Descripción:</b></label>
				<input id="input-reg" type="text" value=<?php echo "'$row[2]'";?> name="descripcion" />
				</div>
			</fieldset>
			<div id="sector_button">
				<input type="hidden" name="codigo" value=<?php echo "'$row[0]'";?> />
				<input id="button" type="submit" name="actualizar" value="Actualizar" />
				<button id="button"><a href="index.php?pagina=CatS" style="text-decoration:none; color:black;"> Regresar </a></button>
		    </div>
		</form>
	</section>
</body>
</html>

<?php }include "cerrar_conexion.php";
?>