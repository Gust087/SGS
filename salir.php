<?php 
require 'Creditos/info.php';
include("Secciones/session.php");
include("Secciones/encabezado.php");
include("Secciones/menu.php"); 
?>
<?php
	session_start();  
	session_unset($_SESSION['s_username']);  
	session_destroy();  
	header("location: http://localhost/SGS/entrar.php");
	exit;
?> 