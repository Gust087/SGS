<script>
//registro evento load mediante addEvenListener para updateValores
addEventListener('load',updateValores,false);

function updateValores(){
    document.getElementsByName('name').addEventListener('change',comprobarUser,false);	
	document.getElementsByName('password').addEventListener('change',comprobarPass,false);
  }
function comprobarUser(){}
function comprobarPass(){}
</script>

<?php 
require 'conexion.php';

$_pagi_sql = "SELECT * FROM users";

include "paginator.php";

if(isset($_POST['ok_add'])){

$user = ucwords($_POST['name']);//Primera Letra de cada palabra en Mayusculas
$pass = $_POST['password'];

$sql_insert = "INSERT INTO users (name, password) VALUES  ('".$user."', '".$pass."')";
$result= mysqli_query($conexion, $sql_insert) or die(mysqli_error($conexion). " Query: " . $sql_insert);


	if($result == TRUE ){
	header('Refresh: 2; URL= index.php?pagina=rpt_cuenta'); 
		require 'cerrar_conexion.php';
		echo '<div id="contenido"><div align="center">La operación se realizó con éxito.</div></div>';
		exit;
	}
	else {
		header('Refresh: 2; URL= index.php?pagina=rpt_cuenta'); 
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
		<form name="formulario" method="POST" action="index.php?pagina=rpt_cuenta">
		<fieldset id="cuadro">
			<legend id="nombre_tabla">Cuentas</legend>
			</br>
			<div style="margin-left:25px;margin-top:15px;margin-right:25px; float:left">
			<button style="border:none; background-color:white;"  name="add_cuenta"><img src="Iconos/agregar.png" /></button>
			</div>
			<div id="column2">
			<table id="tabla">
				<tr>
					<td><label id="label-reg"><b>Usuario</b></label></td>
					<td><label id="label-reg"><b>Contraseña</b></label></td>
				</tr>
				
<?php 

	while($row=mysqli_fetch_array($_pagi_result)){
	  echo" <tr>";
		echo"		<td><input id='input-tbl' value='".$row['name']."' type='text' readonly /></td>";
		echo"		<td><input id='input-tbl' value='".$row['password']."' type='password' readonly /></td>";
		echo"		<td><a href='index.php?pagina=updt_cuenta&user=".$row['id_user']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&user=".$row['id_user']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
	if(isset($_GET['add_cuenta'])OR isset($_POST['add_cuenta'])){
	  echo"	<tr>";
		echo"		<td><input id='input-tbl' style='background:#fffdeb;' name='name' type='text' require /></td>";
		echo"		<td><input id='input-tbl'  style='background:#fffdeb;' name='password' type='password' require /></td>";
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