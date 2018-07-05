<?php 
require_once 'Creditos/info.php'; 
require_once 'conexion.php';
include_once ("Secciones/session.php");  
include_once ("Secciones/encabezado.php");  
include_once ("Secciones/menu.php");  
include_once ("Secciones/pie.php"); 

if(!isset ($_GET['seccion'])){
$recibe_seccion="parte0";}
else{
$recibe_seccion=$_GET['seccion'];}

if(!isset ($_GET['pagina'])){
$recibe_pagina="boton0";}
else{
$recibe_pagina=$_GET['pagina'];}

?>

<!DOCTYPE html>
<html lang="es">
	<body ><!-- importante las extenciones de archivos -->
		<aside id="columna">
		<div id="menu_lat">
			<?php
					switch ($recibe_seccion){ 
					 case "reporte":
						echo"	<ul>";
						echo"		<li><a href='index.php?pagina=RDay'>Diario</a></li>";
						echo"		<li><a href='index.php?pagina=RFechas'>Por Fechas</a></li>";
						echo"		<li><a href='index.php?pagina=RInvt'>Inventario</a></li>";
						echo"		<li><a href='index.php?pagina=RProd'>Productos</a></li>";
						echo"		<li><a href='index.php?pagina=RServ'>Servicios</a></li>";
						echo"		<li><a href='index.php?pagina=RClient'>Clientes</a></li>";
						echo"		<li><a href='index.php?pagina=RProv'>Proveedores</a></li>";
						echo"	 </ul>";
						break;
					case "movimiento":
					   echo " <ul>
									<li><a href='index.php?pagina=MVend'>Vender</a></li>
									<li><a href='index.php?pagina=MComp'>Comprar</a></li>
									<li><a href='index.php?pagina=MSal'>Salidas</a></li>
									<li><a href='index.php?pagina=MEnt'>Entradas</a></li>
									<li><a href='index.php?pagina=Inventario'>Inventario</a></li>
							 </ul>
					   ";
					break;	
					case "registro":
					   echo "<ul>											   
								<li><a href='index.php?pagina=RegP'>Producto</a></li>
								<li><a href='index.php?pagina=RegS'>Servicio</a></li>
								<li><a href='index.php?pagina=RegC'>Cliente</a></li>
								<li><a href='index.php?pagina=RegProv'>Proveedor</a></li>
								<li><a href='index.php?pagina=ConsultB'>Buscar</a></li>
								<li><a href='index.php?pagina=ConsultC'>Categoría</a></li>
							</ul>
							";
					break;	
					default:
					;
				}
			?>
		</aside>
		<section id="seccion">
				<?php
					switch ($recibe_pagina){ 
//Cuenta:					
					case "cuenta":
					   include ("mi_cuenta.php"); 
					break;
					case "rpt_cuenta":
						include ("Reportes/rpt_cuenta.php");
					break;
					case "updt_cuenta":
						include ("Actualizar/updt_cuenta.php");
					break;
					case "rpt_membrete":
						include ("Reportes/rpt_membrete.php");
					break;
					case "updt_membrete":
						include ("Actualizar/updt_membrete.php");
					break;
//Registrar datos:					
					case "ConsultC":
					   include ("Categoria/consulta_categorias.php"); 
					break;
					case "ConsultB":
					   include ("Buscar/consulta_busqueda.php"); 
					break;
					case "RegBProv":
					   include ("Buscar/buscar_prvdor.php"); 
					break;
					case "RegProv":
					   include ("Registros/proveedor.php"); 
					break;
					case "RegBC":
					   include ("Buscar/buscar_clte.php"); 
					break;
					case "RegC":
					  include ("Registros/cliente.php"); 
					break; 
					case "RegBS":
					  include ("Buscar/buscar_serv.php"); 
					break;
					case "RegS":
					  include ("Registros/servicio.php"); 
					break; 
					case "RegBP":
					  include ("Buscar/buscar_prod.php"); 
					break;
					case "RegP":
					  include ("Registros/producto.php"); 
					break; 
//Movimientos de datos:
					case "Inventario":
					  include ("Movimientos/inventario.php"); 
					break;
					case "MEnt":
					  include ("Movimientos/consulta_entradas.php"); 
					break; 
					case "MComp":
					  include ("Movimientos/cargarItems.php"); 
					break;
					case "MSal":
					  include ("Movimientos/consulta_salidas.php"); 
					break; 
					case "MVend":
					  include ("Movimientos/venderProd.php"); 
					break;
//Reportar datos:
					case "RProv":
					  include ("Reportes/rpt_proveedores.php"); 
					break; 
					case "RClient":
					  include ("Reportes/rpt_clientes.php"); 
					break;
					case "RServ":
					  include ("Reportes/rpt_servicios.php"); 
					break; 
					case "RProd":
					  include ("Reportes/rpt_productos.php"); 
					break;
					case "RInvt":
					  include ("Reportes/consulta_invt.php"); 
					break; 
					case "RFechas":
					  include ("Reportes/consulta_x_fechas.php"); 
					break; 
					case "RDay":
					  include ("Reportes/diario.php"); 
					break;
//Respaldar los datos:			
					case "backup":
					  include ("backup.php"); 
					break;
//Pedido de paginas:				
// Pedido de Registros:
					case "nvo_ingreso":
					  include ("Registros/nvo_ingreso.php"); 
					break;
					case "nvo_serv":
					  include ("Registros/nvo_serv.php"); 
					break;
					case "nvo_prov":
					  include ("Registros/nvo_prov.php"); 
					break;
					case "nvo_cliente":
					  include ("Registros/nvo_cliente.php"); 
					break;
					case "CatP":
					  include ("Categoria/categorias_prod.php"); 
					break; 
					case "CatS":
					  include ("Categoria/categorias_serv.php"); 
					break; 
					case "cat_prod":
					  include ("Categoria/cat_prod.php"); 
					break; 
					case "cat_serv":
					  include ("Categoria/cat_serv.php"); 
					break; 
					case "nvo_cat_prod":
					  include ("Categoria/nva_cat_prod.php"); 
					break; 
					case "nvo_cat_serv":
					  include ("Categoria/nva_cat_serv.php"); 
					break; 
//	Pedido de Movimientos:
					case "seleccion_ped":
					  include ("Movimientos/seleccion_ped.php"); 
					break;
					case "seleccion_vta":
					  include ("Movimientos/seleccion_vta.php"); 
					break;
					case "salidas":
					  include ("Movimientos/salidas.php"); 
					break; 
					case "entradas":
					  include ("Movimientos/entradas.php"); 
					break; 
					case "nvo_invt":
					  include ("Movimientos/nvo_invt.php"); 
					break;
//	Puede servir					
					case "fact":
					  include ("Movimientos/fact.php"); 
					break;
//	Pedido Actualizaciones:						
					case "actualizarCatP":
					  include ("Categoria/updt_cat_p.php"); 
					break;
					case "actualizarCatS":
					  include ("Categoria/updt_cat_s.php"); 
					break;
					case "actualizarprod":
					  include ("Actualizar/updt_prod.php"); 
					break;
					case "actualizarserv":
					  include ("Actualizar/updt_srv.php"); 
					break;
					case "actualizarclient":
					  include ("Actualizar/updt_clte.php"); 
					break;
					case "actualizarprov":
					  include ("Actualizar/updt_prvdr.php"); 
					break;
//	Pedido Borrar Registros:
					case "borrar":
					  include ("Borrar/borrar_registros.php"); 
					break;
//	Pedido Reportes:
					case "rpt_invt":
					  include ("Reportes/rpt_invt.php"); 
					break;
					case "x_fechas":
					  include ("Reportes/rpt_x_fechas.php"); 
					break; 
//Creditos:
					case "boton0":
					  include ("Creditos/creditos.php"); 
					break;
//Pagina que por defecto aparecera si no se leccionan alguna de las otras
					default:
					include ("Creditos/creditos.php");}
exit;
		?>
		</section >
	</body>
</html>