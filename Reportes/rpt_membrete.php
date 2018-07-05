<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM membrete";

include "paginator.php";

if(isset($_POST['ok_add'])){

$nom = ucwords($_POST['nombre']);//Primera Letra de cada palabra en Mayusculas
$tel = $_POST['telefono'];
$cel = $_POST['celular'];
$dir = $_POST['direccion'];
$slogan = $_POST['slogan'];
$email = $_POST['email'];

$sql_insert = "INSERT INTO membrete (nombre, telefono, celular, direccion, slogan, email) VALUES  ('".$nom."', '".$tel."', '".$cel."', '".$dir."', '".$slogan."', '".$email."')";
$result= mysqli_query($conexion, $sql_insert) or die(mysqli_error($conexion). " Query: " . $sql_insert);


	if($result == TRUE ){
	header('Refresh: 2; URL= index.php?pagina=rpt_membrete'); 
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación se realizó con éxito.</div></div>';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=rpt_membrete'); 
		echo '<div id="contenido"><div align="center">La operación no se a podido concretar </div></div>';
		exit;
	}
}
?>
<!DOCTYPE HTML>
<html lang="es">
<body >
	<section id="seccion">
	<div id="contenido">
		<form name="formulario" method="POST" action="index.php?pagina=rpt_membrete">
		<fieldset id="cuadro">
			<legend id="nombre_tabla">Encabezado</legend>
			</br>
			<div style="margin-left:25px;margin-top:15px;margin-right:25px; float:left">
			<button style="border:none; background-color:white;"  name="add_membrete"><img src="Iconos/agregar.png" /></button>
			</div>
			<div id="column2">
			<table id="tabla">
				<tr>					
					<td><label id="label-reg"><b>Nro.</b></label></td>
					<td><label id="label-reg"><b>Nombre</b></label></td>
					<td><label id="label-reg"><b>Teléfono</b></label></td>
					<td><label id="label-reg"><b>Celular</b></label></td>
					<td><label id="label-reg"><b>Dirección</b></label></td>
					<td><label id="label-reg"><b>Slogan</b></label></td>
					<td><label id="label-reg"><b>email</b></label></td>
				</tr>
				
<?php 

	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input id='input-tbl' value='".$row['id_membrete']."' type='number' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['nombre']."' type='text' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['telefono']."' type='number' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['celular']."' type='number' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['direccion']."' type='text' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['slogan']."' type='text' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['email']."' type='text' readonly /></td>";
		echo"		<td><a href='index.php?pagina=updt_membrete&id=".$row['id_membrete']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&id=".$row['id_membrete']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
	if(isset($_GET['add_membrete'])OR isset($_POST['add_membrete'])){
	  echo"	<tr>";
		echo"		<td ></td>";
		echo"		<td ><input id='input-tbl' style='background:#fffdeb;' name='nombre' type='text' required /></td>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='telefono' type='number' required /></td>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='celular' type='number' required /></td>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='direccion' type='text' required /></td>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='slogan' type='text' required /></td>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='email' type='text' required /></td>";
		echo"		<td><button style='border:none; background-color:#FFFACD; 'name='ok_add' ><img style='width;15px; height:15px;'src='Iconos/ok.png' /></button></td>";
	  echo"	</tr>";
	}
	  
?>
		</table>
		</div>
		</fieldset>
		<div align="right" style="margin-right:200px;">
		<?php print $_pagi_navegacion;?>
		</div>
		</form>			
</section>
</body>
 <?php 
mysqli_free_result($_pagi_result);
require 'cerrar_conexion.php';
?>
</html>