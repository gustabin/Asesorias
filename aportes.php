<?php 
session_start();
error_reporting(0);
if (($_SESSION['usuario']==NULL) OR (empty($_SESSION['seccional'])) OR (empty($_SESSION['usuario']))) 
{ //=======Redirigir al login===================
  header("Location: login.php"); 
}
//$_SESSION['valor'] = 3; //Activa la opcion del menu actual
	
require_once('tools/mypathdb.php');
include "header.php";

$id = $_GET ['id'];	//viene en el URL	

?>
  <script type="text/javascript" src="<?php echo SERVER ?>js/jquery.powertip.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo SERVER ?>css/jquery.powertip.css" />
  
  <script language="JavaScript" type="text/JavaScript">
    //Metodo para cargar el formulario  
    $("body").on('submit', '#formDefault', function(event) {
	event.preventDefault()
	if ($('#formDefault').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "aportes_Modificar.php?op=<?php echo $_GET ['op']?>",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
			$('#barra').hide();
		    if (respuesta.error == 1) {
			  $('#error1').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			
			if (respuesta.error == 2) {  
			  $('#error2').show();
			setTimeout(function() {
			  $('#error2').hide();
			}, 3000);
		    }

		    if (respuesta.error == 3) {
			  $('#error3').show();
			setTimeout(function() {
			  $('#error3').hide();
			}, 3000);
		    }
			
			if (respuesta.exito == 2) {   
			  $('#mensaje1').show();
			  setTimeout(function() {
			  $('#mensaje1').hide();
			  window.location.href='aportes_crud.php?op=agregar';
			}, 3000);
        	}
        	
    	}
      });
  }
  }); 
</script>

<script type="text/javascript">
    $(function() {
        $('#periodo').datepicker( {
  closeText: 'Cerrar',
  prevText: '<Ant',
  nextText: 'Sig>',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
        });
    });
</script>

<script type="text/javascript">
    $(function() {     
      $('.north-west-alt').powerTip({ placement: 'nw-alt' });      
    });
</script>

<style>
  .form-control {display: inline-block;}
</style> 




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        Listado de aportes
        <small> por frente (Modificar)</small>
      </h1>    
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Aportes</li>
    <li class="active">Modificar</li>
  </ol>
</section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <div class="box-body">              
				<div class="container-fluid" style="padding-top: 60px">  
				  <div class="row">
				    <div class="col-md-1">
				     
				    </div>
				    <div class="col-md-10" align="left">
				      <section class="content">
				      <!-- Default box -->
				      <div>
				        <div class="box-body">
				          <section class="section-content section-contact section-color-graylighter">
				            <div>
				              <div class="row">  
				                <div class="span8">  
				                  <div>
				                  <div class="box box-info">  
				                    <div class="box-header with-border">
				                      <h3 class="box-title"> Datos del trabajador</h3>
				                    </div>
	<?php
	// ========================= Buscar el medico en la tabla aporte_credencial ======================================
	$sql = "SELECT * FROM aporte_credencial WHERE id='$id'";
	//var_dump($sql);
	//exit();
	 	$result = mysql_query($sql, $dbConn);        
      	while($data=mysql_fetch_array($result))
      	{       
      	$seccional= $data['seccional'];            	 	
		$cuit= $data['cuit'];
		$periodo= $data['periodo'];
		$frente= $data['frente']; 
		$cuil= $data['cuil'];
        $nombre= $data['nombre'];
        $origen= $data['origen']; 
        $empresa= $data['empresa']; 
        //formato de fecha                        
        $periodo = date("Y-m", strtotime($periodo));
		} 
	?>   
		<form class="form-horizontal" id="formDefault">
			<div class="box-body"> 
				<div class="control-group-inline">	 
		           <input id="id" name="id" type="hidden" value="<?php echo $id ?>"/>
		           <label for="cuil">CUIL</label>
		           <input name="cuil" type="text" class="north-west-alt form-control span4 required number redondeado" id="cuil" maxlength="11" value="<?php echo $cuil ?>" placeholder="CUIL" style="width: 120px;" title="CUIL" onfocus="BorrarNombre()" >				   
				</div>	
				<div class="control-group-inline" style="padding-top: 20px">
					<label for="nombre">Nombre</label>	 		          
				   <input name="nombre" type="text" class="north-west-alt form-control required redondeado" id="nombre"  maxlength="40" placeholder="Nombre" style="width: 300px;" value="<?php echo $nombre ?>" title="Nombre">
				</div>	
				<div class="control-group-inline" style="padding-top: 20px">	 
					<div class="box-header">
						<h3 class="box-title" style="margin-left: -10px;">Empresa</h3>
		            </div>  
		            <label for="empresa">Razón Social</label>
		            <input id="empresa" name="empresa" type="text" class="north-west-alt form-control span4 redondeado"  maxlength="60" value="<?php echo $empresa ?>" placeholder="empresa" style="width: 300px;" title="empresa">      	      
				</div>	
				<div class="control-group-inline" style="padding-top: 20px">	
					<label for="cuit">CUIT</label> 
					<input name="cuit" type="text" class="north-west-alt form-control span4 required number redondeado" id="cuit" maxlength="11" value="<?php echo $cuit ?>" placeholder="CUIT" style="width: 120px;" title="CUIT">
				    <label for="seccional">Seccional</label>
				    <input id="seccional "name="seccional" type="text" class="north-west-alt form-control span4 required number redondeado" style="width: 200px;" value="<?php echo $seccional ?>" disabled />
				</div>	
				<div class="control-group-inline" style="padding-top: 20px">	
