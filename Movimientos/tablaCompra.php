<script>
//registro evento load mediante addEvenListener para updateValores
addEventListener('load',updateValores,false);
//inicializo un contador
id = 0;
var contador = 0;

function sumarTotal(){
	if(!comprobarItems()){
	contador = 	window.opener.document.formulario.balance.value;
	}
	subtotal = document.getElementById("total").value;
	total = parseInt (subtotal) + parseInt (contador);
	window.opener.document.formulario.balance.value = total;
	contador = total;

}
//actualiza total cada vez que se activa change en input cantidad o precio del popup
function updateValores(){
    document.getElementById('cant').addEventListener('change',rellenarTotal,false);	
	document.getElementById('p_c').addEventListener('change',rellenarTotal,false);
  }

//cada vez q se selecciona un registro se activa esta funcion que rellena inputs de abajo
function selectProducto( precio_cpra, existencia, min, nombre, codigo, marca){			
//	alert(nombre);
//	alert(marca.ToString());
	rellenarInputs(nombre,codigo, marca);
	rellenarPrecio(precio_cpra);
	rellenarCantidad(existencia, min);
	rellenarTotal();
}

//rellena los inputs ocultos para luego pasarlos a la pagina padre cargarItems.php
function rellenarInputs(nombre,codigo, marca){
	document.getElementById("nom_prod").value = nombre;
	document.getElementById("cod_prod").value = codigo;
	document.getElementById("mark_prod").value = marca;
}

//rellena el input precio
function rellenarPrecio(precio_cpra){
	document.getElementById("p_c").value = precio_cpra;
}

//rellena el input cantidad si el stock minimo es mayor q la cantidad se pone la cantidad q falta para llegar al minimo.
function rellenarCantidad(existencia, min){
	var stock = existencia;
	var minimo = min;
	valor = minimo - stock;
	if( valor > 0){
		cant = valor;
		document.getElementById("cant").value = cant;
	}
	else{
		document.getElementById("cant").value = 1;
	}
}

//multiplica la cantidad por el precio y rellena el input.
function rellenarTotal(){
	cant = obtenerCantidad();
	precio = document.getElementById("p_c").value;
	total = cant * precio;
	document.getElementById("total").value = total;
}

//lee el input cantidad y retorna su valor
function obtenerCantidad(){
	valor = document.getElementById("cant").value;
	return(valor);
}

function inspector(el) {
		var str ="";
		for (var i in el){
		str+=I + ": " + el.getAttribute(i) + "\n"; 
		}
	alert(str);
} 

//elimina un registro de la pagina cargar items
function eliminarOpcion(){
	var opcion = this.parentNode;
	//inspector(opcion);
	opcion.parentNode.removeChild(opcion);
	
	contador = 	window.opener.document.formulario.balance.value;
	total = parseInt (contador) - parseInt (resto);
	window.opener.document.formulario.balance.value = total;
	contador = total;

}

//Comprueba que el primer input este vacio para escribir en el o hacer un nuevo registro
function comprobarItems(){
	if(!window.opener.document.getElementById("codigo").value){
	return true;
	}
	else{
	return false;
	}
}

