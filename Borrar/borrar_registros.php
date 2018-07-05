<?php
include "conexion.php";	
error_reporting(0);

	if (isset($_GET['nombre'])){
		if(isset ( $_GET['cod'])){
		$id = $_GET['cod'];
		$nom = $_GET['nombre'];
		$val = 0;
		$result=mysqli_query($conexion, "SELECT * FROM producto WHERE codigo='".$id."' AND nombre='".$nom."'") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}}
	if (isset ( $_GET['codigo'])){
		$id = $_GET['codigo'];
		$val = 1;
		$result=mysqli_query($conexion, "SELECT * FROM servicio WHERE codigo = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}
	if (isset ( $_GET['id_client'])){
		$id = $_GET['id_client'];
		$val = 2;
		$result=mysqli_query($conexion, "SELECT * FROM cliente WHERE id_client = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}
	if (isset ( $_GET['id_proveed'])){
		$id = $_GET['id_proveed'];
		$val = 3;
		$result=mysqli_query($conexion, "SELECT * FROM proveedor WHERE id_proveed = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}
	if (isset ( $_GET['id_catP'])){
		$id = $_GET['id_catP'];
		$val = 4;
		$result=mysqli_query($conexion, "SELECT * FROM categoria_prod WHERE id_cat = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}	
	if (isset ( $_GET['id_catS'])){
		$id = $_GET['id_catS'];
		$val = 5;
		$result=mysqli_query($conexion, "SELECT * FROM categoria_serv WHERE id_cat = $id ;") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}	if (isset($_GET['user'])){
		$id = $_GET['user'];
		$val = 6;
		$result=mysqli_query($conexion, "SELECT * FROM users WHERE id_user='".$id."'") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$val = 7;
		$result=mysqli_query($conexion, "SELECT * FROM membrete WHERE id_membrete='".$id."'") or die ( "Error en query: $result, el error  es: " . mysqli_error());
		$row=mysqli_fetch_row($result);
	}

	// comprobamos si ha sido confirmado
	if(isset($_POST['borrar']) && $_POST['borrar'] == 'Borrar'){
	if (isset($_POST['val']) && $_POST['val'] == 0 ){	
			$codigo = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM producto WHERE codigo = '".$codigo."'")or die ( "Error en query: $delete, el error  es: " . mysqli_error());
			echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=RProd'); 
			require 'cerrar_conexion.php';
			exit;
	}elseif (isset($_POST['val']) && $_POST['val'] == 1 ){	
			$codigo = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM servicio WHERE codigo = '".$codigo."'")or die ( "Error en query: $delete, el error  es: " . mysqli_error());
			echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=RServ'); 
			require 'cerrar_conexion.php';
			exit;
	}elseif (isset($_POST['val']) && $_POST['val'] == 2 ){	
			$id_client = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM cliente WHERE id_client = '".$id_client."'")or die ( "Error en query: $delete, el error  es: " . mysqli_error());
			echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=RClient'); 
			require 'cerrar_conexion.php';
			exit;
	}elseif (isset($_POST['val']) && $_POST['val'] == 3 ){	
			$id_proveed = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM proveedor WHERE id_proveed = '".$id_proveed."'")or die ( "Error en query: $delete, el error  es: " . mysqli_error());
			echo '<div id="contenido"><div align="center">Registro borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=RProv'); 
			require 'cerrar_conexion.php';
			exit;
	}elseif (isset($_POST['val']) && $_POST['val'] == 4 ){	
			$id_catP = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM categoria_prod WHERE id_cat = '".$id_catP."'")or die ( "Error en query. La categoria tiene productos asociados.  " . mysqli_error());
			echo '<div id="contenido"><div align="center">Categoría borrada correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=CatP'); 
			require 'cerrar_conexion.php';
			exit;
	}elseif (isset($_POST['val']) && $_POST['val'] == 5 ){	
			$id_catS = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM categoria_serv WHERE id_cat = '".$id_catS."'")or die ( "Error en query. La categoria tiene productos asociados. " . mysqli_error());
			echo '<div id="contenido"><div align="center">Categoría borrada correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=CatS'); 
			require 'cerrar_conexion.php';
			exit;
	}
	elseif (isset($_POST['val']) && $_POST['val'] == 6 ){	
			$id_user = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM users WHERE id_user = '".$id_user."'");
			echo '<div id="contenido"><div align="center">Usuario borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=rpt_cuenta'); 
			require 'cerrar_conexion.php';
			exit;
	}
	elseif (isset($_POST['val']) && $_POST['val'] == 7 ){	
			$id_memb = $_POST['id'];

			$delete = mysqli_query($conexion, "DELETE FROM membrete WHERE id_membrete = '".$id_memb."'");
			echo '<div id="contenido"><div align="center">Encabezado borrado correctamente</div></div>';
			header('Refresh: 2; URL= index.php?pagina=rpt_membrete'); 
			require 'cerrar_conexion.php';
			exit;
	}
	}else{	$mensaje = "Borrar los datos:</br></br>|-  $row[0] -|- $row[1] -|- $row[2] -|- $row[3] -|- $row[4]  -|</br></br>";
	?>

<!DOCTYPE HTML>
<html lang="es">
<body >
<section id="seccion">
		<div id="contenido">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method= "POST">
			  <fieldset id="cuadro">
				<legend id="nombre_tabla"><?php echo "$mensaje";?></legend>
				<div id="sector_button">
				  <input type="hidden" name="id" value=<?php echo "'".$id."'" ;?> />
				  <input type="hidden" name="val" value=<?php echo "'".$val."'" ;?> />
				  <input id="button" type="submit" name="borrar" value="Borrar" />
				 <button id="button"><a href="index.php" style="text-decoration:none; color:black;"> Cancelar </a></button>
				</div>
			  </fieldset>
		</form>
		</div>
</section>
</body>
</html>

<?php 
}
mysqli_free_result($result);
include "cerrar_conexion.php";
?>