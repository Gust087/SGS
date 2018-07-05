<?php
session_start(); 
require 'conexion.php';
if(!isset($_SESSION['s_username']))header("location: http://localhost/SGS/entrar.php");  
 
?>
