<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8" />
		<link rel='stylesheet' type='text/css' href='http://localhost/SGS/Estilos/stylefact.css' />
		<link rel='stylesheet' type='text/css' href='http://localhost/SGS/Estilos/print.css' media="print" />
</head>
<body>

	<div id="page-wrap">

		<textarea id="header">FACTURA</textarea>
			
		<div id="identity">
		
            <textarea id="address">Chris Coyier
123 Appleseed Street
Appleville, WI 53719

Phone: (555) 555-5555</textarea>
		
		</div>
		
		
		<div id="customer">
            <table id="meta">
                <tr>
                    <td class="meta-head">Factura #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Fecha</td>
                    <td><textarea id="date">Julio 1, 2014</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Monto a pagar</td>
                    <td><div class="due">$0.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="imagenes/logo.png" alt="logo" />
        </div>
		
        <div style="clear:both">
		</div>
		<div>
		<fieldset>
		<legend ><b>Cliente</b></legend>
            <table>
                <tr id="fila_datos">
                    <td><b> Nombre:</b></td>
					<td> <textarea>000123</textarea></td>

                    <td><b> Direccion:</b></td>
                    <td> <textarea>000123</textarea></td>

                    <td><b> Telefono:</b></td>
                    <td> <textarea>000123</textarea></td>
				</tr>
				<tr id="fila_datos">
					<td><b>Correo:</b></td>
                    <td><textarea>000123</textarea></td>

                    <td><b>CUIT/DNI:</b></td>
                    <td><textarea>000123</textarea></td>
				</tr>
			</table>
		</fieldset>			
        <fieldset>
		<legend><b>Forma de Pago</b></legend>
			<table>
                <tr id="fila_datos">
                    <td><b>Efectivo</b></td>
					<td><input name="f_p" type="radio" value="f_p" /></td>

                    <td><b>Debito</b></td>
					<td><input name="f_p" type="radio" value="f_p" /></td>
                   
				   <td><b>Crédito</b></td>
					<td><input name="f_p" type="radio" value="f_p" /></td>
				
				<td><b>Cuenta Corriente</b></td>
					<td><input name="f_p" type="radio" value="f_p" /></td>
				</tr>
			</table>
		</fieldset>
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Codigo</th>
		      <th>Articulo</th>
		      <th>Prec Unit</th>
		      <th>Cantidad</th>
		      <th>Importe</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>08132</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>Nombre de Articulo</textarea></td>
		      <td><textarea class="cost">$0.00</textarea></td>
		      <td><textarea class="qty">0</textarea></td>
		      <td><span class="price">$0.00</span></td>
		  </tr>
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Agregar Art.</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$0.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total a pagar</td>
		      <td class="total-value balance"><div class="due">$0.00</div></td>
		  </tr>
	
		</table>
		
		<div id="terms">
		  <h5>Pie</h5>
		  <textarea></textarea>
		</div>
	
	</div>
	<div align='right'>
        <button id="button" type="submit"> Realizar Compra </button>
    </div>
	
</body>

</html>