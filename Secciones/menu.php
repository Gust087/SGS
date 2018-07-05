<!DOCTYPE html>
<html lang="es">
<body>	
    <header>
        <div id="usuario"> <?php echo ucwords($_SESSION['s_username']);?> || <a id="link" href="index.php?pagina=cuenta">Mi cuenta </a>|| <a id="link" href="http://localhost/SGS/salir.php">Cerrar Sesión</a></div>
			<div id="cabecera"> 
				<div id="titulo"> <h1>Sistema Gestión de Stock</h1> </div>
			</div>

    </header>	
<nav id="navegacion">			
<div id="menu">
<ul>
	<li><a href="backup.php">Backup</a>
    </li>
	<li><a href="index.php?seccion=reporte">Reportes</a> 
    </li>
	<li><a href="index.php?seccion=movimiento">Movimientos</a> 
    </li>
    <li><a href="index.php?seccion=registro">Registros</a> 
    </li>
	<li><a href="index.php?pagina=boton0">Inicio </a></li>
    </ul>
</div>
</nav>
</body>
</html> 