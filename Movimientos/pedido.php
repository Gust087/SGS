<?php require 'select.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
	<body >
		<section id="seccion">
		<div id="contenido">
		<form method="POST" action="index.php?pagina=seleccion_ped" name="formulario" >
		<fieldset id="cuadro">
		<legend id="nombre_tabla">Nuevo Pedido</legend>
		
		<label id="label"><b>Nro Pedido:</b>
		<input id="input-reg" name="nro_ped" type="number" placeholder="Ej: 0004" required autofocus></label>
	
		<label id="label"><b>Forma de Pago:</b>
		<input id="input-reg" name="forma_pago" type="text" placeholder="Forma de pago" required autofocus></label>
	
<?php	echo '<label id="label"><b>Proveedor:</b> <select id="input-reg" name="prov">'.$options_nom_prov.'</select></label>';
?>
		<label id="label"><b>Fecha De Pedido:</b>	
		<input id="input-reg" type="date" name="fecha" min="1" max="10" required /></label>
		
		<label id="label"><b>Fecha De Entrega Aprox.:</b>	
		<input id="input-reg" type="date" name="fecha_entrega" min="1" max="10" required /></label>
	</fieldset>
	<div align='right'>
        <button id="button" type="submit"> Realizar Pedido </button>
    </div>
</form>
</div>
</section>
</body>
</html>