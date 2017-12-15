<?php
include 'php/clases/Utilidades.php';

$modulo = REQUEST('CNMDLSID');
$opcionTerminal = REQUEST('CNOTRMID');
$version = REQUEST('CNOTRMVER');

$usuario = REQUEST('CNUSERID');
$nomTrabajador = REQUEST('CNUSERDESC');
$usuarioDsc = REQUEST('CNUSERDESC');
$CNUSERDESC = REQUEST('CNUSERDESC');

?>
<!DOCTYPE html>

<title>Catalogo de usuarios</title>
<head>	

    <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!-- ==============================basttiaan===========================================-->

<!-- <script language="JavaScript" type="text/javascript" src="js/librerias/jquery-1.6.2.min.js"></script> -->
	<script language="JavaScript" type="text/javascript" src="js/librerias/jquery-ui-1.8.16.custom.min.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/json2.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/AjaxContextHandler.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Ajaxv2.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/prototype.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funcionesFechas.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funciones.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/funcionesColores.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/constantes.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Eventos.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/librerias/Base.js"></script> 

	<script language="JavaScript" type="text/JavaScript" src="js/librerias/cargador.js"></script>
<!-- 	<script language="JavaScript" type="text/JavaScript" src="js/librerias/jquery.min.js"></script> -->
	
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/GridReg.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/Combo.js"></script>

<!-- ================================MATERIALIZE=========================================-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
      <!-- ================================bastiaan=========================================-->
 <script language="JavaScript" type="text/JavaScript" src="js/repositorios/tickets_repositorio.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/presentadores/tickets_presentador.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/vistas/tickets_vista.js"></script>

<!-- ==============================================================================-->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!-- =========================================================================================-->
    <script language="JavaScript" type="text/JavaScript" src="js/repositorios/tickets_repositorio.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="js/presentadores/tickets_presentador.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/vistas/tickets_vista.js"></script>
<!-- =========================================================================================-->

</head>

<body  onLoad="vista.onLoad()"  style="padding-left:3%; padding-right:3%">
   <div class="card-panel white z-depth-4">
   <!-- -Uno div -->
      

<!-- -====================== -->
<div>
    <form id="form">
    <!-- uno sobra -->
	       <div id="principalDiv">
	       
	        <header>
             <nav>
                  <div class="nav-wrapper  grey darken-2 accent-3 z-depth-4">
                       <a href="#!" class="brand-logo">Logo</a>
                       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                             <ul class="right hide-on-med-and-down">
                        
                                <li><a  onClick="vista.btnAlta_onClick();"><i class="material-icons right">assignment</i></a></li>
                                <li><a  onClick="vista.btnConsulta_onClick();"><i class="material-icons right">search</i></a></li>
                                <li><a  onClick="vista.btnCambio_onClick();"><i class="material-icons right">mode_edit</i></a></li>
                                
                              
                                  
                                <!-- 
                                     <i class="material-icons left"> <a href="#"  onClick="vista.btnAlta_onClick();" class="btn-floating   btn-large orange  darken-4">alta</a> 
	                                 <a href="#"  onClick="vista.btnConsulta_onClick();" class="btn-floating btn-large blue  darken-4">Buscar</a>lock_open</i>Registro</a>
	                             -->
	                             </ul>
	                             <!-- -telefono -->
	                             <ul class="side-nav" id="mobile-demo">
	                                <li><a  onClick="vista.btnAlta_onClick();"><i class="material-icons left">assignment</i>Alta</a></li>
                                    <li><a  onClick="vista.btnConsulta_onClick();" style="display: flex;"><i class="material-icons left">search</i>Consulta</a></li>
                                    <li><a  onClick="vista.btnCambio_onClick();" style="display: flex;"><i class="material-icons right">mode_edit</i>Cambio</a></li>

                                </ul>
	                             <!-- -telefono -->
	                             
                            
                  </div>
            </nav>
     </header>
	       
	       
<!-- -=========criterios Seleccion=========== -->
             
                   <div class="row" id="criteriosSelecion">	
          
                                 <div class="col s3">
		                	            <label>Fecha de solicitud</label>									
		                              	<input  id='fInicialCriterioInput' class="datepicker" type='date'></input>
	                             </div>		
                                <div class="col s3">				
					                     <label>Usuario Solicitante</label>									
						                 <input  id='usuarioSolCriterioInput' type='text'></input>
	                            </div>			
                                <div class="col s3">
					    	            <label>Estatus</label>									
						                <input  id='estadoCriterioInput' type='text'></input>
	                            </div>	
	             </div>   	
	   
	   
	  
	       
	                 <div id="cargador" style="position:absolute;"></div> <!-- cierra aqui -->
			                     <div id="Pcontenido" style="position:relative;">            
				                       <div id="tabs" class="PcontenComp" style="display:block;">
				                            <div id="grid"></div>
				                       </div>								
			                     </div>	
         </div>  
     
    
<!--  ================================================================================================================================== -->
      <div id="formularioDiv" style="display:none ;height: 90%;">
<!-- -=====1 sobra================= -->
	            <div class="card-panel orange lighten-1 z-depth-3">
	                    
	          		     <a href="#" onclick='vista.btnGuardarFormulario_onClick();' id='btnGuardarFormulario' class="btn-floating   btn-large   blue">Save</a>      
                         <a href="#" onClick="vista.btnSalirFormulario_onClick();" id='btnSalirFormulario' class="btn-floating   btn-large    red  darken-4">X</a>      
                
		       	</div>
		       	

