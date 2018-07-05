<!DOCTYPE html>
<html lang="es">
    <body>
    <header>
       <div id="titulo"> <h1>Sistema Gestión de Stock</h1> </div>
            <div id="entrar">
			<form action="login.php" method="post">
            <label><b>User:</b> 
			<input  placeholder="Usuario" type="text" name="username" id="input" required autofocus /></label>
            <label><b>Password:</b> 
			<input  placeholder="Contrase&ntilde;a" type="password" name="password" id="input"/></label>
			
			<div id="sector_button">
				<button type="submit" id="button" > Ingresar </button>
			</div>
            </form>
        </div>
        </header>
</body>
</html> 
<?php 
include_once("Secciones/encabezado.php");
include_once("Secciones/pie.php"); 
?>