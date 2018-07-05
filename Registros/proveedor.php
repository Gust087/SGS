
<!DOCTYPE HTML>
<html lang="es">
<body >
<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=nvo_prov" name="formulario" >
		<legend id="nombre_tabla">Datos del proveedor</legend>
		<fieldset id="cuadro">
		</br>
		<div id="column1">
		<label id="label-reg"><b>Nombre:</b></label>
		<input id="input-reg" name="nombre" type="text" placeholder="Nombre proveedor" required autofocus />
	
		<label id="label-reg"><b>Dirección:</b></label>
		<input id="input-reg" name="direccion" type="text" placeholder="Dirección proveedor" />
		
		<label id="label-reg"><b>Ciudad:</b></label>
		<input id="input-reg" name="ciudad" type="text" placeholder="Ej. Rafaela" />
		
		<label id="label-reg"><b>Celular:</b></label>
		<input id="input-reg" name="celular" type="tel" placeholder="Ej.+543492459322" />
		</div>
		<div id="column2">
		<label id="label-reg"><b>Teléfono:</b></label>
		<input id="input-reg" name="telefono" type="tel" placeholder="Ej.+5493492659322" />
		
		<label id="label-reg"><b>Decripción:</b></label>
		<input id="input-reg" name="descripcion" type="text"  placeholder="Descripción" />
		
		<label id="label-reg"><b>Email:</b></label>
		<input id="input-reg" name="email" type="email" placeholder="ejemplo@dominio.com" />
		</div>
		</fieldset>
		<div align='right'>
			<button id="button" type="submit">Realizar compra</button>
			<button id="button" type="submit">Reset</button>
		</div>
</form>
</div>
</section>
</body>
</html>