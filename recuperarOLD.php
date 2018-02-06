<?php 
session_start();
error_reporting(1);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "header.php";
?>
<script language="JavaScript" type="text/JavaScript">                        
    //Metodo para cargar el formulario 
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
        document.getElementById('hard').style.display='block';document.getElementById('fade').style.display='block';  
        }
        if (respuesta.exito == 1) {           
        document.getElementById('easy').style.display='block';document.getElementById('fade').style.display='block';                   
      }       
    }
      });
  }
  });
  function Salir() {
    window.location.href="login.php";
  }    
</script>
  <!-- .................................... $breadcrumb .................................... -->

  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 0px;">
    <div class="container">
 <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title" style="padding-top: 10px;">
        Retrieve
        <small>Password</small>
      </h2>

    </div>
  </section>
  
    <!-- .................................... $Contenido .................................... -->
    <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px; background:#f5f5f5">
    <div class="container">
      <div class="row" style="padding-top: 10px;">
        <div id="contenido">  
        	<div class="col-md-2">
              &nbsp;         
        	</div>
       		<div class="col-md-4">
              <h5>We care about you</h5>
              <address>            
				Your information is always safe with us, just complete the following field and immediately retrieve your password              </address>          
        	</div>
            <div class="col-md-4">
              <h5>Please complete the following information</h5>
              <form class="form-vertical" id="formRecuperar">
                <div class="control-group">
                  <input class="span4 required email" id="Email" name="Email" placeholder="Email" type="text" size="30">              
                </div>			
                
                <div class="control-group">         
                <button class="btn btn-danger" type="submit">Send</button>
    
                <button class="btn btn-default" type="button" onclick="Salir()">Cancel</button>
                </div>
              </form>		     
                 <div class="alert alert-danger mensaje_form" style="display: none" id="error">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <strong>ALERT!</strong> <span class="textmensaje">We do not have that email registered</span>
                 </div>
                 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <strong>ALERT!</strong> <span class="textmensaje">
    We send your password to your Email account</span>
                 </div>
            </div>  
            <div class="col-md-2">
              &nbsp;         
        	</div>      
      </div>
    </div>
    </div>
  </section>
   <!-- .................................... $footer .................................... -->
<footer class="smoke-bg">
    <div class="container-fluid">
        <div class="row text-center">
            <!-- Social networks -->
            <div class="navbar-text pull-left">                    
                <a href="https://www.facebook.com/Luxuryrentals1"><i class="fa fa-facebook-square fa-2x" style="padding-left: 30px;"></i></a>
                <a href="https://www.youtube.com/channel/UC0rWZaCtHNMYqrVLFiaFZBw"><i class="fa fa-youtube fa-2x"></i></a>
                <a href="https://plus.google.com/115170508852534381243"><i class="fa fa-google-plus fa-2x"></i></a>
            </div>		
            <!-- Footer menu -->						
            <div class="col-sm-8 text-center navbar-text pull-center align="center"">    
                <a href="http://www.luxuryrentalsinternational.com/beta/index.php" style="padding-right: 10px;">Home</a>
                <a href="http://www.luxuryrentalsinternational.com/beta/favorites.php" style="padding-right: 10px;">Favorites</a>
                <a href="http://www.luxuryrentalsinternational.com/beta/vacation.php" style="padding-right: 10px;">Vacation Rentals</a>
                <a href="http://www.luxuryrentalsinternational.com/beta/homeowners.php" style="padding-right: 10px;">Homeowners</a>
                <a href="http://www.luxuryrentalsinternational.com/beta/about.php" style="padding-right: 10px;">About</a>	
                <br>
              <!-- Copyright -->		
                <font color="#FFFFFF" size="-1" style="font-size:0.7em">Copyright 2016 © LUXURY RENTALS INTERNATIONAL</font>
            </div>  
       </div>
    </div>
</footer>
<!-- Vendor scripts -->
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<!--script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script!-->
<script src="js/bootstrap.min.js"></script> 
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