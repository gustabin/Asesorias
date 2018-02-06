<?php
	session_start(); 
	date_default_timezone_set('America/Caracas');
	// conector de BD 
	require_once('tools/mypathdb.php');
	$fullName = $_POST ['fullName'];
	$phone = strtolower ($_POST ['phone']);
	$email = $_POST ['email'];
	$fecha= date("Y-m-d H:i:s"); 
	$message = $_POST ['message'];
	

	//======================validar que el phone tenga mas de 6 caracteres=======================================
	if ((strlen($phone)<6) and (!empty($_POST ['phone'])))
	{
		//================================tipo de error json============================================
		$data=array("error" => '1');
		die(json_encode($data));
	} 

	// =========================Grabar los datos ===============================================================
	// =========================Introducir los datos en la tabla tbl_lead ==================================
	$query = "INSERT INTO tbl_lead (fullName, phone, email, fecha, message) VALUES ('".$fullName."','".$phone."',  '".$email."', '".$fecha."', '".$message. "')";
	
	$insertar = mysql_query($query); 
	$Id = mysql_insert_id(); //obtener id



	if($insertar == false) 
	{
		$data=array("error" => '1');
		die(json_encode($data));
	}
	else
	{
		//Los datos se han insertado correctamente.
		//========asignar valor a variable de session ==============
		$_SESSION['fullName']=$fullName;
		$_SESSION['phone']=$phone;
		$_SESSION['email']=$email;
		$_SESSION['fecha']=$fecha;
		$_SESSION['message']=$message;		
		$_SESSION['Id']=$Id;
		//desconectar();
		mysql_close();
		
	
		// ===================envio de correo notificandome que alguien completo el formulario ===================
		
		$destino ="gustabin@yahoo.com";		
		$asunto = "Contacto Web Asesorias";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hola, un usuario se ha registrado en el website de Asesosrias JGG!</h2>
		La información enviada es la siguiente:<br>		
		<b>Nombre: </b>$fullName<br>
		<b>Teléfono: </b>$phone<br>
		<b>Email: </b>$email<br>		
		<b>Fecha: </b>$fecha<br>
		<b>Mensaje: </b>$message<br>		
		<br><br>
  	    Asesorias JGG Team<br>
		<img src=http://tabin.life/asesorias/images/logo.png />
		<p>				
		<br> 
		<p></p>Designed by <br>
		© Copyright 2018 © Tabin - All rights reserved<br></h5>

		<div class='container-fluid'>
  <div class='row'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-6'>
				  <img src=http://tabin.life/asesorias/images/logo.png />
				</div>
				<div class='col-md-6'>
					<h3>
						http://www.tabin.life/asesorias
					</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					<p>
						Hi Gustavo<br>
Thank you for giving Explee a try!<br>

Sadly, your trial period has ended, and you'll no longer be able to create nor edit any video.<br>

Don't worry though, nothing has been lost! We carefully saved all your projects so you can continue editing
 them right away.
Subscribe now to continue editing your videos<br>


Our premium plans start at $7 a month. Companies like Google, IBM, AT&T, Mazars and Salesforce have already
 made the leap to Premium. Explee helps them communicate better.<br>

Any questions? Just reply to this e-mail. I'm happy to help.<br><br>

See you soon,<br>
Thomas<br>
CEO Explee<br>
					</p>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
				</div>
				<div class='col-md-4'>
					 
					     Explee Facebook Explee Twitter Explee Google+ Explee Youtube <br>

Unsubscribe from our emails<br>

Copyright 2017 Explee. All right reserved<br>
				</div>
				<div class='col-md-4'>
				</div>
			</div>
	</div>
  </div>
</div>

		</p>";
		
		$yourWebsite = "tabin.life";
		$yourEmail   = "info@tabin.life";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);	
		
		
		// ========================================envio de correo al customer ===================
		$destino = $email;
		$asunto = "Bienvenido a Asesorias JGG";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Querido cliente,</h2><br>
        Gracias por contactar a Asesorias JGG. <br>
		Gracias por escogernos como su preferida opcion en el campo de las finanzas.<br><br>
		Hemos recibido su información y muy pronto uno de nuestros agentes se pondrá en contácto con usted.<br>
		Mientras espera, porque no ser sociable?<br><br>
		<a href=https://www.facebook.com/><i class=fa fa-facebook></i></a>  		
		<br>Saludos,<br>
		Asesorias JGG Team<br>
		<a href=https://tabin.life/asesorias><img src=http://tabin.life/asesorias/images/logo.png /></a> 
		<p>				
		<br> 
		<p></p>Designed by <br>
		© Copyright 2018 Tabin - All rights reserved<br></h5>
		

    <div class='container-fluid'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-6'>
					<img src=http://tabin.life/asesorias/images/logo.png />
				</div>
				<div class='col-md-6'>
					<h3>
						http://www.tabin.life/asesorias
					</h3>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					<p>
						Hi Gustavo<br>
Thank you for giving Explee a try!<br>

Sadly, your trial period has ended, and you'll no longer be able to create nor edit any video.<br>

Don't worry though, nothing has been lost! We carefully saved all your projects so you can continue editing them right away.
Subscribe now to continue editing your videos<br>


Our premium plans start at $7 a month. Companies like Google, IBM, AT&T, Mazars and Salesforce have already made the leap to Premium. Explee helps them communicate better.<br>

Any questions? Just reply to this e-mail. I'm happy to help.<br><br>

See you soon,<br>
Thomas<br>
CEO Explee<br>
					</p>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
				</div>
				<div class='col-md-4'>
					 
					     Explee Facebook Explee Twitter Explee Google+ Explee Youtube <br>

Unsubscribe from our emails<br>

Copyright 2017 Explee. All right reserved<br>
				</div>
				<div class='col-md-4'>
				</div>
			</div>
		</div>
	</div>
</div>

		</p>";


		$yourWebsite = "tabin.life";
		$yourEmail   = "info@tabin.life";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
//var_dump("aqui");
//die();	
		
		//================================Redirigir a otra pagina============================================	
		//================================tipo de error json============================================			
		$data=array("exito" => '1');
		die(json_encode($data));
	}	
?>
