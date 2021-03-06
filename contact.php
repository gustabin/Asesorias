<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "header.php";
?> 
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#contactForm', function(event) {
		event.preventDefault()
		if ($('#contactForm').valid()) {
			$.ajax({
				type: "POST",
				url: "contactoProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						document.getElementById('hard').style.display='block';document.getElementById('fade').style.display='block';						
					}
                    if (respuesta.error == 2) {
                        document.getElementById('hard2').style.display='block';document.getElementById('fade').style.display='block';                        
                    }
									
					if (respuesta.exito == 1) {										
						 $('#contactFormBox').hide();
                         $('#contactFormExitoso').show(); 
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
                                <a title="Facebook" href="https://www.facebook.com/Kemadvisors-1970904499590458/" target="_blank">
                                    <span class="social-icon"><i class="fa fa-facebook"></i></span>
                                </a>
                                <a title="Twitter" href="https://twitter.com/KemAdvisors" target="_blank">
                                    <span class="social-icon"><i class="fa fa-twitter"></i></span>
                                </a>
                                <a title="Linkdin" href="#" target="_blank">
                                    <span class="social-icon"><i class="fa fa-linkedin"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div><!--/ Top social end -->
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 top-menu ">
                    <ul class="unstyled">
                        <li><a href="index.html">Inicio</a></li>
                    
                        <li><a href="leads.php">Leads</a></li>
                    </ul>
                </div><!--/ Top menu end -->

                </div><!--/ Content row end -->
            </div><!--/ Container end -->
        </div><!--/ Topbar end -->

        <!-- Header start -->
        <header id="header" class="header-light nav-style-boxed">
            <div class="container">
                <div class="row">
                    <div class="logo col-xs-12 col-sm-3">
                        <a href="index.html">
                            <img src="images/logo-jose-gregorio-garcia.png" alt="">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-xs-12 col-sm-8 header-right">
                        <ul class="top-info">
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-map-marker">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <p class="info-box-title">4581 Weston Rd Suite 130</p>
                                        <p class="info-box-subtitle">Weston FL 33331 USA</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-phone">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <p class="info-box-title">+1 954-361-4079</p>
                                        <p class="info-box-subtitle">info@kemadvisors.com</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box"><span class="info-icon"><i class="fa fa-clock-o">&nbsp;</i></span>
                                    <div class="info-box-content">
                                        <p class="info-box-title">Lun-Sab</p>
                                        <p class="info-box-subtitle">(10am-8pm)</p>
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
                                <a href="#contactFormBox">Solicitar Cotización</a>
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

        
        <!-- Contact Section End -->

        
    
<!-- .................................... $Contenido .................................... -->
 <!-- .................................... $Contact .................................... -->


  <section id="contactFormBox" class="section-content section-contact section-color-graylighter">
    <div class="container">
        <div> 
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #06325E; color:white;">
                        <div align="center" style="font-size: 25px; font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif">Formulario de contácto
                        </div>                        
                    </div>    
              <div style="padding-top:30px" class="panel-body" >
                   <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-vertical" id="contactForm">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input required id="fullname" type="text" class="form-control" name="fullName" placeholder="Nombre"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input required id="phone" type="text" class="form-control" name="phone" placeholder="Teléfono"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                <input required id="email" type="email" class="form-control" name="email" placeholder="Correo"> 
                          </div>                              
                          <div style="margin-bottom: 25px" class="form-group"> 
                              <textarea class="form-control" id="message" name="message" minlength="20" placeholder="Su mensaje aqui" rows="11" data-error="Escriba su mensaje" required style="color:black"></textarea>
                              <div class="help-block with-errors"></div>
                          </div>                         
                          <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                                <div class="col-sm-12 controls" align="center">                                  
                                  <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Enviar</button>
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
                                        ¡Ha ocurrido un error!
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    Por favor intente más tarde.
                                </div>
                                <div class="modal-footer">          
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('hard').style.display='none';document.getElementById('fade').style.display='none'"> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                       Cerrar
                                    </button> 
                                        </a>                    
                                </div>
                            </div>                      
                        </div>                  
                     </div>
                     <div class="modal" id="hard2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#99CA3D; color:black;">   
                                    <h4 class="modal-title" id="myModalLabel">
                                        ¡Ha ocurrido un error!
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    Coloque un número de teléfono válido.
                                </div>
                                <div class="modal-footer">          
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('hard2').style.display='none';document.getElementById('fade').style.display='none'"> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                       Cerrar
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

  <section class="section-content section-contact section-color-graylighter" style="padding-bottom: 0px;">  
    <div class="container">
      <div class="modal" id="easy" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#blue; color:black;">   
                    <h4 class="modal-title" id="myModalLabel">
                        Información enviada
                    </h4>
                </div>
                <div class="modal-body">
                    Hemos recibido sus datos, muy pronto uno de nuestros agentes se pondrá en contácto con usted.
                </div>
                <div class="modal-footer">          
                        <a href = "javascript:void(0)" onclick = "document.getElementById('easy').style.display='none';document.getElementById('fade').style.display='none'"> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                       Cerrar
                    </button> 
                        </a>                    
                </div>
            </div>                      
        </div>                  
     </div>
     </div>
  </section>
        
        <section id="contactFormExitoso" style="display: none; padding-bottom: 0px; padding-top: 0px;">          
            <div class="container-fluid" style="background-image:url(images/team/team7.jpg); background-size: cover; background-position: right;">          
                <div class= "halfsearch">
                    <div id="Confirm"><br><br>
                        <br><br>
                        <br><br>                       
                        <font color="black" size="+3">Gracias por enviar tu información<br>
                        Uno de nuestros representantes se pondrá en contácto muy pronto!<br> 
                        Si quieres llamarnos ahora, danos una llamada!<br></font>
                        <font color="black" size="+1">Nuestro horario de oficina es:<br>Lunes a Viernes<br>
                        9am - 6pm  (UTC -4)<br>
                        954 235 3264 ext.3</font>
                        <br><br>
                        <br><br>
                        <br><br>

                    </div>
                </div>
            </div>
        </section>


    <footer id="footer" class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-12 footer-widget footer-about">
                        <h3 class="widget-title">Quienes somos</h3>
                        <p>Somos una empresa asesora de finanzas, encargada de proveer soluciones, información y apoyo a cualquier entidad comercial que necesite un empujón para saltar al éxito económico.</p>
                        <div class="gap-20"></div>
<!--                        <p><a href="#" class="btn btn-primary">Leer más</a></p> -->
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-12 footer-widget">
                        <h3 class="widget-title">Contáctanos</h3>

                        <div class="contact-info-box">
                            <i class="fa fa-map-marker">&nbsp;</i>
                            <div class="contact-info-box-content">
                                <h4>Visítanos</h4>
                                <p>4581 Weston Rd Suite 130 Weston FL 33331 USA</p>
                                
                            </div>
                        </div>

                        <div class="contact-info-box">
                            <i class="fa fa-envelope-o">&nbsp;</i>
                            <div class="contact-info-box-content">
                                <h4>Escríbenos a</h4>
                                <p>info@kemadvisors.com</p>
                            </div>
                        </div>

                        <div class="contact-info-box">
                            <i class="fa fa-phone">&nbsp;</i>
                            <div class="contact-info-box-content">
                                <h4>Llámanos</h4>
                                <p>+1 954 361 4079</p>
                            </div>
                        </div>
                        
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-12 footer-widget">
                        <h3 class="widget-title">Enlaces rápidos</h3>

                        <ul class="list-arrow">
                            <li><a href="#ts-features">Carácteristicas</a></li>
                            <li><a href="#obtener-cotizacion">Cotización</a></li>
                            <li><a href="#ts-service-area">Servicios</a></li>
                            <li><a href="#facts">Estadísticas</a></li>
                            <li><a href="#project-area">Proyectos</a></li>
                            <li><a href="#ts-content">Nosotros</a></li>
                            <li><a href="#news">Artículos</a></li>
                            <li><a href="#partners-area">Clientes</a></li>
                            <li><a href="contact.php">Contáctanos</a></li>
                            <li><a href="contact.php#contactFormBox">Enviar Información</a></li>
                        </ul>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-12 footer-widget">
                        <h3 class="widget-title">Síguenos</h3>
                        <div class="footer-social">
                            <ul>
                                <li><a href="https://www.facebook.com/Kemadvisors-1970904499590458/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.facebook.com/Kemadvisors-1970904499590458/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- Footer social end -->
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
                                <img src="images/footer-logo.png" alt="logo de Asesorias Jose Gregorio Garcia">
                            </div>
                            <span>Copyright © 2018 Kem Advisor. Todos los Derechos Reservados.</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-push-1">
                        <div class="footer-menu" style="margin-right: 150px;">
                            <ul class="nav unstyled">
                                <li><a href="index.html">Acerca de</a></li>
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
               address:"4581 Weston Rd Suite 130 Weston FL 33331 USA",
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