//Agregar la lista de productos seleccionados con sus cantidad, precio y total en la pagina cargarItems
function agregar_lista_producto(){

	//var nombre_id = "lista_prod";
	var cantidad= obtenerCantidad();
	
	var nombre = document.getElementById("nom_prod").value;
	var codigo = document.getElementById("cod_prod").value;
	var marca = document.getElementById("mark_prod").value;
	var subtotal = document.getElementById("total").value;
	var precio = document.getElementById("p_c").value;


	//si el primer registro el q aparece en cargarItems.php esta vacio se escribe en él
	if(comprobarItems()){
	
		window.opener.document.formulario.codigo.value = codigo;
		window.opener.document.formulario.nombre.value = nombre;
		window.opener.document.formulario.p_c.value = precio;
		window.opener.document.formulario.cant.value = cantidad;
		window.opener.document.formulario.subtotal.value = subtotal;
		window.opener.document.formulario.marca.value = marca;
		window.opener.document.formulario.balance.value = subtotal;
		contador = subtotal;
	}
	else{//sino se crea mas inputs y se los rellena
	
	ProductosComprados = window.opener.document.getElementById("cargarItems");
	
	var linea = window.opener.document.createElement("div");
	
	var cod = window.opener.document.createElement("input");
	cod.setAttribute("type", "number");
	cod.setAttribute("id", "items");
	cod.setAttribute("style","margin-left:5px");
	cod.setAttribute("name", "itemsCod"+ id);
	cod.setAttribute("value", codigo);
	
	var nom = window.opener.document.createElement("input");
	nom.setAttribute("type", "text");
	nom.setAttribute("id", "items");
	nom.setAttribute("name", "itemsNom" + id);
	nom.setAttribute("size", "8");
	nom.setAttribute("value", nombre);
	
	var mark = window.opener.document.createElement("input");
	mark.setAttribute("type", "text");
	mark.setAttribute("id", "itemsMark");
	mark.setAttribute("name", "items" + id);
	mark.setAttribute("size", "8");
	mark.setAttribute("value", marca);
	
	var p_c = window.opener.document.createElement("input");
	p_c.setAttribute("type", "number");
	p_c.setAttribute("id", "items");
	p_c.setAttribute("style","margin-left:3px");
	p_c.setAttribute("name", "itemsPC" + id);
	p_c.setAttribute("value", precio);
	
	var cant = window.opener.document.createElement("input");
	cant.setAttribute("type", "number");
	cant.setAttribute("id", "items");
	cant.setAttribute("name", "itemsCant" + id);
	cant.setAttribute("value", cantidad);
	
	var subtl = window.opener.document.createElement("input");
	subtl.setAttribute("type", "number");
	subtl.setAttribute("id", "items");
	subtl.setAttribute("name", "itemsSubt" + id);
	subtl.setAttribute("value", subtotal);
	
	var imagen = window.opener.document.createElement("img");
	imagen.src = "Iconos/remove.png";

	var boton = window.opener.document.createElement("button");
	boton.setAttribute("id", "remove");

	boton.addEventListener("click", eliminarOpcion);
	boton.appendChild(imagen);
	
	sumarTotal();

	linea.appendChild(boton);
	linea.appendChild(cod);
	linea.appendChild(nom);
	linea.appendChild(mark);
	linea.appendChild(p_c);
	linea.appendChild(cant);
	linea.appendChild(subtl);
	ProductosComprados.appendChild(linea);
	id ++;
	}
}

//si el cursor esta sobre un registro de la tabla popup se resalta y se pone una manito
function Resaltar_On(GridView)
{
    if(GridView != null)
    {
    GridView.originalBgColor = GridView.style.backgroundColor;
    GridView.style.backgroundColor='#DBE7F6';
    GridView.style.cursor = 'hand'; 
    }
}

//si el cursor deja de estar sobre un registro se vuelve al color normal
function Resaltar_Off(GridView)
{
    if(GridView != null)
    {
    GridView.style.backgroundColor = GridView.originalBgColor;    
    }
}

//cierra la ventana
function Close() {    
	window.close();
}

</script>

<?php
//elije si buscar productos por codigo o por nombre.
if(!isset($valor)){ $valor="deselected";}
if(isset($_GET{"enviar"})){
    if($_GET{"seleccion"}==2){
        $valor="selected";
        $qq="codigo";
    }else
        $qq="nombre";
}
?>
<strong>Buscar producto</strong>

<form id="form1" name="form1" method="get" action="?">
  <label for="seleccion"></label>
  <select id="input-reg" name="seleccion" id="seleccion">
    <option value="1">Por Nombre</option>
    <option value="2">Por C&oacute;digo</option>
  </select>
  <label for="q"></label>
  <input type="search" name="q" id="q" />
  <input type="submit" name="enviar" id="button" value="Buscar" />