<!--barra principal -->
			<div id="cargador" class="cargadorFRM2"></div> <!-- cierra aqui -->
				<div class="pContenido" id="estadoEstructura" >
						<div class="contenidoNormalUS">
					 		<div class="explicacionFRM" >
								<div id="filtros " class="contenedorIEC">
								 <div>								 	
								   
								      <table>	
								          <div class="row"> 
								      
								                  <div class="col s4">  
								   	  	              <a>No. de ticket</a>
								   	  	              <input class="input" id="idFormularioInput" descripcion="agente" type="text"/ disabled>
								                  </div> 
								                  <div class="col s4"> 	
								                       <a>Fecha de solicitud</a>		
								   		            	<input id="fSolicitudFormularioInput" type="date" step="2" disabled/>
								   	              </div>
								   	              <div class="col s4">
								   	 		            <a>Hora de solicitud</a>
								   	            	     <input type="text" id="hInicialFormularioInput" disabled/>
								   	              </div>
							                </div>
								   </table>
								    <table>	
								          <div class="row"> 
								      
								                  <div class="col s4">  
								   	  	              <a>Via de solicitud</a>
								   	  	              <select class="browser-default" id="viaIdFormularioInput">
								   	  	              </select>
								                  </div> 
								                  <div class="col s4"> 	
								                       <a>Estatus</a>		
								   		            	<select class="browser-default" id="recesoIdFormularioInput">
								   		            	</select>
								   	              </div>
								   	              <div class="col s4">
								   	 		            <a>Nivel de importancia</a>
								   	            	     <select class="browser-default" id="importanciaIdFormularioInput">
								   	            	     </select>
								   	              </div>
							                </div>
								   </table>
	<!--===========================================================================  -->
								   
					 <div class="row">
								      <div class="col s4">
								     	          <a>Usuario que solicita ticket</a>
								     	          <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsistente();" title='Asistente Usuarios'> 
								       	          <input class="input" id="ugeneroFormularioTiket" descripcion="vi00000a" type="text"  disabled/>
								             </div>
								             <div class="col s8">
								                   <a>Nombre</a>
								     	           <input class="input" id="agenteIdFormularioInput" descripcion="vi00000a" type="text" disabled/>
								        	 </div>
								        	 <div class="col s12">
                                                   <a>Correo electronico</a>
								   	  	          <input class="input" id="correoFormularioInput" descripcion="vi00000a" type="text"  disabled/>
								   	  	          </div>
								             <div class="col s6">
								     	          <a>Telefono</a>
								       	          <input class="input" id="telefonoFormularioInput" descripcion="vi00000a" type="text"  disabled/>
								             </div>
								             <div class="col s6">
								                   <a>Ext.</a>
								     	           <input class="input" id="extensionFormularioInput" descripcion="vi00000a" type="text" disabled/>
								        	 </div>				    
				      </div>		
						<!-- ====================================== -->	           
								     <div class="row">
								           <div class="col s4">     
								   	  	      <a>Proyecto que pertenece</a>
								   	  	      <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsisProyecto();" title='Asistente Usuarios'> 	
								              <input class="input" id="proyectoFormularioInput" descripcion="agente" type="text"  disabled/>  								    
							               </div>  
					       
							              <div class="col s4">
							  	                <a>Area Solicitante</a>
								        	    <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsis();" title='Asistente Usuarios'> 	
								     	        <input class="input" id="areaSoliFormularioInput" descripcion="vi00000a" type="text"  disabled/>
							              </div>
							              
							               <div class="col s4">
							                    <a>Usuario realizador</a>
							                    <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsistenteR();" title='Asistente Usuarios'>
										        <select class="input" id="usuarioRealizadorFormularioInput" descripcion="vi00000a" type="text"  disabled/>
					        	          </div>
							              
						              </div>
						
						
						   <div class="row"><!-- 
						   ======================================--> 
							      <div class="card-panel  orange lighten-5 z-depth-4">	
						
						              <div class="col s12">	    
							                 <a></a>
							    	         <input class="input" id="ODIO EL PUTO FRAMEWORK" descripcion="vi00000a" type="text"/>
						   	           </div>
                                       </div>
                                       <div class="row">
						               <div class="col s12">	
						   	                  <a>Asunto</a>
                                             <input class="input" id="asuntoFormularioInput" descripcion="RecesoLargo">
                                       </div>
                                       <div class="col s12">	
						   	                  <a>Copia de correo para</a>
                                             <input class="input" id="copiaCorreoFormularioInput" descripcion="RecesoLargo">
                                       </div>
		                               <div class="col s12">	 
								             <a>Detalle del requerimiento</a>
                                              <textarea name="dscFormularioInput" id="dscFormularioInput"/></textarea>
            					      </div> 
            					 </div>   
            		           </div>
            		          			         
            			<!-- ====================================== -->
								     	
							   </div>
					    </div>
				   </div>				  	
		    </div>
     </div>
</div>

		<div class='ventana' id='PromptArea' style='display: none;'></div>
		<div class='ventana' id='PromptProyecto' style='display: none;'></div>
		<div class='ventana' id='PromptUsuario' style='display: none;'></div>
		<div class='ventana' id='PromptUsuarioR' style='display: none;'></div>
		<div class='ventana' id='_promptRelacionReporte' style='display: none;'></div>
		<div class='ventana' id='PromptCalendario' style='display: none; z-index:9001;'></div>  
		<div class='ventana' id='promptListaRelaciones' style='display: none;'></div>
		<div class='ventana' id='PromptPlantilla' style='display: none; z-index:9001;'></div>
		<div class='ventana' id='PromptCorreo' style='display: none;'></div>
		<div class='ventana' id='PromptSentencia' style='display:none; z-index:9001;'></div>
		<div class='ventana' id='PromptCriterioSeleccion' style='display:none; z-index:9001;'></div>    
       </div>
   </form>

  </div>
</div>
<script>
$( document ).ready(function(){
    $(".button-collapse").sideNav();
    });

</script>
</body>
</html>