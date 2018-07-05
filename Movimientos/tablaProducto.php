<script>
//cada vez q se selecciona un registro se activa esta funcion que rellena inputs de abajo
function selectProducto( existencia, nombre, codigo){			
	var nombre = nombre;
	var codigo = codigo;
	var stock = existencia;
	//si el primer registro el q aparece en cargarItems.php esta vacio se escribe en él
	if(comprobarItems()){
		window.opener.document.formulario.codigo.value = codigo;
		window.opener.document.formulario.nombre.value = nombre;
		window.opener.document.formulario.stock.value = stock;
	}
		
	Close();
}

//Comprueba que el primer input este vacio para escribir en el o hacer un nuevo registro
function comprobarItems(){
	if(!window.opener.document.getElementsByName("codigo").value){
	return true;
	}
	else{
	return false;
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
					<td><b>&#36 vta</b></td>
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
			$precio_vta=$row['precio_vta'];
			$precio_vta=$row['precio_vta'];
			$existencia=$row['existencia'];
			$descripcion=$row['descripcion'];
			$descripcion=str_replace(" ", "", $descripcion);
			$max=$row['max'];
			$min=$row['min'];
?>			
			<tr OnClick="selectProducto(<?=$existencia?>, '<?=$nombre?>', <?=$codigo?>);" OnMouseOver="Resaltar_On(this);" OnMouseOut="Resaltar_Off(this);" >
			<td><?=$codigo?></td>
			<td><?=$nombre?></td>
			<td><?=$marca?></td>
			<td><?=$modelo?></td>
			<td><?=$precio_vta?></td>
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

