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


 /*
function popUp()
  {
   var ventana;
   ventana = window.parent.opener;
   ventana.location = www.google.com;
   window.parent.close();
  }
  
  
function popUp(link) {
    window.open(link, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
}

!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Untitled</title>
<script language="javascript" type="text/javascript"> 
var url = "http://www.google.com";
var height = "400"; 
var width = "600"; 
var top = "200"; 
var left = "300";


var scrollbars = "1"; /* scrollbar  
var toolbar = "1"; /* toolbar  
var location = "1"; /* location bar  
var menubar = "1"; /* menu bar  
var statusbar = "0"; 
var resizeable = "1" /* allow user to resize window 

function popUpGenerator() { 
var popUpString = ''; 
popUpString += 'height=' + height; 
popUpString += ',width=' + width; 
popUpString += ',top=' + top; 
popUpString += ',left=' + left; 
popUpString += ',scrollbars=' + scrollbars; 
popUpString += ',toolbar=' + toolbar; 
popUpString += ',location=' + location; 
popUpString += ',status=' + statusbar; 
popUpString += ',resizable=' + resizeable;
popUpString += ',menubar=' + menubar; 
window.open(url, 'newPopup', popUpString); }
</script>
</head>
<body>
<input id="Button1" type="button" value="Show Popup" onclick="popUpGenerator()" /> 
</body>
</html>


Añade estas declaraciones de variables debajo de la primera etiqueta de script:  
Establecer el valor de la variable "url" a cualquier URL que gustes. Si no la cambias, la ventana emergente mostrará la página web de la Casa Blanca como en el ejemplo. Las variables height y width definen la altura y la anchura de la ventana emergente. "top" y "left" le dicen al navegador en qué punto colocar la ventana emergente desde la parte superior de la pantalla y el borde izquierdo de la pantalla. En este ejemplo, la ventana emergente aparecerá a 200 píxeles de arriba, y a 300 de la izquierda. Los valores de height y width son también en píxeles.

5
Añade estas declaraciones de variables debajo de las que se muestran en el paso anterior:  
Estas variables te permiten mostrar u ocultar varios componentes del navegador. Si el valor de una variable es "1", el componente aparece. Si su valor es "0", el navegador no muestra ese componente en particular. En este ejemplo, el navegador mostrará la barra de menú porque el valor de la "barra de menú" es "1". El navegador ocultará la barra de estado, porque el valor de la "barra de estado" variable es "0". Ajusta estos valores como quieras personalizar la apariencia de la ventana emergente.

6
Pega la siguiente función JavaScript después del código descrito en el apartado anterior: 
Este es el generador de ventanas emergentes. Combina las variables establecidas previamente y utilízalas para personalizar el método "window.open" que abre la ventana emergente.

7
Guarda el documento HTML y ábrelo en cualquier navegador. Haz clic en el "Mostrar ventana emergente". La ventana emergente aparecerá