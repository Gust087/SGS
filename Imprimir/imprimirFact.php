<?php
require '../conexion.php';

ob_start();
?>
 <page backtop="30mm" backbottom="20mm" backleft="10mm" backright="10mm"> 
      <page_header> 
      </page_header> 
      <page_footer> 

<?php 
$numero_f = $_GET['NF'];
$pto_vta = $_GET['PV'];

$Fact_qry = "Select * FROM fact_vta WHERE num_fact = ".$numero_f." AND id_punto_vta = ".$pto_vta."";
$Factura = mysqli_query($conexion, $Fact_qry) or die(mysqli_error($conexion). " Query: " . $Fact_qry);

$numero_f = str_pad($_GET['NF'], 8, "0", STR_PAD_LEFT);  // produce "00000000"
$pto_vta = str_pad($_GET['PV'], 4, "0", STR_PAD_LEFT);  // produce "0000"

$row_fact_vta = mysqli_fetch_array($Factura);

$tipo_f = $row_fact_vta['tipo_fact'];
$membrete = $row_fact_vta['id_membrete'];
$id_cliente = $row_fact_vta['id_client'];
$forma_pago = $row_fact_vta['forma_pago'];
$fecha = $row_fact_vta['fecha'];
$total = $row_fact_vta['total'];

$Client_qry = "Select * FROM cliente WHERE id_client = ".$id_cliente."";
$Cliente = mysqli_query($conexion, $Client_qry) or die(mysqli_error($conexion). " Query: " . $Client_qry);

$row_client = mysqli_fetch_array($Cliente);
$nombre = $row_client['nombre'];
$apellido = $row_client['apellido'];
$ciudad = $row_client['ciudad'];
$direccion = $row_client['direccion'];
$documento = $row_client['documento'];
$telefono = $row_client['telefono'];
$celular = $row_client['celular'];
$email = $row_client['email'];

$Membrete_qry = "Select * FROM membrete WHERE id_membrete = ".$membrete."";
$Membrete = mysqli_query($conexion, $Membrete_qry) or die(mysqli_error($conexion). " Query: " . $Membrete_qry);

$row_encabezado = mysqli_fetch_array($Membrete);
$nombre_emp = $row_encabezado['nombre'];
$tel_emp = $row_encabezado['telefono'];
$dir_emp = $row_encabezado['direccion'];
$cel_emp = $row_encabezado['celular'];
$slogan = $row_encabezado['slogan'];
$email_emp = $row_encabezado['email'];

?>
  <barcode type="C39" value="texto a convertir" style="width:30mm; height:10mm">
  asñldlñkad
</barcode>

      </page_footer> 
<nobreak>
<?php
echo'
<!DOCTYPE HTML>
<html lang="es">
<head>
<style>

#page-wrap { 
width: 500px; 
margin-left: 50px;
margin-right: 30px;
font: 14px/1.4 Georgia, serif; }

textarea { 
border: 0; 
font: 14px Georgia, Serif;  }

table { border-collapse: collapse; }

table td, table th { 
border: 1px solid black; 
padding: 5px; }

#header { 
height: 15px; 
width: 100%; 
margin: 20px 0; 
background: #222; 
text-align: center; 
color: white; 
font: bold 15px Helvetica, Sans-Serif; 
text-decoration: uppercase; 
letter-spacing: 20px; 
padding: 8px 0px; }

#address { 
width: 200px; 
height: auto; 
float: left; }

#logo { 
text-align: left; 
float: left; 
position: relative; 
border: 1px solid #fff; 
max-width: 300px; 
max-height: 110px;}


#customer-title { 
font-size: 20px; 
font-weight: bold; 
float: right; }


#meta { 
margin-top: 1px; 
width: 200px; 
float: right; }

#meta td { text-align: right;  }

#meta td.meta-head { 
text-align: left; 
background: #eee; }

#meta td textarea { 
width: 100%; 
height: 20px; 
text-align: right; }

#fila_datos td {
height: 10px; 
text-align: left;
border: none;
margin-top: 10px ; }


#fila_datos textarea {
width: 100%; 
text-align: left;
text-decoration: blink ;
margin-top: 11px ; }


#terms h3 { 
text-transform: uppercase; 
font: 13px Helvetica, Sans-Serif; 
letter-spacing: 10px; 
border-bottom: 1px solid black; 
padding: 0 0 8px 0; 
margin: 0 0 8px 0; }

#terms textarea { 
width: 100%; 
text-align: center;}

</style>

