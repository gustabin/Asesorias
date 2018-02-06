<?php
	session_start(); 
	error_reporting(0);
	$pagina=$_SESSION['pagina'];
	require_once('tools/mypathdb.php');
	$username = strtolower($_POST ['username']);
	$clave = $_POST ['password'];

	$query = mysql_query("SELECT * FROM staff WHERE username = '$username' AND clave = '$clave'"); 	
	//$query = ("SELECT * FROM staff WHERE username = '$username' AND clave = '$clave'"); 	
	//var_dump($query);
	//die();
	$dataUsuario = mysql_fetch_array($query);	
	
	if(!empty($dataUsuario))
	{
	$usuario = $dataUsuario['usuario']; 
	$userID = $dataUsuario['staffid']; 
	$email = $dataUsuario['email']; 
	$nombre = $dataUsuario['name']; 
	$apellido = $dataUsuario['lastname']; 
	// ********** guardar en variables de sesion ******************
	$_SESSION['user_id'] = $userID;
	$_SESSION['correo'] = $email;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellido'] = $apellido;	
	$_SESSION['usuario'] = $usuario; // ********* 1=operador; 2=administrador; 3=manager **************
	}	
	
	if(empty($dataUsuario))
		{		
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
	{
		mysql_close();
		$data=array("exito" => '1'); // ingresar
		die(json_encode($data));
	}
?>