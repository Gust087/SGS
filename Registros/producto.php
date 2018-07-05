<?php require 'select.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
<body >
<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_ingreso" name="formulario" >
		<legend id="nombre_tabla">Nuevo Artículo</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		<label id="label-reg"><b>Nombre:</b></label>
		<input id="input-reg" name="nombre" type="text" placeholder="Nombre del producto" required autofocus>
	
<?php	echo '<label id="label-reg"><b>Categoría:</b></label> <select id="input-reg" name="cat">'.$options_nom_cat_prod.'</select>';
?>
		<label id="label-reg"><b>Código:</b></label>
		<input id="input-reg" type="number"  name="codigo" placeholder="Escribe el código"/>

		<label id="label-reg"><b>Marca:</b></label>
		<input id="input-reg" type="text"  name="marca" placeholder="Marca del producto" required />
		
		<label id="label-reg"><b>Modelo:</b></label>
		<input id="input-reg" type="text"  name="modelo" placeholder="Modelo" required />
		
		<label id="label-reg"><b>Precio Base:</b></label>
		<input id="input-reg" type="number" step="any"  name="base" placeholder="Costo del producto" required />
		</div>
		<div id="column2">
		<label id="label-reg"><b>Precio Público:</b></label>
		<input id="input-reg" type="number" step="any"  name="publico" placeholder="Precio venta" />
		
		<label id="label-reg"><b>Cantidad:</b></label>
		<input id="input-reg" type="number" name="cantidad" value="0" readonly />
	
		<label id="label-reg"><b>Descripción:</b></label>
		<input id="input-reg" type="text"  name="descripcion" placeholder="Descripción" />
		
		<label id="label-reg"><b>Stock Máx.:</b></label>
		<input id="input-reg" type="number"  name="max" placeholder="Máx" />
		
		<label id="label-reg"><b>Stock Mín.:</b></label>
		<input id="input-reg" type="number"  name="min" placeholder="Mín" />
		
		<label id="label-reg"><b>Fecha De Ingreso:</b></label>
		<input id="input-reg" type="date" name="fecha" min="1" max="10" required />
		</div>
		</fieldset>
		<div id="sector_button">
			<button id="button" type="submit">Grabar</button>
			<button id="button" type="submit">Reset</button>
		</div>
</form>
</div>
</section>
</body>
</html>