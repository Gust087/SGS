
<!DOCTYPE HTML>
<html lang="es">
<body >
<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_cliente" name="formulario" >
		<legend id="nombre_tabla">Datos del cliente</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		<label id="label-reg"><b>Nombre:</b></label>
		<input id="input-reg" name="nombre" type="text" placeholder="Escribe el nombre" required autofocus />
		
		<label id="label-reg"><b>Apellido:</b></label>
		<input id="input-reg" name="apellido" type="text" placeholder="Escribe el apellido" required />
		
		<label id="label-reg"><b>Dirección:</b></label>
		<input id="input-reg" name="direccion" type="text" placeholder="Escribe la dirección" required />
		
		<label id="label-reg"><b>Ciudad:</b></label>
		<input id="input-reg" name="ciudad" type="text" placeholder="Ej. Rafaela" required />
		</div>
		<div id="column2">
		<label id="label-reg"><b>Celular:</b></label>
		<input id="input-reg" name="celular" type="tel" placeholder="Ej.+543492459322" />
		
		<label id="label-reg"><b>Teléfono:</b></label>
		<input id="input-reg" name="telefono" type="tel" placeholder="Ej.+5493492659322" />
		
		<label id="label-reg"><b>Documento:</b></label>
		<input id="input-reg" name="documento" type="number" placeholder="Ej. 20611325" />
		
		<label id="label-reg"><b>Email:</b></label>
		<input id="input-reg" name="email" type="email" placeholder="ejemplo@dominio.com" />
		</div>
		</fieldset>
		<div id="sector_button">
			<button id="button" type="submit">Realizar venta</button>
			<button id="button" type="reset"> Reset </button>
		</div>
</form>
</div>
</section>
</body>
</html>