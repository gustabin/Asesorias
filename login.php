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
			$('#barra').show();
			$.ajax({
				type: "POST",
				url: "loginProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					$('#barra').hide();
					if (respuesta.error == 1) {
						document.getElementById('hard').style.display='block';document.getElementById('fade').style.display='block';						
					}									
					if (respuesta.exito == 1) {										
						window.location.href='leads.php'; 							
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
					}														}
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
 <!-- .................................... $Contenido .................................. -->
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
              <a title="Linkedin" href="#">
                <span class="social-icon"><i class="fa fa-linkedin"></i></span>
              </a>
            </li>
          </ul>
        </div><!--/ Top social end -->

        <div class="col-md-6 col-sm-6 col-xs-12 top-menu ">
          <ul class="unstyled">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="contact.php">Contacto</a></li>
            <li><a href="leads.php">Leads</a></li>
          </ul>
        </div><!--/ Top menu end -->

      </div><!--/ Content row end -->
    </div><!--/ Container end -->
  </div><!--/ Topbar end -->
 <!-- .................................... $Contact .................................... --> 
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
        <div id="loginbox" style="margin-top:100px; margin-left:35%; margin-bottom:auto"  class="mainbox col-md-4 col-md-offset-3 col-sm-8 col-sm-offset-2">     
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #06325E; color:white;">
                        <div  align="center" style="font-size: 25px; font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif ">Login</div>                        
                    </div>   
                <div style="padding-top:30px" class="panel-body" >
                   <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-vertical" id="formLogin">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input required id="username" type="text" class="form-control" name="username" placeholder="Usuario"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input required id="password" type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                                <label style="font-size: 90%;">
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Recordarme
                                </label>
                            </div>
                          </div>
                          <div style="float:right; font-size: 80%; position: relative; top:-10px">
                                <a href="recuperar.php" href="" style="color:#06325E">
                                    ¿Recuperar Password?
                                </a>
                          </div>
                          <div style="margin-top:10px" class="form-group">                            
                                <div class="col-sm-12 controls" align="center">                                  
                                  <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Iniciar</button>
                                </div>
                          </div>                                                     
                    </form> 
                     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <strong></strong> <span class="textmensaje">Bienvenido!...</span>
                     </div>
                     <div class="modal" id="hard" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="right: 0px; left: 0px;">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                                    <h4 class="modal-title" id="myModalLabel">
                                        <strong>Ha ocurrido un error!</strong> 
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    Usuario o password incorrecto
                                </div>
                                <div class="modal-footer">			
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('hard').style.display='none';document.getElementById('fade').style.display='none'"> 
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                       Close
                                    </button> 
                                        </a>					
                                </div>
                            </div>						
                        </div>					
                     </div>                                    
             		 <div style="float:left; display:none" id="barra"><img src="images/barra.gif" width="100%" alt="Cargando..."/><br>Procesando...</div>  	
             </div>                     
          </div>  
        </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->  
<!-- Vendor scripts -->
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<!--script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script!-->
<script src="js/bootstrap.min.js"></script> 
<!-- App scripts -->

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
</body>
</html>