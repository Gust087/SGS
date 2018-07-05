<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
        <title>SGS</title>
		<link rel="shortcut icon" href="/localhost/SGS/Iconos/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/localhost/SGS/Iconos/favicon.ico" type="image/x-icon">
		<!--script type='text/javascript' src='/SGS/JS/jquery-1.3.2.min.js'></script-->
		<!--script type='text/javascript' src='/SGS/JS/example.js'></script-->
		<!--script type="text/javascript" src="/SGS/JS/nvasVentanas.js"></script-->
        <link rel="stylesheet" href="http://localhost/SGS/Estilos/style.css" type="text/css" />
		<link rel="stylesheet" href="http://localhost/SGS/Estilos/base.css" type="text/css" />
		<link rel="stylesheet" href="http://localhost/SGS/Estilos/menu.css" type="text/css" />
		<link rel="stylesheet" href="http://localhost/SGS/Estilos/contenido.css" type="text/css" />
 <script type="text/javascript">
/*
addEventListener('load',updtTotal,false);
var total = document.getElementByName("total").value;
 
function updtTotal(){
    document.getElementById('cargarItems').addEventListener('change',sumarTotal,false);	
  }
function sumarTotal(){
	subtotal = document.getElementByName("subtotal").value;
	total = total + subtotal;
	document.getElementByName("total").value = total;

}*/
function verTabla() {
	tabla=window.open("Movimientos/tablaCompra.php", "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes,width=650,height=350"); 
    tabla.focus();
	}
function verTablaVta() {
	tablaV=window.open("Movimientos/tablaVenta.php", "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes,width=650,height=350"); 
    tablaV.focus();
	}
function verTablaProd() {
	tablaP=window.open("Movimientos/tablaProducto.php", "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes,width=650,height=350"); 
    tablaP.focus();
	}
function verTablaCliente() {
	tablaC=window.open("Movimientos/tablaCliente.php", "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes,width=750,height=350"); 
    tablaC.focus();
	}
function imprimir(tipo) {
	var selec = tipo;
	tablaI=window.open("Imprimir/imprimir.php?"+selec, "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes"); 
    tablaI.focus();
	}
function imprimirMov(tipo,f_1,f_2) {
	var selec = tipo;
	tablaIM=window.open("Imprimir/imprimir.php?"+selec+"&F1="+f_1+"&F2="+f_2, "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes"); 
    tablaIM.focus();
	}
 function imprimirFact(NF,PV){
	tablaIF=window.open("Imprimir/imprimirFact.php?NF="+NF+"&PV="+PV, "popupId", "location=no, titlebar=no, resizable=no, toolbar=no, menubar=yes"); 
    tablaIF.focus();
	}
 </script>
 		<!--link rel="stylesheet" href="form2.css" type="text/css" />-->
</head>
</html>