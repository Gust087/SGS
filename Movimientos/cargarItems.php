<?php require 'select.php'; ?>

<!DOCTYPE HTML>
<html lang="es">
<body>
 <section id="seccion">
<form method="POST" action="index.php?pagina=seleccion_ped" name="formulario" >
	<legend id="nombre_tabla">Nueva Compra</legend>
	<fieldset id="encabezado">
		
		<div id="column1">
		<table>
                <tr>
		<?php echo'
				<tr>
					<td><b>Proveedor:</b></td> 
					<td><select id="input-fact" name="prov">'.$options_nom_prov.'</select></td>
				</tr>';
				echo'<td><b>Forma de Pago:</b></td> 
				  <td><select id="input-fact" name="forma_pago">'.$options_nom_f_p.'</select></td>
				</tr>
				</table>';
		echo '</div>';		
		echo '<div id="column2">';	
?>
            <table>
                <tr>
                    <td><b>Factura #:</b></td>
					<td ><input min=0 max=9998 width="20px" id="input-fact" name="punto_vta" type="number" value="0004" required autofocus>
					-<input min=0 max=99999998 id="input-fact" name="nro_fact" type="number" value="00000008" required autofocus></td>
                </tr>
                <tr>

                    <td><b>Fecha:</b></td>
					<td><input id="input-fact" type="date" name="fecha" min="1" max="10" required /></td>
                </tr>
                <tr>
                    <td><b>Monto a pagar: </b></td>
                    <td><div id="total"><input id="balance" name="balance" type="number" size="8"  placeholder="Total" /></div></td>
                </tr>

            </table>
		</div>
	</fieldset>
	</br>
	<fieldset id="factura">
		<div  style="margin-left:25px; text-align:left; padding-top:5px; padding-bottom:10px;"><strong>Cargar Productos:</strong></div>	
		
		<button style="margin-left:12px;" onclick="verTabla();">
		  <img src="Iconos/add.png" />
		</button>
		
		<input style="margin-left:3px;" id="codigo" name="itemsCod" type="number" placeholder="Código" readonly />

		<input id="nombre" name="itemsNom" type="text" size="8" placeholder="Nombre" required readonly>
	
		<input id="marca" name="itemsMark" type="text" size="8"  placeholder="Marca" required readonly />
		
		<input id="p_c" name="itemsPC" type="number" step="any"  placeholder="Costo" required />
		
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