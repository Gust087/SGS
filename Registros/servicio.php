<?php require 'select.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
	<body >
		<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_serv" name="formulario" >
		<legend id="nombre_tabla">Nuevo Servicio</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		<label id="label-reg"><b>Código:</b></label>
		<input id="input-reg" name="codigo" type="number" placeholder="Código único" required autofocus />
		
		<label id="label-reg"><b>Nombre:</b></label>
		<input id="input-reg" name="nombre" type="text" placeholder="Nombre del servicio" required autofocus />
		
<?php	echo '<label id="label-reg"><b>Categoría:</b></label> <select id="input-reg" id="input-reg" name="cat">'.$options_nom_cat_serv.'</select>';
?>
		</div>
		<div id="column2">
		<label id="label-reg"><b>Precio Público:</b></label>
		<input id="input-reg" type="number" step ="any" name="publico" placeholder="Precio servicio" />
		
		<label id="label-reg"><b>Descripción:</b></label>
		<input id="input-reg" type="text"  name="descripcion" placeholder="Descripción" />
		</div>
	</fieldset>
	<div align='right'>
		<button id="button" type="submit">Grabar</button>
		<button id="button" type="reset"> Reset </button>
	</div>
</form>
</div>
</section>
</body>
</html>