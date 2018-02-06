<?php
	session_start();
	require_once('tools/mypathdb.php');
	$email = $_POST ['Email'];
	$_SESSION["email"]=$email;
	// ==========================Buscar el password del cliente=====================================
	$query = mysql_query("SELECT * FROM staff WHERE email = '$email'"); 	
	$dataUsuario = mysql_fetch_array($query);	
	
	$clave = $dataUsuario['clave']; 
	$nombre = $dataUsuario['name']; 
	$apellido = $dataUsuario['lastname'];  
		
		
	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
		{		
		//Consegui el registro		
		// ==================envio de correo con el password ===================
		$destino = $email;
		
		$asunto = "Recuperar Password Asesorias JGG";
		$cabeceras = "Content-type: text/html"; 
		$cuerpo ="<h1>En Asesoria JGG nos preocupamos por ti!</h1><br><br>
				Hola <b>".$nombre." ".$apellido."</b>,<br><br> 				
				Hemos recuperado tu password: <strong> &nbsp;" 	.$clave."</strong><br><br>				
				Recuerda ingresar </a>  con tu cuenta de usuario: <b> $email </b><br><br>
				Tus amigos en Asesorias JGG<br>
				<img src=http://tabin.life/asesorias/images/password.png /><br>
				<a href=http://tabin.life/asesorias><img src=http://tabin.life/asesorias/images/logo.png /></a>
				<p></p>	<p></p>
				<hr>
				© Asesorias JGG 2018 - All rights reserved<br></h5>
				</p>";

		$yourWebsite = "tabin.life";				
		$yourEmail   = "info@tabin.life";
		$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);	
		}
		//desconectar();
		mysql_close();
		$data=array("exito" => '1');
		die(json_encode($data));		
?>