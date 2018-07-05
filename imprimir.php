<?php
require 'conexion.php';

ob_start();
?>
 <page backtop="30mm" backbottom="20mm" backleft="10mm" backright="10mm"> 
      <page_header> 
           Page header
      </page_header> 
      <page_footer> 
           Page footer
      </page_footer> 
      Page Content

<nobreak>
<?php 
	if (isset($_GET['prod'])){

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
if (isset($_POST['prov'])){

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
								<td><b>Estado</b></td>
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
					echo"		<td>".$row['estado']."</td>";
				  echo"	</tr>";}
			echo "  </tbody>";
			echo "</table>";
			}

if (isset($_POST['clie'])){

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
if (isset($_POST['serv'])){

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
	require_once('html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($contenido);
	$pdf->pdf->IncludeJS('print(TRUE)');
	//$pdf->Output('Report_client.pdf', 'I');
	//$pdf->Output('Report_client.pdf', 'D');
	$pdf->Output('Report_client.pdf', 'P');
?> 