</form>

<FORM >

<legend id="nombre_tabla">Productos</legend>
			<table id="tabla">
				<tr style="background-color:#81B9FF; color:white;">
					<td><b>C&oacute;digo</b></td>
					<td><b>Nombre</b></td>	
					<td><b>Marca</b></td>
					<td><b>Modelo</b></td>
					<td><b>&#36 Cpra</b></td>
					<td><b>&#36 Vta</b></td>
					<td><b>Stock</b></td>
					<td><b>Descripci&oacute;n</b></td>
					<td><b>M&aacute;x</b></td>
					<td><b>M&iacute;n</b></td>				
				</tr>
				
<?php 
    if(isset($_GET['q'])){
    $i=0;
  require "../conexion.php";
  $query = "SELECT * FROM producto WHERE ".$qq." LIKE '%".$_GET['q']."%' ";
  $r_query = mysqli_query($conexion, $query) or die("Failed to execute_query");
        //se arma la tabla con los registros de productos seleccionados
        while ($row = mysqli_fetch_array($r_query)) {
            $codigo=$row['codigo'];
			$nombre=$row['nombre'];
			//$nombre= str_replace(" ", "", $nombre);//se les borra los espacios en blanco.
			$marca=$row['marca'];
			//$marca=str_replace(" ", "", $marca);
			$modelo=$row['modelo'];
			$modelo=str_replace(" ", "", $modelo);
			$precio_cpra=$row['precio_cpra'];
			$precio_vta=$row['precio_vta'];
			$existencia=$row['existencia'];
			$descripcion=$row['descripcion'];
			$descripcion=str_replace(" ", "", $descripcion);
			$max=$row['max'];
			$min=$row['min'];
			
            //Anotacion: this ? =...".$precio_cpra.", ".$existencia.", ".$min." ...'$codigo','$nombre','$marca','$modelo','$precio_cpra','$precio_vta','$existencia','$descripcion','$max','$min','$id'
?>			
			<tr OnClick="selectProducto(<?=$precio_cpra?>, <?=$existencia?>, <?=$min?>, '<?=$nombre?>', <?=$codigo?>,'<?=$marca?>');" OnMouseOver="Resaltar_On(this);" OnMouseOut="Resaltar_Off(this);" >
			<td><?=$codigo?></td>
			<td><?=$nombre?></td>
			<td><?=$marca?></td>
			<td><?=$modelo?></td>
			<td><?=$precio_cpra?></td>
			<td><?=$precio_vta?></td>
			<td><?=$existencia?></td>
			<td><?=$descripcion?></td>
			<td><?=$max?></td>
			<td><?=$min?></td>
</tr>
 <?php     }
    }
?>
</table>
</form>
<!-- Aqui estan los inputs que luego se pasaran a cargarItems.php -->
<div>
		<fieldset id='cuadro'>
		<input id="cod_prod" name="cod_prod" type="hidden" />
		<input id="nom_prod" name="nom_prod" type="hidden" />
		<input id="mark_prod" name="mark_prod" type="hidden" />
		<div style="float:left" width="200px">
		<table>
                <tr>
                    <td><b>Cantidad:</b></td>
					<td><input id='cant' name='cant' type='number' min="1" required ></td>
				</tr>
				<tr>
					<td><b>Costo Unitario:</b></td>
					<td><input id='p_c' name='p_c' type='number' required ></td>
				</tr>
		</table>
		</div>
		<div>
		<table style="float:right">
				<tr>
					<td><b>Total:</b></td>
					<td><input id='total' name='total' type='number'></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><button onclick="agregar_lista_producto();">Agregar</button></td>
				</tr>
		</table>
		</div>
		</fieldset>
</div>
