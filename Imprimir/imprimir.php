<?php
require '../conexion.php';

ob_start();
?>
 <page backtop="20mm" backbottom="20mm" backleft="10mm" backright="10mm"> 

      <page_header> 
<?php 

require '../conexion.php';

$fecha = date("d/m/Y");

$Membrete_qry = "Select * FROM membrete WHERE id_membrete = 0";
$Membrete = mysqli_query($conexion, $Membrete_qry) or die(mysqli_error($conexion). " Query: " . $Membrete_qry);

$row_encabezado = mysqli_fetch_array($Membrete);
$nombre_emp = $row_encabezado['nombre'];
$tel_emp = $row_encabezado['telefono'];
$dir_emp = $row_encabezado['direccion'];
$cel_emp = $row_encabezado['celular'];
$slogan = $row_encabezado['slogan'];
$email_emp = $row_encabezado['email'];

echo' <table align="center" border="none" width="600px">
			<tbody align="left">
				<tr>
					<td><h3><b>'.$nombre_emp.'</b></h3></td>
					<td><b>'.$slogan.'</b></td>
				</tr>	
			</tbody>
		</table>
		<table align="right" border="none" width="600px">
			<tbody align="right">
				<tr>
					<td><b>Fecha:</b></td>
					<td>'.$fecha.'</td>
				</tr>	
			</tbody>
		</table>';				
?>
      </page_header> 
      <page_footer> 

	  <?php echo'		<table align="center" border="none" width="600px">
			<tbody align="left">
				<tr>
					<td style="padding:15px;"><b>Tel.:</b></td>
					<td>'.$tel_emp.'</td>
					<td style="padding:15px;"><b>Cel:</b></td>
					<td>'.$cel_emp.'</td>
					<td style="padding:15px;"><b>Direccion:</b></td>
					<td>'.$dir_emp.'</td>
					<td style="padding:15px;"><b>Mail:</b></td>
					<td>'.$email_emp.'</td>
				</tr>
				<tr>					
				</tr>
			</tbody>
		</table>';
?>
<bookmark align="right">
1
</bookmark>
	</page_footer> 
<nobreak>
<?php

