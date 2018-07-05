<!DOCTYPE HTML>
<html lang="es">
	<body >
		<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_cat_serv" name="formulario" >
		<legend id="nombre_tabla">Nueva Categoría Servicio</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		
		<label id="label-reg"><b>Nombre:</b></label>
		<input id="input-reg" name="nombre" type="text" placeholder="Nombre de categoría" required autofocus />
		
		</div>
		<div id="column2">
		
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