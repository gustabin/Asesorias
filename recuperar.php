<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "header.php";
?>  
<script language="JavaScript" type="text/JavaScript">                          
    //Metodo para cargar el formulario 
    $("body").on('submit', '#formRecuperar', function(event) {
    event.preventDefault()
    if ($('#formRecuperar').valid()) {
        $('#barra').show();
        $.ajax({
        type: "POST",
        url: "recuperarProcesar.php",
        dataType: "json",
        data: $(this).serialize(),
        success: function(respuesta) {
          $('#barra').hide();
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

 <!-- .................................... $Contenido .................................. -->
 <!-- .................................... $Contact .................................... --> 
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
        <div id="loginbox" style="margin-top:100px; margin-left:35%; margin-bottom:auto"  class="mainbox col-md-4 col-md-offset-3 col-sm-8 col-sm-offset-2">     
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #06325E; color:white;">
                        <div  align="center" style="font-size: 25px; font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif " >Recuperar Password</div>                        
                    </div>   
                <div style="padding-top:30px" class="panel-body" >
                   <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-vertical" id="formRecuperar">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                <input required id="Email" type="Email" class="form-control" name="Email" placeholder="Correo"> 
                          </div>
                          
                         
                          <div style="margin-top:10px" class="form-group">                            
                                <div class="col-sm-12 controls" align="center">                                  
                                  <button id="btnProcesar" class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Enviar</button>
                                </div>
                          </div>                                                     
                    </form> 

                    <!-- Button trigger modal -->


<!-- Modal -->
        <div class="modal" id="hard" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="right: 0px; left: 0px;">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#ED8000; color:black;">   
                        <h4 class="modal-title" id="myModalLabel">
                            <strong>Ha ocurrido un error!</strong> 
                        </h4>
                    </div>
                    <div class="modal-body">
                        No tenemos ese correo registrado, por favor intente de nuevo. <br>                               
                    </div>
                    <div class="modal-footer">                                  
                          <a href = "login.php" onclick = "document.getElementById('hard').style.display='none';document.getElementById('fade').style.display='none'">                               
                             <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                          </a>                    
                    </div>
                </div>                      
            </div>                  
         </div>
        <div class="modal" id="easy" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="right: 0px; left: 0px;">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#ED8000; color:black;">   
                        <h4 class="modal-title" id="myModalLabel">
                            ¡Password Enviado!
                        </h4>
                    </div>
                    <div class="modal-body">
                        Hemos enviado su password a su cuenta de correo. <br>                               
                    </div>
                    <div class="modal-footer">                                  
                            <a href = "login.php" onclick = "document.getElementById('easy').style.display='none';document.getElementById('fade').style.display='none'"> 
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> 
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