<?php 
include_once("entrar.php");  ?>

<?php session_start();
  
  require 'conexion.php';
  
  if (isset($_POST['username'])) {
//Comprobacion del envio del nombre de usuario y password
		$username=$_POST['username'];
		$password=$_POST['password'];
		if ($password==NULL) {
			header('Refresh: 2; URL= http://localhost/SGS/entrar.php'); 
			echo "Password Invalido";
			exit;
		}else{
			$query = mysqli_query($conexion, "SELECT name,password FROM users WHERE name = '$username'");
			$data = mysqli_fetch_array($query);
			if($data['password'] != $password) {
				header('Refresh: 2; URL= http://localhost/SGS/entrar.php');
				echo "Datos Incorrectos. Por Favor Intenta De Nuevo.";
				exit;
			}else{
				$query = mysqli_query($conexion, "SELECT name,password FROM users WHERE name = '$username'");
				$row = mysqli_fetch_array($query);
				$_SESSION["s_username"] = $row['name'];
				header('Refresh: 2; URL=  http://localhost/SGS/index.php');
			}
		}
	}
	else { 
		header('Refresh: 2; URL= http://localhost/SGS/entrar.php'); 
		echo "Debe ingresar un nombre de usuario valido";
		exit;
	}
?>