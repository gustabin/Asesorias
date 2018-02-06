<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 10; //Activa la opcion del menu actual
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='editLead';  
//=======Redirigir al login  ===================
if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) 
	{ 
	header("Location: login.php");
	}
include "header.php";
$_SESSION['valor'] = 10;  //Activa la opcion del menu actual
?>

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Personas que te han contactado");
	});
	
    //FUNCIÓN ASIGNAR VALOR A ICONOS DEL DETALLE DE LA HISTORIA
    function ValorIconos(id) {
        $('#ErrorBoton').hide();
        $("#editar").attr("onclick", "Modificar(" + id + ");");
        $("#eliminar").attr("onclick", "Eliminar(" + id + ");");
    }
		 
	//FUNCIÓN ERROR BOTON
    function Error() {
        $('#ErrorBoton').show();	 
	}
	
	//FUNCIÓN PARA MODIFICAR
    function Modificar(id) {
		window.location.href='editLead.php?id=' + id;
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='confirmarEliminarLead.php?id=' + id;
		//$eliminarId=id;		
		//document.getElementById('confirmar').style.display='block';document.getElementById('fade').style.display='block';
    }

</script>
            


<script type='text/javascript'>                             // tablesorter
    $(document).ready(function() {
        $("#sTable").tablesorter({
            headers: {
                3: {   
                    sorter: false
                }
            }
        });
    });
</script>
<script type = "text/javascript">                            // tablesorter pagination
$(document).ready(function() {
    $('#sTable').tablesorter().tablesorterPager({container: $("#pager")}); 
}); 
</script>
<script type="text/javascript">

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formBuscar', function(event) {
		event.preventDefault()
		if ($('#formBuscar').valid()) {
			$.ajax({
				type: "POST",
				url: "formBuscarProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='leads.php'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
	    
</script> 


               
<div style="background-color: #041947;" class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-right">
             <a href="logout.php" style="color: #fff;">Logout </a>
      </h3>
    </div>
  </div>
</div>
   
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 75px; padding-bottom: 0px;">
    <div class="container">
 <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Leads
        <small>List</small>
      </h2>
      <ul class="breadcrumb">      
        <li><span id="titulo"></span></li>
        	<form  method="post" name="formBuscar" id="formBuscar">
        		<div class="controls">
          			<input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Client name" />	  
        		
           			<button id="search-btn" type="submit" name="submit" class="btn-main"><i class="fa fa-search" aria-hidden="true"></i>
 Search </button>
      		</form>                    
            	</div>
      </ul>
    </div>
  </section>
 

 
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px;">
    <div class="container">
    	    <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>
        		<tr style="background:#f5f5f5">
                    <td colspan="9" style="text-align: right">
                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Choose the lead for edit or delete
                        </span>
                        <span style="margin-right: 10px">   
                            <i class="fa fa-pencil-square-o" aria-hidden="true" onclick="Error();" id="editar" style="cursor: pointer" title="Modificar"></i>
                        </span>
                        <span style="margin-right: 10px">
                            <i class="fa fa-trash" aria-hidden="true" onclick="Error();" id="eliminar" style="cursor: pointer" title="Eliminar"></i>
                        </span>
                    </td>
                </tr>
                <tr>                    
                    <th width="35%" class="header" style="text-align: center">Lead</th>
					<th width="15%" class="header" style="text-align: center">Phone</th>
                    <th width="20%" class="header" style="text-align: center">Email</th>
                    <th width="20%" class="header" style="text-align: center">Date</th>
                    <th width="10%" class="header" style="text-align: center">Select</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
<?php
		
		//================================================Recuperar registros tabla villa=============================================
		
		if (!empty($_SESSION['nombreVilla'])) 
		{	
			$name = $_SESSION['nombreVilla'];
			$query = ("SELECT * FROM tbl_lead WHERE fullName LIKE '%$name%' ORDER BY fecha DESC");
		}
		else
		{
			$query = ("SELECT * FROM tbl_lead ORDER BY fecha DESC");
		}

		$resultado=mysql_query($query,$dbConn);
        while($data_his=mysql_fetch_array($resultado))
      {
		$Id = $data_his['Id'];
		$name = $data_his['fullName'];
		$phone = $data_his['phone'];
		$email = strtolower($data_his['email']);
		$desde = $data_his['desde'];  
		$hasta = $data_his['hasta'];  
		$destination = $data_his['destination'];  
		$anythingelse = $data_his['anythingelse'];  
		$size = $data_his['size'];  
		$bedrooms = $data_his['bedrooms'];  
		$bathrooms = $data_his['bathrooms'];  
		$amenities = $data_his['amenities'];  
		$photo = $data_his['photo'];  
		$term = $data_his['term'];  
		$fecha = $data_his['fecha'];  
		$villaId = $data_his['villaId']; 
		$tipo = $data_his['tipo']; 		
	    ?>
        		<tr>
            		<td><?php echo $name;?></td>
                    <td><?php echo $phone;?></td>
            		<td><?php echo $email;?></td>
                    <td align="center"><?php echo $fecha;?></td>
                  	<td style="text-align: center">
                      <input type="radio" name="his_cita" id="his_cita" value="<?php echo $Id ?>" onclick="ValorIconos(this.value)">
                  	</td>
                  </tr>
        <?php } // fin del bucle de instrucciones
mysql_free_result($dataDetail); // Liberamos los registros
?>

            </tbody>
          </table>
           <!-- pager -->
    <div id="pager" class="pager">
      <form>
        <input class="pagedisplay" readonly type="text">
        <button type="button" class="btn-main first"><i class="fa fa-fast-backward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main prev"><i class="fa fa-backward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main next"><i class="fa fa-forward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main last"><i class="fa fa-fast-forward" aria-hidden="true"></i></button>

        <select class="styled-select pagesize" style="height:30px; width:auto">
          <option selected="selected" value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="50">50</option>
        </select>
      </form>
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