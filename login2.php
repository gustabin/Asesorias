<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "header.php";
?> 
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formLogin', function(event) {
		event.preventDefault()
		if ($('#formLogin').valid()) {
			$.ajax({
				type: "POST",
				url: "loginProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						document.getElementById('hard').style.display='block';document.getElementById('fade').style.display='block';						
					}
									
					if (respuesta.exito == 1) {										
						window.location.href='index.php'; 							
					}	
					if (respuesta.exito == 2) {
						window.location.href='editvilla.php?id=<?php echo $_SESSION['villaId']?>';
					}
					if (respuesta.exito == 3) {
						window.location.href='villaAdd.php'; 
					}	
					if (respuesta.exito == 4) {
						window.location.href='amenities.php'; 
					}	
					if (respuesta.exito == 5) {
						window.location.href='room.php?id=<?php echo $_SESSION['villaId']?>';
					}
					if (respuesta.exito == 6) {
						window.location.href='imagesOrder.php?id=<?php echo $_SESSION['villaId']?>';
					}	
					if (respuesta.exito == 7) {
						window.location.href='leads.php';
					}	
					if (respuesta.exito == 8) {
						window.location.href='comment.php';
					}
					if (respuesta.exito == 9) {
						window.location.href='price.php?id=<?php echo $_SESSION['villaId']?>';
					}	
					if (respuesta.exito == 10) {
						window.location.href='customers.php';
					}	
				}
			});
		}
	});	

//Metodo para cargar los datos personales
    $("body").on('submit', '#registrarOperador', function(event) {
		event.preventDefault()
		if ($('#registrarOperador').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
					}					
					if (respuesta.error == 2) {
						document.getElementById('light2').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 3) {
						document.getElementById('light3').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 4) {
						document.getElementById('light4').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 5) {
						document.getElementById('light5').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 6) {
						document.getElementById('light6').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 7) {
						document.getElementById('light7').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 8) {
						document.getElementById('light8').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 9) {
						document.getElementById('light9').style.display='block';document.getElementById('fade').style.display='block';						
					}
					
					//if (respuesta.exito == 1) {					  
					  //window.location.href='enviarEmailRegistro.php?email=<?php echo $_SESSION['email']?>'; 
					//}									
				}
			});
		}
	});		    
	
	 $("body").on('submit', '#formRecuperar', function(event) {
	event.preventDefault()
	if ($('#formRecuperar').valid()) {
	    $.ajax({
		type: "POST",
		url: "recuperarProcesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {		    
			if (respuesta.error == 1) {
						document.getElementById('claveRecuperar').style.display='block';document.getElementById('fade').style.display='block';						
			}
			
			  
			  if (respuesta.exito == 1) {
			  $('#claveRecuperar2').show();
			  setTimeout(function() {
			  $('#claveRecuperar2').hide();
			  window.location.href="loginForm.php";
			}, 3000);			  
		    }		    
		}
	    });
	}
	});	 
</script>

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

    
<!-- .................................... $Contenido .................................... -->
 <!-- .................................... $Contact .................................... -->
 
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
        <div id="loginbox" style="margin-top:100px; margin-left:35%; margin-bottom:auto"  class="mainbox col-md-4 col-md-offset-3 col-sm-8 col-sm-offset-2">     
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #62cb31; color:white;">
                        <div  align="center" style="font-size: 25px; font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif " >Login</div>                        
                    </div>     

              <div style="padding-top:30px" class="panel-body" >
                   <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-vertical" id="formLogin">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input required id="username" type="text" class="form-control" name="username" placeholder="Username"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input required id="password" type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                                <label style="font-size: 90%;">
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                          </div>
                        
                          <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                                <div class="col-sm-12 controls" align="center">
                                  <!--a id="btn-fblogin" href="#" class="btn btn-primary">Iniciar Sesión</a!-->
                                  <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Start</button>
                                </div>
                          </div>
                                                    
                    </form> 
                     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <strong></strong> <span class="textmensaje">Bienvenido!...</span>
                     </div>
                     <div class="modal" id="hard" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#99CA3D; color:black;">   
                                    <h4 class="modal-title" id="myModalLabel">
                                        ¡An error has occured!
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    User or password Wrong
                                </div>
                                <div class="modal-footer">          
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('hard').style.display='none';document.getElementById('fade').style.display='none'"> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                       Close
                                    </button> 
                                        </a>                    
                                </div>
                            </div>                      
                        </div>                  
                     </div>
                     
                    
                    <div style="display:none" id="barra"><img src="images/barra.gif" alt="Cargando..."/><br>Processing....</div>    
             </div>                     
          </div>  
        </div>
    </div>
  </section>



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

</section>

    <!-- .................................... $footer .................................... -->
   
<!-- Vendor scripts -->

<!--script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script!-->
<script src="js/bootstrap.min.js"></script>
 
<!-- App scripts -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM&amp;sensor=false"></script>
<!-- Doc https://developers.google.com/maps/documentation/javascript/get-api-key -->






   
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


<script type="text/javascript" src="js/gmap3.js"></script>
<!-- Local script for menu handle -->
<!-- It can be also directive -->
<script>
    $(document).ready(function () {

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

    });
</script>


    <script type="text/javascript">

        $(function () {
           $('#map')
             .gmap3({
               address:"Corner Swanston St & Flinders St, Melbourne VIC 3000, Australia",
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
    
</body>
</html>