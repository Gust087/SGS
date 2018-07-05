
<!DOCTYPE HTML>
<html lang="es">
<body>
	<section id="seccion">
	<div id="contenido">
	<form method="POST" action="index.php?pagina=entradas" name="formulario">
	<legend id="nombre_tabla">Buscar entradas entre fechas: </legend>
	<fieldset  id="cuadro" >
			</br>
			<div id="buscar">
			<label id="label"><b>Fecha Mínima:</b>
			<input id="input" type="date" name="f_inicial" placeholder="(yyyy-mm-dd)" required /></label>
			</br>			
			</br>			
			<label id="label"><b>Fecha Máxima:</b>
			<input id="input" type="date" name="f_final" placeholder="(yyyy-mm-dd)" required /></label>
			</div>

		</fieldset>
		<div id="sector_button">
			<button id="button" type="submit">Buscar</button>
			<button id="button" type="reset">Reset</button>
		</div>
	</form>
	</div>
	</section>
</body>
</html>
			