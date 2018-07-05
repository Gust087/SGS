<!DOCTYPE HTML>
<html lang="es">
	<body >
		<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_invt" name="formulario" >
		<legend id="nombre_tabla">Nuevo Inventario de Producto:</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		<label id="label-reg"><b>Código:</b></label>
		<input name="codigo"  id="input-reg" onclick="verTablaProd();" type="number" placeholder="Código único" required readonly />
		
		<label id="label-reg"><b>Nombre:</b></label>
		<input name="nombre" id="input-reg"  type="text" placeholder="Nombre del servicio" required readonly />

		<label id="label-reg"><b>Fecha:</b></label>
		<input id="input-reg" type="date" name="fecha" required />
		
		</div>
		<div id="column2">
		
		<label id="label-reg"><b>Stock en sistema:</b></label>
		<input id="input-reg" type="number"  name="stock" readonly />
		
		<label id="label-reg"><b>Stock real:</b></label>
		<input id="input-reg" type="number"  name="existencia" required />
		
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