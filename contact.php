<?php 
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
   <title>Jose Gregorio Garcia &amp; Asesor Financiero</title>

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="css/colorbox.css">




	<!--ESTAS 3 LINEAS SON OBLIGATORIAS PARA QUE FUNCIONE EL AJAX !-->    

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />


<!-- Nuevas lineas !-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<!--script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script!-->
<!-- initialize jQuery Library -->
<script type="text/javascript" src="js/jquery.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--script src="js/jquery-ui.js"></script!-->
<script src="js/jquery.validate.js"></script>

<script language="JavaScript" type="text/JavaScript">		
    //Metodo para cargar el formulario 
    $("body").on('submit', '#formContacto', function(event) {
	event.preventDefault()
	if ($('#formContacto').valid()) {
	    $.ajax({
		type: "POST",
		url: "contactoProcesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) {
			  $('#error').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			 
			if (respuesta.exito == 1) {			 	
			  $('#contactForm').hide();
			  $('#contactFormExitoso').show();	  			  			  			  
			  document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';
		    }			    
		}
	    });
	}
	});
	
	
	$("body").on('submit', '#formSuscribe', function(event) {
	event.preventDefault()
	if ($('#formSuscribe').valid()) {
	    $.ajax({
		type: "POST",
		url: "suscripcionProcesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) {
			  $('#error').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			 
			if (respuesta.exito == 1) {			 	
			  $('#subscribe').hide();
			  $('#subscribeFormExitoso').show();	  			  			  
			  //window.location.href='http://www.oikosplus.com/luxury/enviarEmail.php?Page=index&Id=<?php //echo $_SESSION["Id"]?>';
			  //window.location.href='enviarEmail.php?Page=contact&Id=<?php //echo $_SESSION["Id"]?>';
			  document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';
		    }			    
		}
	    });
	}
	});
</script>
</head>
	
