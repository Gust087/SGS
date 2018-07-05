<script>

function agregar_datos_cliente(nombre, apellido, documento, direccion, telefono, id){

	//var nombre_id = "lista_prod";
	
	var clte = nombre + " " + apellido;
	window.opener.document.formulario.id.value = id;
	window.opener.document.formulario.cliente.value = clte;
	window.opener.document.formulario.DNI.value = documento;
	window.opener.document.formulario.dir.value = direccion;
	window.opener.document.formulario.tel.value = telefono;
	Close();
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
//elije si buscar clientes por codigo o por nombre.
if(!isset($valor)){ $valor="deselected";}
if(isset($_GET{"enviar"})){
    if($_GET{"seleccion"}==2){
        $valor="selected";
        $qq="documento";
        $pp="documento";
	}else
        $qq="nombre";
		$pp="apellido";
}
?>
<strong>Buscar cliente</strong>

<form id="form1" name="form1" method="get" action="?">
  <label for="seleccion"></label>
  <select id="input-reg" name="seleccion" id="seleccion">
    <option value="1">Por Nombre</option>
    <option value="2">Por DNI</option>
  </select>
  <label for="q"></label>
  <input type="search" name="q" id="q" />
  <input type="submit" name="enviar" id="button" value="Buscar" />
</form>

<FORM >

<legend id="nombre_tabla">Clientes</legend>
			<table id="tabla">
				<tr style="background-color:#81B9FF; color:white;">
					<td><b>Nombre</b></td>	
					<td><b>Apellido</b></td>
					<td><b>Direcci&oacute;n</b></td>
					<td><b>Ciudad</b></td>
					<td><b>Celular</b></td>
					<td><b>Tel&eacute;fono</b></td>
					<td><b>Documento</b></td>
					<td><b>email</b></td>
				</tr>
				
<?php 
    if(isset($_GET['q'])){
    $i=0;
  require "../conexion.php";
  $query = "SELECT * FROM cliente WHERE ".$qq." LIKE '%".$_GET['q']."%' OR ".$pp." LIKE '%".$_GET['q']."%' ";
  $r_query = mysqli_query($conexion, $query) or die("Failed to execute_query");
        //se arma la tabla con los registros de clientes seleccionados
        while ($row = mysqli_fetch_array($r_query)) {
            $id=$row['id_client'];
			$nombre=$row['nombre'];
			$apellido=$row['apellido'];
			$direccion=$row['direccion'];
			$ciudad=$row['ciudad'];
			$celular=$row['celular'];
			$telefono=$row['telefono'];
			$documento=$row['documento'];
			$email=$row['email'];?>
			
			<tr OnClick="agregar_datos_cliente('<?=$nombre?>', '<?=$apellido?>', '<?=$documento?>', '<?=$direccion?>', <?=$telefono?>, <?=$id?> );" OnMouseOver="Resaltar_On(this);" OnMouseOut="Resaltar_Off(this);" >
			<td><?=$nombre?></td>
			<td><?=$apellido?></td>
			<td><?=$direccion?></td>
			<td><?=$ciudad?></td>
			<td><?=$celular?></td>
			<td><?=$telefono?></td>
			<td><?=$documento?></td>
			<td><?=$email?></td>
</tr>
 <?php     }
    }
?>
</table>
</form>
<!-- Aqui estan los inputs que luego se pasaran a cargarItems.php -->