if (isset($_GET['dia'])){

$fecha = date("Ymd");

			echo'
				  <h3>Reporte Diario: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Fecha Operaci&oacute;n</b></td>
								<td><b>Nro. Factura</b></td>
								<td><b>Membrete</b></td>	
								<td><b>Destinatario</b></td>	
								<td><b>Operaci&oacute;n</b></td>	
								<td><b>Stock</b></td>		
								<td><b>Debe</b></td>		
								<td><b>Haber</b></td>		
							</tr>';
				
			$result = mysqli_query($conexion, "SELECT fecha, id_punto_venta, num_fact, nombre AS membrete, 'Hiperlink' AS destinatario, 'Compra' AS operacion, nom_prod, '+' AS signo, cantidad, subtotal AS INGRESO, 0 AS EGRESO FROM ENTRADAS WHERE fecha = ".$fecha."
			UNION ALL
			SELECT fecha, id_punto_venta, num_fact, 
			'Hiperlink' AS membrete, nombre AS destinatario, 
			'Venta' AS operacion, nom_prod,
			'-' AS signo, cantidad, 
			0 AS INGRESO, subtotal AS EGRESO
			FROM SALIDAS
			WHERE fecha = ".$fecha."
			ORDER BY fecha");
			
			while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['fecha']."</td>";
					$pto_vta = str_pad($row['id_punto_venta'], 8, "0", STR_PAD_LEFT);  // produce "00000000"
					$numero_f = str_pad($row['num_fact'], 4, "0", STR_PAD_LEFT);  // produce "0000"
					echo"		<td>".$numero_f."-".$pto_vta."</td>";
					echo"		<td>".$row['membrete']."</td>";
					echo"		<td>".$row['destinatario']."</td>";
					echo"		<td>".$row['operacion']."";
					echo"			: ".$row['nom_prod']."</td>";
					echo"		<td>".$row['signo']."";					
					echo"			".$row['cantidad']."</td>";					
					echo"		<td>".$row['INGRESO']."</td>";					
					echo"		<td>".$row['EGRESO']."</td>";					
				  echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
			}
if (isset ($_GET['x_fecha'])){

			echo'
				  <h3>Reporte: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Fecha Operaci&oacute;n</b></td>
								<td><b>Nro. Factura</b></td>
								<td><b>Membrete</b></td>	
								<td><b>Destinatario</b></td>	
								<td><b>Operaci&oacute;n</b></td>	
								<td><b>Stock</b></td>		
								<td><b>Debe</b></td>		
								<td><b>Haber</b></td>		
							</tr>';
				
			$F1=$_GET['F1'];						
			$F2=$_GET['F2'];	
			$result = mysqli_query($conexion, "SELECT fecha, id_punto_venta, num_fact, nombre AS membrete, 'Hiperlink' AS destinatario, 'Compra' AS operacion, nom_prod, '+' AS signo, cantidad, subtotal AS INGRESO, 0 AS EGRESO FROM ENTRADAS WHERE fecha BETWEEN ".$F1." AND ".$F2."
			UNION ALL
			SELECT fecha, id_punto_venta, num_fact, 
			'Hiperlink' AS membrete, nombre AS destinatario, 
			'Venta' AS operacion, nom_prod,
			'-' AS signo, cantidad, 
			0 AS INGRESO, subtotal AS EGRESO
			FROM SALIDAS
			WHERE fecha BETWEEN ".$F1." AND ".$F2."
			ORDER BY fecha");
			
			while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['fecha']."</td>";
					$pto_vta = str_pad($row['id_punto_venta'], 8, "0", STR_PAD_LEFT);  // produce "00000000"
					$numero_f = str_pad($row['num_fact'], 4, "0", STR_PAD_LEFT);  // produce "0000"
					echo"		<td>".$numero_f."-".$pto_vta."</td>";
					echo"		<td>".$row['membrete']."</td>";
					echo"		<td>".$row['destinatario']."</td>";
					echo"		<td>".$row['operacion']."";
					echo"			: ".$row['nom_prod']."</td>";
					echo"		<td>".$row['signo']."";					
					echo"			".$row['cantidad']."</td>";					
					echo"		<td>".$row['INGRESO']."</td>";					
					echo"		<td>".$row['EGRESO']."</td>";					
				  echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
		}
if (isset ($_GET['invt'])){

			echo'
				  <h3>Inventarios: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Nro.</b></td>
								<td><b>Codigo Producto</b></td>
								<td><b>Nombre Producto</b></td>	
								<td><b>Fecha</b></td>
								<td><b>Stock Sistema</b></td>
								<td><b>Stock Real</b></td>
								<td><b>Descripción Inventario</b></td>							
							</tr>';								
						
					$F1=$_GET['F1'];						
					$F2=$_GET['F2'];	
					$result = mysqli_query($conexion, "SELECT * FROM inventario WHERE fecha BETWEEN ".$F1." AND ".$F2."");
					while($row=mysqli_fetch_array($result)){
						echo" <tr style=' background: #FFFACD;'>";
							echo"		<td>".$row['num_inv']."</td>";
							echo"		<td>".$row['codigo']."</td>";
							echo"		<td>".$row['nombre']."</td>";
							echo"		<td>".$row['fecha']."</td>";
							echo"		<td>".$row['cant_prod']."</td>";
							echo"		<td>".$row['valor_real']."</td>";					
							echo"		<td>".$row['descripcion']."</td>";				
						echo"	</tr>";}
				echo "  </tbody>";
			echo "</table>";
			}
if (isset ($_GET['entr'])){

			echo'
				  <h3>Entradas: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
							<td><b>Fecha Operacion</b></td>
							<td><b>Nro. Factura</b></td>
							<td><b>Nombre Proveedor</b></td>	
							<td><b>Nombre Producto</b></td>
							<td><b>Marca Producto</b></td>
							<td><b>Compra</b></td>		
							<td><b>Facturacion</b></td>		
						</tr>';								
					$F1=$_GET['F1'];						
					$F2=$_GET['F2'];	
					$result = mysqli_query($conexion, "SELECT * FROM entradas WHERE fecha BETWEEN ".$F1." AND ".$F2."");
					while($row=mysqli_fetch_array($result)){
						echo" <tr style=' background: #FFFACD;'>";
							echo"		<td>".$row['fecha']."</td>";
							$pto_vta = str_pad($row['id_punto_venta'], 4, "0", STR_PAD_LEFT);
							$num_fact = str_pad($row['num_fact'], 8, "0", STR_PAD_LEFT);
							echo"		<td>".$pto_vta."";
							echo" 		".$num_fact."</td>";
							echo"		<td>".$row['nombre']."</td>";
							echo"		<td>".$row['nom_prod']."</td>";
							echo"		<td>".$row['mark_prod']."</td>";
							echo"		<td>".$row['cantidad']."</td>";					
							echo"		<td>".$row['subtotal']."</td>";					
						echo"	</tr>";}
				echo "  </tbody>";
			echo "</table>";
			}
if (isset ($_GET['sali'])){

			echo'				 
				<h3>Salidas: </h3>
					<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Fecha Operacion</b></td>
								<td><b>Nro. Factura</b></td>
								<td><b>Nombre Cliente</b></td>	
								<td><b>Nombre Producto</b></td>
								<td><b>Marca Producto</b></td>
								<td><b>Venta</b></td>
								<td><b>Facturacion</b></td>							
							</tr>';

					$F1=$_GET['F1'];						
					$F2=$_GET['F2'];	
				$result = mysqli_query($conexion, "SELECT * FROM salidas WHERE fecha BETWEEN ".$F1." AND ".$F2."");
					while($row=mysqli_fetch_array($result)){
					  echo" <tr style=' background: #FFFACD;'>";
						echo"		<td>".$row['fecha']."</td>";
						$pto_vta = str_pad($row['id_punto_venta'], 8, "0", STR_PAD_LEFT);  // produce "00000000"
						$numero_f = str_pad($row['num_fact'], 4, "0", STR_PAD_LEFT);  // produce "0000"
						echo"		<td>".$numero_f."-".$pto_vta."</td>";
						echo"		<td>".$row['nombre']."</td>";
						echo"		<td>".$row['nom_prod']."</td>";
						echo"		<td>".$row['mark_prod']."</td>";
						echo"		<td>".$row['cantidad']."</td>";					
						echo"		<td>".$row['subtotal']."</td>";					
					echo"	</tr>";}
				echo "  </tbody>";
			echo "</table>";
			}
if (isset ($_GET['prod'])){

			echo'
				  <h3>Productos: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Codigo</b></td>
								<td><b>Nombre</b></td>	
								<td><b>Marca</b></td>
								<td><b>Modelo</b></td>
								<td><b>Precio Cpra</b></td>
								<td><b>Precio Vta</b></td>
								<td><b>Stock</b></td>
								<td><b>Descripcion</b></td>
								<td><b>Max</b></td>
								<td><b>Min</b></td>				
							</tr>';
				
			$result = mysqli_query($conexion, "SELECT * FROM producto");
				while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['codigo']."</td>";
					echo"		<td>".$row['nombre']."</td>";
					echo"		<td>".$row['marca']."</td>";
					echo"		<td>".$row['modelo']."</td>";
					echo"		<td>".$row['precio_cpra']."</td>";
					echo"		<td>".$row['precio_vta']."</td>";
					echo"		<td>".$row['existencia']."</td>";
					echo"		<td>".$row['descripcion']."</td>";
					echo"		<td>".$row['max']."</td>";
					echo"		<td>".$row['min']."</td>";
				echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
			}
if (isset($_GET['prov'])){

			echo'
				  <h3>Proveedores: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Nombre</b></td>
								<td><b>Direccion</b></td>
								<td><b>Ciudad</b></td>
								<td><b>Celular</b></td>
								<td><b>Telefono</b></td>
								<td><b>Descripcion</b></td>
								<td><b>email</b></td>
							</tr>';
				
			$result = mysqli_query($conexion, "SELECT * FROM proveedor");
				while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['nombre']."</td>";
					echo"		<td>".$row['direccion']."</td>";
					echo"		<td>".$row['ciudad']."</td>";
					echo"		<td>".$row['celular']."</td>";
					echo"		<td>".$row['telefono']."</td>";
					echo"		<td>".$row['descripcion']."</td>";
					echo"		<td>".$row['email']."</td>";
				  echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
			}

if (isset($_GET['clie'])){

			echo'
				  <h3>Clientes: </h3>
						<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
						<tbody align="center">
							<tr  style=" background: #FFFACD;">
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>
								<td><b>Direccion</b></td>
								<td><b>Ciudad</b></td>
								<td><b>Celular</b></td>
								<td><b>Telefono</b></td>
								<td><b>DNI</b></td>
								<td><b>email</b></td>
				</tr>';
				
			$result = mysqli_query($conexion, "SELECT * FROM cliente");
				while($row=mysqli_fetch_array($result)){
				  echo" <tr style=' background: #FFFACD;'>";
					echo"		<td>".$row['nombre']."</td>";
					echo"		<td>".$row['apellido']."</td>";
					echo"		<td>".$row['direccion']."</td>";
					echo"		<td>".$row['ciudad']."</td>";
					echo"		<td>".$row['celular']."</td>";
					echo"		<td>".$row['telefono']."</td>";
					echo"		<td>".$row['documento']."</td>";
					echo"		<td>".$row['email']."</td>";
				  echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
			}
if (isset($_GET['serv'])){

				echo'
					  <h3>Servicios: </h3>
							<table cellpadding="40px" cellspacing="5px" align="center" border="none" width="400px">
							<tbody align="center">
								<tr  style=" background: #FFFACD;">
									<td><b>Codigo</b></td>
									<td><b>Nombre</b></td>
									<td><b>Precio</b></td>
									<td><b>Descripcion</b></td>				
								</tr>';
					
				$result = mysqli_query($conexion, "SELECT * FROM servicio");
					while($row=mysqli_fetch_array($result)){
					  echo" <tr style=' background: #FFFACD;'>";
						echo"		<td>".$row['codigo']."</td>";
						echo"		<td>".$row['nombre']."</td>";
						echo"		<td>".$row['precio']."</td>";
						echo"		<td>".$row['descripcion']."</td>";
					  echo"	</tr>";}
				echo "  </tbody>";
			echo "</table>";
	}
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
	$pdf->Output('Report.pdf', 'P');
?> 