<body>
	<div id="page-wrap" >
		<h3 id="header" align="center">FACTURA '.$tipo_f.'</h3>
		
		<div id="encabezado">	
				
			<div id="logo">
				<img id="image" src="../Imagenes/hyperlink_logo2.png" alt="logo" />
			</div>

			<div id="customer" align="right" style=" widht:250px; margin-left:300px; margin-top:-40px; border: none;  display: block; text-align: justify; text-justify: center; float:left;">
            <table id="meta">
                <tr>
                    <td class="meta-head">Factura #</td>
                    <td><input size="4" type="text" value="'.$pto_vta.'-'.$numero_f.'" /></td>
                </tr>
                <tr>

                    <td class="meta-head">Fecha</td>
                    <td><input type="text" value="'.$fecha.'" /></td>
                </tr>
                <tr>
                    <td class="meta-head">Monto a pagar</td>
                    <td><input type="text" value="$'.$total.'" /></td>
                </tr>
            </table>		
		</div>
		
		<div id="identity" align="left" style=" margin-top:-50px; border: none; text-align: left; text-justify: left; float:left;">
		 <textarea id="address">
		 '.$nombre_emp.' 
		 '.$slogan.' 
		 '.$dir_emp.'
		 '.$tel_emp.' / '.$cel_emp.'
		 '.$email_emp.'
		 </textarea>
		</div>
	</div>
		
	<legend style="margin-top:10px;" ><b> Datos del Cliente</b></legend>
		<fieldset style=" margin-top:5px; margin-bottom:20px; text-align:center;">
            <table>
                <tr id="fila_datos">
                    <td><b> Nombre:</b></td>
					<td> <input type="text" value="'.$nombre.' '.$apellido.'" /></td> 	

                    <td><b> Dirección:</b></td>
                    <td><input type="text" value="'.$ciudad.', '.$direccion.'" /></td>
				</tr>
				<tr id="fila_datos">
				
                    <td><b> Teléfono:</b></td>
                    <td><input type="text" value="'.$telefono.' / '.$celular.'" /></td>
				
				<td><b>Correo:</b></td>
                    <td><input type="text" value="'.$email.'" /></td>
				</tr>
				<tr id="fila_datos">
				
                    <td><b>CUIT/DNI:</b></td>
                    <td><input type="text" value="'.$documento.'" /></td>
				</tr>
			</table>
		</fieldset>
		<legend><b>Forma de Pago: </b></legend>			
        <fieldset style="margin-top:5px; margin-bottom:20px; text-align:center;"><table>
                <tr id="fila_datos">
                    <td><b>Efectivo</b></td>
					<td><input name="f_p" type="radio" value="Efec" checked ></td>

                    <td><b>Débito</b></td>
					<td><input name="f_p" type="radio" value="Deb" ></td>
                   
				   <td><b>Crédito</b></td>
					<td><input name="f_p" type="radio" value="Cred" ></td>
				
				<td><b>Cuenta Corriente</b></td>
					<td><input name="f_p" type="radio" value="CC" ></td>
				</tr>
			</table>
		</fieldset>
				
			<table cellpadding="40px" cellspacing="5px" align="center" border="none">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td width="80"><b>Código</b></td>
								<td width="100"><b>Nombre</b></td>	
								<td width="100"><b>Marca</b></td>
								<td ><b>Cantidad</b></td>
								<td width="70"><b>Precio</b></td>
								<td><b>Subtotal</b></td>
							</tr>';
				
			$result = mysqli_query($conexion, "SELECT * FROM detalle_fact_vta WHERE id_fact = ".$numero_f." AND pto_vta = ".$pto_vta." ORDER BY id_detalle ASC");
				while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['codigo']."</td>";
					echo"		<td>".$row['nom_prod']."</td>";
					echo"		<td>".$row['mark_prod']."</td>";
					echo"		<td>".$row['cantidad']."</td>";
					echo"		<td>".$row['precio_unit']."</td>";
					echo"		<td>".$row['subtotal']."</td>";
				echo"	</tr>";}
			echo "  </tbody>";
			echo '</table>
		
		<div id="terms">
		  <h3 align="center" style="margin-top:20px; padding-left: 5px;padding-top:5px;">Pie</h3>
		  <fieldset style="margin-top:20px; padding-left: 5px;padding-bottom:25px;"><p style="margin-left:15px;">Orientación al consumidor. Provincia de Sta. Fe 0800-222-9042.
		  Imprenta propia. Dirección: Hipólito Yrigoyen 1024. Rafaela, Sta. Fe. CUIT:20-34523478-6.</p></fieldset>
		</div>
	
	</div>
	
</body>

</html>';
	?>
	</nobreak>
  </page> 
<?php

	$contenido = ob_get_clean();
	require_once('../html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($contenido);
	$pdf->pdf->IncludeJS('print(TRUE)');
	//$pdf->Output('Report_client.pdf', 'I');
	//$pdf->Output('Report_client.pdf', 'D');
	$pdf->Output('Report_fact.pdf', 'P');
mysqli_close($conexion);

?> 
