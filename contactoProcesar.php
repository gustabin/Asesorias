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
		
		$destino="gustabin@yahoo.com";
		$asunto = "Contacto Web Asesorias";
		$cabeceras = "Content-type: text/html";
		$cuerpo='<div>
					<div style="background-color: #041947;">
						<div style="display: inline-block;">
					        <a href="http://tabin.life/asesorias/index.html">
					        	<img src="http://citadr.com/artes/programacion/asesorias/images/logo-jose-gregorio-garcia.png" alt="">
					        </a>
				        </div>

						<div style="display: inline-block; float: right;">
							<li style="display: inline-block; color: #878888; font-family:Arial;" ><strong>Página:</strong></li>
							<li style="display: inline-block;"><a href="http://tabin.life/asesorias/index.html" style=" text-decoration: none;color: #ffffff; font-family: Arial;">http://tabin.life/asesorias/index.html</a></li>
						</div>
					</div>
				</div>



				<div style="background-color: #878888;">
					<div style="height: 10px;"></div>
					<div style="background-color: white;">
						<div style="text-align: center;">
							<h3 style="font-weight:700; line-height: 36px; color: #666666; font-size: 22px; font-family: Arial;">Hola</h3>
							<h1 style="font-weight:700;line-height: 36px;color: #303030; font-size: 40px;font-family: Arial;">Gustavo</h1>
						</div>

					<div class="item">
					    <div style="text-align: center;">
					        <h2 style="font-weight:700;line-height: 12px;color: #303030; font-size: 14px;font-family: Arial;">
					          Nos complace informarle que alguien ha completado el formulario de contacto de la página asesorias Jose Gregorio Garcia. 
					          	<br>
						        <br>La informacion ha sido enviada exitosamente. 
						        <br>
								<br>
							</h2>
						</div>
					</div>
					<div style="height: 10px;"></div>
				</div>


				<div style="background-color: #242427;">
					<div class="footer-logo pull-left">
						<img src="http://citadr.com/artes/programacion/asesorias/images/footer-logo.png" alt="">
					</div>
					<span style="color: #666666; font-size: 22px; font-family: Arial;">Copyright © 2018 Kem Advisor. Todos los Derechos Reservados.</span>
					
					<div style="display: inline-block; float: right; margin-right: 19px;">
						<a href="http://tabin.life/asesorias/contact.html" style="text-decoration: none;color: #666666; font-size: 22px; font-family: Arial;">Contáctanos</a>
					</div>
				</div>
				</div>';

		
		$yourWebsite = "tabin.life";
		$yourEmail   = "info@tabin.life";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);	
		
		
		// ========================================envio de correo al customer ===================
		$destino = $email;
		$asunto = "Bienvenido a Asesorias JGG";
		$cabeceras = "Content-type: text/html";
		$cuerpo='<div>
						<div style="background-color: #041947;">
							<div style="display: inline-block;">
						        <a href="http://tabin.life/asesorias/index.html">
						        	<img src="http://citadr.com/artes/programacion/asesorias/images/logo-jose-gregorio-garcia.png" alt="">
						        </a>
					        </div>

							<div style="display: inline-block; float: right;">
								<li style="display: inline-block; color: #878888; font-family:Arial;" ><strong>Página:</strong></li>
								<li style="display: inline-block;"><a href="http://tabin.life/asesorias/index.html" style=" text-decoration: none;color: #ffffff; font-family: Arial;">http://tabin.life/asesorias/index.html</a></li>
							</div>
						</div>
					</div>



					<div style="background-color: #878888;">
						<div style="height: 10px;"></div>
						<div style="background-color: white;">
							<div style="text-align: center;">
								<h3 style="font-weight:700; line-height: 36px; color: #666666; font-size: 22px; font-family: Arial;">Hola</h3>
								<h1 style="font-weight:700;line-height: 36px;color: #303030; font-size: 40px;font-family: Arial;">Querido cliente</h1>
							</div>

						<div class="item">
						    <div style="text-align: center;">
						        <h2 style="font-weight:700;line-height: 12px;color: #303030; font-size: 14px;font-family: Arial;">
						        <br>
						        <br>La informacion ha sido enviada exitosamente. 
						        <br>Gracias por contactar a Kem Advisor.<br>
								<br>Gracias por escogernos como su preferida opcion en el campo de las finanzas.
								<br>Hemos recibido su información y muy pronto uno de nuestros agentes se pondrá en contácto con usted.
								<br>Mientras espera, porque no ser sociable?
								<br>
								<br>Saludos,
								<br>Kem Advisor Team
								<br><a href=https://tabin.life/asesorias><img src="http://citadr.com/artes/programacion/asesorias/images/logo-jose-gregorio-garcia.png"/></a> 
								
								</h2>



					<div style="background-color: #242427;">
						<div class="footer-logo pull-left">
							<img src="http://citadr.com/artes/programacion/asesorias/images/footer-logo.png" alt="">
						</div>
						<span style="color: #666666; font-size: 22px; font-family: Arial;">

						<br><p>Designed by <p>
								Copyright © 2018 Kem Advisor - Todos los Derechos Reservados.<br>
						</span>
						
						<div style="display: inline-block; float: right; margin-right: 19px;">
							<a href="http://tabin.life/asesorias/contact.html" style="text-decoration: none;color: #666666; font-size: 22px; font-family: Arial;">Contáctanos</a>
						</div>
					</div>


							</div>
						</div>
						<div style="height: 10px;"></div>
					</div>


					</div>';

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
