<?php 
require 'conexion.php';
?>

<!DOCTYPE HTML>
<html lang="es">
<body>
<section id="seccion">
<div id="buscar">
<form action="index.php?pagina=RegBC" method="POST">
	<fieldset id="cuadro">
	<label id="label"><b>Búsqueda De Clientes Por Dirección</b></label></br>
    <input id="input" name="busqueda" type="text" placeholder="Ej: Peru" required autofocus>
    <button id="button" type="submit"> Buscar </button>
</fieldset>
</div>
</form>  
  
 <?php
 //iniciamos buscador 

if (isset ($_POST["busqueda"]))
{
$busqueda = $_POST["busqueda"];
trim($busqueda); //Evitar espacios en blanco en la busqueda
$busqueda = addslashes($busqueda); //Marca una cadena con barras
 
  //comenzamos la consulta 
  $consulta = "SELECT * FROM cliente WHERE direccion like '%".$busqueda."%' ORDER BY direccion ASC";
  $resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
 
}else{
     exit;
  }
  ?>
	<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_cliente" name="formulario" >
		<legend id="nombre_tabla">Clientes</legend>
		<fieldset id="cuadro">
			<table id="tabla">
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Apellido</b></td>
					<td><b>Dirección</b></td>
					<td><b>Ciudad</b></td>
					<td><b>Celular</b></td>
					<td><b>Teléfono</b></td>
					<td><b>DNI</b></td>
					<td><b>email</b></td>
					<td><b></b></td>
				</tr>
				
<?php 
	while($row=mysqli_fetch_array($resultado)){
	  echo" <tr>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['apellido']."</td>";
		echo"		<td>".$row['direccion']."</td>";
		echo"		<td>".$row['ciudad']."</td>";
		echo"		<td>".$row['celular']."</td>";
		echo"		<td>".$row['telefono']."</td>";
		echo"		<td>".$row['documento']."</td>";
		echo"		<td>".$row['email']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarclient&id_client=".$row['id_client']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&id_client=".$row['id_client']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
	  echo"	</tr>";}
echo "</table>";
echo "</fieldset>";
mysqli_free_result($resultado);
require 'cerrar_conexion.php';
?>		
		</div>
		</form>
	</section>
</body>

</html>