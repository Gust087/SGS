<?php require 'select.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
<body>
 <section id="seccion">
<form method="POST" action="index.php?pagina=seleccion_vta" name="formulario" >
	<legend id="nombre_tabla">Nueva Venta</legend>
	
	<fieldset id="encabezado" style="margin-left:55px; text-align:left; padding-top:25px; padding-bottom:10px;">
		<div style="margin-left:10px; padding-left:20px; border: 1px solid; width:580px;" >
		<table>
                <tr>
					<td><b>Tipo Fact.:</b></td>
					<td><input id="input-fact" name="fact" type="text" size="4" placeholder="Ej: A" required autofocus /></td>
	                <td align="right"><b  style="margin-left:35px;">Factura #:</b></td>
					<td align="right"><input min=0 max=9998 id="input-fact" name="punto_vta" type="number" value="0004" required autofocus>
					<input min=0 max=99999998 id="input-fact" name="nro_fact" type="number" value="00000008" required autofocus></td>
				</tr>
				<tr>
					<td><b>Pago:</b></td>
					<td><select id="input-fact" name="forma_pago"><?=$options_nom_f_p?></select></td>
					<td align="right"><b>Fecha:</b></td>
					<td align="right"><input id="input-fact" type="date" name="fecha" min="1" max="10" required /></td>
				</tr>
		</table>
		</div>
		<div id="column1">
		<table>
                <tr>
                    <td style="margin-left:15px"><b>Cliente:</b></td>
					<td><input id="input-fact" name="cliente" onclick="verTablaCliente();" placeholder="Ej: Alberto Gilberto" required /></td>
				</tr>
				<tr>
					<td style="margin-left:15px"><b>DNI:</b></td>
					<td><input id="input-fact" name="DNI" type="number" placeholder="Ej: 3658963" required /></td>
				</tr>
	<?php echo'<tr>
					<td style="margin-left:15px"><b>Select Membrete:</b></td>
					<td><select id="input-fact" name="membrt">'.$options_membrt.'</select></td>
				</tr>'; ?>
		</table>
		</div>
		<div id="column2">
		<table>
                <tr>
                    <td style="margin-left:15px"><b>Dirección:</b></td>
					<td><input id="input-fact" name="dir" type="text" placeholder="Ej: Peru 433" required /></td>
				</tr>
				<tr>
					<td style="margin-left:15px"><b>Teléfono:</b></td>
					<td><input id="input-fact" name="tel" type="number" placeholder="Ej: 03492452365" required /></td>
				</tr>
				<tr>
					<td><b>Monto a pagar: </b></td>
                    <td><div id="total"><input id="balance" name="balance" type="number" size="8"  placeholder="Total" /></div></td>
                </tr>

		</table>
		<input id="input-fact" name="id" type="hidden" /></label>
		</div>
	</fieldset>
	<fieldset id="factura" style="margin-left:45px; text-align:left; padding-top:5px; padding-bottom:10px;">
		<div  style="margin-left:25px; text-align:left; padding-top:5px; padding-bottom:10px;"><strong>Cargar Productos:</strong></div>	
		<button  style="margin-left:15px;" onclick="verTablaVta();">
		  <img src="Iconos/add.png" />
		</button>
			
		<input style="margin-left:3px;"  id="codigo" name="itemsCod" type="number" placeholder="Código" readonly />

		<input id="nombre" name="itemsNom" type="text" size="8" placeholder="Nombre" required readonly>
	
		<input id="marca" name="itemsMark" type="text" size="8"  placeholder="Marca" required readonly />
		
		<input id="p_c" name="itemsPC" type="number" step="any"  placeholder="Precio" required />
		
		<input id="cant" name="itemsCant" type="number" placeholder="Cantidad" required />
	
		<input id="subtotal" name="itemsSubt" type="number" size="8"  placeholder="Subtotal" />
		
		<div id="cargarItems"></div>

		<div id="sector_button">
		</br>
		<button id="button" type="submit">Confirmar</button>
		<button id="button" type="reset">Reset</button>
		</div>
	</fieldset>
</form>
</section> 
</body>
</html>