<select id="frente" name="frente" style="width: 200px" class="form-control redondeado required">
                               <?php
                               if ($frente == "Sindical")
                                    {   
                                        echo "<option value=''>Seleccione:</option>";
                                        echo "<option value='Sindical' selected>Sindical</option>  ";
                                        echo "<option value='No Sindical'>No Sindical</option>  ";
                                        echo "<option value='Seguro'>Seguro</option>  ";
                                    }     
                               if ($frente == "No Sindical")
                                    {   
                                        echo "<option value=''>Seleccione:</option>";
                                        echo "<option value='Sindical'>Sindical</option>  ";
                                        echo "<option value='No Sindical' selected>No Sindical</option>  ";
                                        echo "<option value='Seguro'>Seguro</option>  ";
                                    }
                               if ($frente == "Seguro")
                                    {   
                                        echo "<option value=''>Seleccione:</option>";
                                        echo "<option value='Sindical'>Sindical</option>  ";
                                        echo "<option value='No Sindical'>No Sindical</option>  ";
                                        echo "<option value='Seguro' selected>Seguro</option>  ";
                                    }
                                if ($frente == "")
                                      {   echo "<option value=''>Seleccione:</option>";
                                          echo "<option value='Sindical'>Sindical</option>  ";
                                          echo "<option value='No Sindical'>No Sindical</option>  ";
                                          echo "<option value='Seguro'>Seguro</option>  ";
                                      }  
                                 ?>  
                              </select>
				              
				
					<input name="periodo" type="text" class="north-west-alt form-control span4 required redondeado" id="periodo" value="<?php echo $periodo ?>" style="width: 30%;" title="Periodo" placeholder="Período">
<select id="origen" name="origen" style="width: 200px" class="form-control redondeado required">
                                <?php
                                 if ($origen == "Boletas")
                                      {   
                                          echo "<option value=''>Seleccione:</option>";
                                          echo "<option value='Boletas' selected>Boletas</option> ";
                                          echo "<option value='Voluntarios'>Voluntarios</option>";
                                          echo "<option value='Extra UOM'>Extra UOM</option>";
                                      }     
                                 if ($origen == "Voluntarios")
                                      {   
                                          echo "<option value=''>Seleccione:</option>";
                                          echo "<option value='Boletas'>Boletas</option> ";
                                          echo "<option value='Voluntarios' selected>Voluntarios</option>";
                                          echo "<option value='Extra UOM'>Extra UOM</option>";
                                      }
                                 if ($origen == "Extra UOM")
                                      {   
                                          echo "<option value=''>Seleccione:</option>";
                                          echo "<option value='Boletas'>Boletas</option> ";
                                          echo "<option value='Voluntarios'>Voluntarios</option>";
                                          echo "<option value='Extra UOM' selected>Extra UOM</option>";
                                      }
                                if ($origen == "")
                                      {   
                                          echo "<option value=''>Seleccione:</option>";
                                          echo "<option value='Boletas'>Boletas</option> ";
                                          echo "<option value='Voluntarios'>Voluntarios</option>";
                                          echo "<option value='Extra UOM'>Extra UOM</option>";
                                      }  
                                 ?>  
                              </select>  
			   
		            
					
				</div>
				
           		<!--    Mensaje de error y exito	 -->	
				<div style="float:left; display:none" id="barra">
				  	<img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."/><br>Ingresando....
				</div>		      
			    <div class="alert alert-success mensaje_form" style="display: none" id="mensaje3">
					<button data-dismiss="alert" class="close" type="button">x</button>
					<strong></strong> <span class="textmensaje">Registro Eliminado Satisfactoriamente!</span>
				</div>	    
				<div class="alert alert-danger mensaje_form" style="display: none; margin-top: 20px;" id="error4">
					<button data-dismiss="alert" class="close" type="button">x</button>
					<strong></strong> <span class="textmensaje">No hay conexión con la base de datos</span>
				</div>	      
			</div>		 
            <!-- /.box-body -->
            <style type="text/css">
            	.box-footer::after {
    			content: none;    			
				}
            </style>
            <div class="box-footer" style="padding-top: 30px; margin-bottom: 10px">
				<div>	 	
				  	<a href="<?php echo SERVER ?>aportes_crud.php?op=agregar" title="Ir la página anterior">
					<button type="button" class="btn btn-default redondeado pull-left"> Cancelar </button></a>
                	<button type="submit" class="btn btn-info redondeado pull-right" title="Guardar los datos"> Guardar </button>
				</div>      
            </div>     
            <!-- /.box-body -->       
            <div class="box-footer">          
            </div>    
        </form>
        </div>                   
        </div>   
        </div>      
        </div>
        </div>
			        <!--    Mensaje de error y exito  -->  
				  	<div style="float:left; display:none" id="barra">
				  		<img src="<?php echo SERVER ?>img/barra.gif" alt="Cargando..."/><br>Ingresando....
				  	</div>		  
			      
				  	<div class="alert alert-danger mensaje_form" style="display: none; margin-top: 20px;" id="error3">
						<button data-dismiss="alert" class="close" type="button">x</button>
						<strong></strong> 
						<span class="textmensaje">No hay conexión con la base de datos/span>
				  	</div>		  
				   
				  	
				  	<div class="alert alert-info mensaje_form" style="display: none; margin-top: 20px;" id="mensaje2">
						<button data-dismiss="alert" class="close" type="button">x</button>
						<strong></strong> 
						<span class="textmensaje">Los datos se actualizaron correctamente!...</span>
				   	</div>  
			  	</section>
        	</div>        
      	</div>     
	    </section> 
	    </div>
	    <div class="col-md-1">

	    </div>
	  </div>
	</div>                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "footer.php";
?>