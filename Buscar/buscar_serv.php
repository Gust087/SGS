<?php 
require 'conexion.php';
?>

<!DOCTYPE HTML>
<html lang="es">
<body>
<section id="seccion">
<div id="buscar">
<form action="index.php?pagina=RegBS" method="POST">
	<fieldset id="cuadro">
	<label id="label"><b>Búsqueda De Servicios Por Nombre</b></label></br>
    <input id="input" name="busqueda" type="text" placeholder="Ej: Reparacion" required autofocus>
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
  $consulta = "SELECT * FROM servicio WHERE nombre like '%".$busqueda."%' ORDER BY nombre ASC";
  $resultado = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
}
else{
     exit;
  }

 ?>	
	<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_serv" name="formulario" >
		<legend id="nombre_tabla">Servicios</legend>
		<fieldset id="cuadro">
			<table id="tabla">
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Precio</b></td>
					<td><b>Descripción</b></td>
					<td><b></b></td>					
				</tr>
				
<?php 
		while($row=mysqli_fetch_array($resultado)){
	  echo" <tr>";
		echo"		<td>".$row['nombre']."</td>";
		echo"		<td>".$row['precio']."</td>";
		echo"		<td>".$row['descripcion']."</td>";
		echo"		<td><a href='index.php?pagina=actualizarserv&codigo=".$row['codigo']."'><img id='icon' src='/SGS/Iconos/updt.png'></a></td>";				
		echo"		<td><a href='index.php?pagina=borrar&codigo=".$row['codigo']."'><img id='icon' src='/SGS/Iconos/delt.png'></a></td>";
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