<body>

	<div class="body-inner">

	<div id="top-bar" class="top-bar">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 col-sm-6 col-xs-12 top-social">
					<ul class="unstyled">
						<li>
							<a title="Facebook" href="#">
								<span class="social-icon"><i class="fa fa-facebook"></i></span>
							</a>
							<a title="Twitter" href="#">
								<span class="social-icon"><i class="fa fa-twitter"></i></span>
							</a>
							<a title="Google+" href="#">
								<span class="social-icon"><i class="fa fa-google-plus"></i></span>
							</a>
							<a title="Linkdin" href="#">
								<span class="social-icon"><i class="fa fa-linkedin"></i></span>
							</a>
							<a title="Rss" href="#">
								<span class="social-icon"><i class="fa fa-rss"></i></span>
							</a>
						</li>
					</ul>
				</div><!--/ Top social end -->


			</div><!--/ Content row end -->
		</div><!--/ Container end -->
	</div><!--/ Topbar end -->

	<!-- Header start -->
	<header id="header" class="header-light nav-style-boxed">
		<div class="container">
			<div class="row">
				<div class="logo col-xs-12 col-sm-3">
                <a href="index.html">
                	<img src="images/logo.png" alt="">
                </a>
         	</div><!-- logo end -->

         	<div class="col-xs-12 col-sm-8 header-right">
         		<ul class="top-info">
						<li>
							<div class="info-box"><span class="info-icon"><i class="fa fa-map-marker">&nbsp;</i></span>
								<div class="info-box-content">
									<p class="info-box-title">3859 Crestwood Circle</p>
									<p class="info-box-subtitle">Weston, FL 33331 USA</p>
								</div>
							</div>
						</li>
						<li>
							<div class="info-box"><span class="info-icon"><i class="fa fa-phone">&nbsp;</i></span>
								<div class="info-box-content">
									<p class="info-box-title">(+1) 954-235-3264</p>
									<p class="info-box-subtitle">jggarcia@bellsouth.net</p>
								</div>
							</div>
						</li>
						<li>
							<div class="info-box"><span class="info-icon"><i class="fa fa-compass">&nbsp;</i></span>
								<div class="info-box-content">
									<p class="info-box-title">Lun-Sab (10am-18pm)</p>
									<p class="info-box-subtitle">Domingo Cerrado</p>
								</div>
							</div>
						</li>
					</ul>
         	</div><!-- header right end -->
			</div><!-- Row end -->
		</div><!-- Container end -->

		<nav class="site-navigation navigation">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="site-nav-inner pull-left">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
			    			</button>

			    			<div class="collapse navbar-collapse navbar-responsive-collapse">
			    				<ul class="nav navbar-nav">
									<li>
				                  <a href="index.html">Inicio </a>
				               </li>

								<li class="active">
				                  <a href="contact.php">Contácto</a>
				               </li>

				            </ul><!--/ Nav ul end -->
			    			</div><!--/ Collapse end -->

						</div><!-- Site Navbar inner end -->

						<div class="request-quote pull-right">
			    			<a href="#">Solicitar Cotización</a>
			    		</div>

					</div><!--/ Col end -->
				</div><!--/ Row end -->
			</div><!--/ Container end -->

		</nav><!--/ Navigation end -->
	</header><!--/ Header end -->


	<section id="map-wrapper" class="no-padding">
		<div class="container-fluid">
			<div id="map" class="map"></div>
		</div>
	</section><!-- Map end -->

	<!--section id="main-container" class="main-container"!-->
	<!--section id="contactForm" class="section">   
		<div class="container">

			<div class="row">
				<div class="col-md-12">
	    			<h3 class="title-normal">Formulario de Contácto</h3>
	    			
	    			<form data-toggle="validator" class="form-vertical" role="form" id="formContacto"  enctype="multipart/form-data">
	    				<div class="error-container"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Nombre</label>
								<input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Correo</label>
									<input class="form-control form-control-email" name="email" id="email" 
									placeholder="" type="email" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Asunto</label>
									<input class="form-control form-control-subject" name="subject" id="subject" 
									placeholder="" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Mensaje</label>
							<textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10" required></textarea>
						</div>
						<div class="text-right"><br>
							<button class="btn btn-primary solid blank" type="submit">Enviar 
							Mensaje</button> 
						</div>
					</form>
	    		</div>
			
			</div!--><!-- Content row !-->
		<!--/div!--><!-- Conatiner end !-->
	<!--/section!--><!-- Main container end !-->
	    <!-- Contact Section Start -->    
	<section id="contactForm" class="section">   
      <div class="container">
        <div class="row justify-content-md-center">          
          <div class="col-md-9">            
            <div>
              <div>          
                <h2>Contact <span>Us</span></h2>
                <hr>
              </div>
                    <form class="form-vertical" id="formLogin">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input required id="username" type="text" class="form-control" name="username" placeholder="Username"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input required id="password" type="text" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                                <label style="font-size: 90%;">
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                          </div>
                          <div style="float:right; font-size: 80%; position: relative; top:-10px">
                                <a href="recuperar.php" href="" style="color:#62CB31">
                                    ¿Forgot Password?
                                </a>
                          </div>
                          <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                                <div class="col-sm-12 controls" align="center">
                                  <!--a id="btn-fblogin" href="#" class="btn btn-primary">Iniciar Sesión</a!-->
                                  <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Start</button>
                                </div>
                          </div>
                          <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:14px;" align="center" >
                                        ¿Do you have account? 
                                    <a href="#" onClick="$('#loginbox').hide(); $('#dataOperador').show()" style="color:#62CB31">
                                        Sign in
                                    </a>
                                    </div>
                                </div>
                          </div>                             
                    </form> 
            </div>
          </div>
        </div>
      </div>
    </section>

	<section id="contactFormExitoso" style="display: none;">			
		<div class="container-fluid" style="background-image:url(images/team/team7.jpg); background-size: cover; background-position: right;">			
			<div class= "halfsearch">
				<div id="Confirm"><br><br>

					<br><br>
					<br><br>                       
					<font color="#FFFFFF" size="+3">Gracias por enviar tu información<br>
					Uno de nuestros representantes se pondrá en contácto muy pronto!<br> 
					Si quieres llamarnos ahora, danos una llamada!<br></font>
					<font color="#FFFFFF" size="+1">Nuestro horario de oficina es:<br>Lunes a Viernes<br>
					9am - 6pm  (UTC -4)<br>
					954 235 3264 ext.3</font>
					<br><br>
					<br><br>
					<br><br>

				</div>
			</div>
		</div>
	</section>
    <!-- Contact Section End -->

	
	<section class="call-to-action no-padding bg-overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="action-icon pull-left">
						<i class="fa fa-paper-plane-o"></i>
					</div>
					<div class="call-to-action-text">
						<h3 class="action-title">Siempre te ayudaremos a hacer crecer tu negocio</h3>
						<p class="action-sub-title">Nuestra misión es proveer la más alta calidad de solución y servicio</p>
					</div>
					<div class="call-to-action-btn">
						<a class="btn btn-secondary" href="#">Obtener cotización</a>
						<a class="btn btn-primary btn-white" href="#">Leer más</a>
					</div>
				</div>
			</div>
		</div><!--/ Container end -->
   </section><!-- Call to Action end -->

	
	<footer id="footer" class="footer">
		<div class="footer-main">
			<div class="container">
				<div class="row">

					<div class="col-md-3 col-sm-12 footer-widget footer-about">
						<h3 class="widget-title">Acerca de JGG</h3>
						<p>Somos una empresa asesora de finanzas, encargada de proveer soluciones, información y apoyo a cualquier entidad comercial que necesite un empujón para saltar al éxito económico.</p>
						<div class="gap-20"></div>
						<p><a href="#" class="btn btn-primary">Leer más</a></p>
					</div><!-- Col end -->

					<div class="col-md-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Enlaces rápidos</h3>

						<ul class="list-arrow">
							<li><a href="#">Inversiones</a></li>
							<li><a href="#">Ayuda con impuestos</a></li>
							<li><a href="#">Hipoteca</a></li>
							<li><a href="#">Préstamos comerciales</a></li>
							<li><a href="#">Tarjetas de Crédito</a></li>
							<li><a href="#">Planificación Fiscal</a></li>
							<li><a href="#">Fondos Mutuos</a></li>
							<li><a href="#">Titulares de acciones</a></li>
							<li><a href="#">Depósitos</a></li>
							<li><a href="#">Carreras</a></li>
							<li><a href="#">Comercio de acciones</a></li>
							<li><a href="#">Consultas</a></li>
						</ul>
					</div><!-- Col end -->

					<div class="col-md-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Suscríbete</h3>
						<div class="newsletter-introtext">
							Suscríbase a nuestros boletines y reciba noticias sobre nuestros descuentos.
						</div>
						<form action="#" method="post" id="newsletter-form" class="newsletter-form">
							<div class="form-group">
								<input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="Ingrese su correo" autocomplete="off">
								<button class="btn btn-primary">Suscríbete</button>
							</div>
						</form>

						<div class="footer-social">
							<h3 class="widget-title">Síguenos</h3>
							<ul>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div><!-- Footer social end -->
					</div><!-- Col end -->

					<div class="col-md-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Contáctanos</h3>

						<div class="contact-info-box">
							<i class="fa fa-map-marker">&nbsp;</i>
							<div class="contact-info-box-content">
								<h4>Visítanos</h4>
								<p>3859 Crestwood Circle, Weston, FL 33331 USA</p>
							</div>
						</div>

						<div class="contact-info-box">
							<i class="fa fa-envelope-o">&nbsp;</i>
							<div class="contact-info-box-content">
								<h4>Escríbenos a</h4>
								<p>jggarcia@bellsouth.net</p>
							</div>
						</div>

						<div class="contact-info-box">
							<i class="fa fa-phone">&nbsp;</i>
							<div class="contact-info-box-content">
								<h4>Llámanos</h4>
								<p>+1 954 235 3264</p>
							</div>
						</div>
						
					</div><!-- Col end -->


				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer main end -->


		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						<div class="copyright-info">
							<div class="footer-logo pull-left">
								<img src="images/footer-logo.png" alt="">
							</div>
							<span>Copyright © 2018 JGG. Todos los Derechos Reservados.</span>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-push-1">
						<div class="footer-menu" style="margin-right: 150px;">
							<ul class="nav unstyled">
								<li><a href="#ts-content">Acerca de</a></li>
							</ul>
						</div>
					</div>
				</div><!-- Row end -->

				<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
					<button class="btn btn-primary" title="Back to Top">
						<i class="fa fa-angle-double-up"></i>
					</button>
				</div>

			</div><!-- Container end -->
		</div><!-- Copyright end -->

	</footer><!-- Footer end -->


	<!-- Javascript Files
	================================================== -->



	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="js/jquery.counterup.min.js"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="js/waypoints.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="js/isotope.js"></script>
	<script type="text/javascript" src="js/ini.isotope.js"></script>


	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM&amp;sensor=false"></script>
	<!-- Doc https://developers.google.com/maps/documentation/javascript/get-api-key -->

	<script type="text/javascript" src="js/gmap3.js"></script>

	<script type="text/javascript">

		$(function () {
	       $('#map')
	         .gmap3({
	           address:"3859 Crestwood Circle, Weston, FL 33331 USA",
	           zoom: 14,
	           mapTypeId : google.maps.MapTypeId.ROADMAP,
	           scrollwheel: false
	         })
	         .marker(function (map) {
	           return {
	             position: map.getCenter(),
	             icon: 'http://themewinter.com/html/marker.png'
	           };
	         });
	     });

	</script>

	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>

	<script src="js/form-validator.min.js"></script>
	</div><!-- Body inner end -->
</body>
</html>