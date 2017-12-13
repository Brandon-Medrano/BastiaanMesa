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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!-- ==============================basttiaan===========================================-->

<script language="JavaScript" type="text/javascript" src="js/librerias/jquery-1.6.2.min.js"></script>
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
 	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.core.js'></script>
	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.datepicker.js'></script>
	<script language="JavaScript" type="text/JavaScript" src='js/librerias/Datapickerjs/ui.datepicker-es.js'></script> 
	
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/GridReg.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/componentes/Combo.js"></script>


<!-- ================================bastiaan=========================================-->

 <script language="JavaScript" type="text/JavaScript" src="js/repositorios/tickets_repositorio.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/presentadores/tickets_presentador.js"></script>
 <script language="JavaScript" type="text/JavaScript" src="js/vistas/tickets_vista.js"></script>



<!-- ==============================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- =========================================================================================-->
   
   
    <script language="JavaScript" type="text/JavaScript" src="js/repositorios/tickets_repositorio.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="js/presentadores/tickets_presentador.js"></script>
	<script language="JavaScript" type="text/JavaScript" src="js/vistas/tickets_vista.js"></script>

</head>

<body  onLoad="vista.onLoad()">
<div id="dialogo" title="Di�logo" style="display:none;">
</div>

     <header>
             <nav>
                  <div class="nav-wrapper  grey darken-2 accent-3 z-depth-4">
                       <a href="#!" class="brand-logo">Logo</a>
                       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                          <ul class="right hide-on-med-and-down">
                             <li><a href="logeo.php"><i class="material-icons left">lock_open</i>Registro</a></li>
                         </ul>
                  </div>
            </nav>
     </header>
  <div>
   
                                          
  <div class="card-panel white z-depth-4">	
      
    <div class="card-panel White z-depth-4">
          <div class="row">	
          
                     <div class="col s12">
      
	                   <a href="#"  onClick="vista.btnAlta_onClick();" class="btn-floating   btn-large orange  darken-4">alta</a> 
	                   <a href="#"  onClick="vista.btnConsulta_onClick();" class="btn-floating btn-large blue  darken-4">Buscar</a> 
                    </div>	
                    <div class="col s3">
		                	<label>F. Inicial</label>									
		                	<input  id='fInicialCriterioInput' class="datepicker" type='date'></input>
	                </div>		
                    <div class="col s3">				
					       <label >F. Final</label>				
					   	   <input  id='fFinalCriterioInput' class="datepicker" type='date'></input>
	             	</div>				
                    <div class="col s3">
					    	<label>Estatus</label>									
						    <input  id='estadoCriterioInput' type='text'></input>
	                 </div>
                     <div class="col s3">				
					      	<label>Usuarios Solicitante</label>									
						    <input  id='usuarioSolCriterioInput' type='text'></input>
	                 </div>		
	             </div>   	
	         <div>
	     <div>
	</div>
<!-- -====================== -->
<div>
<form id="form">
	<div id="principalDiv">
  
		  
	       <div id="cargador" style="position:absolute;"></div>
		
			     <div id="Pcontenido" style="position:relative;">            
				           <div id="tabs" class="PcontenComp" style="display:block;"></div>
                                   <div id="grid"></div>
				           </div>								
			</div>	
    </div>  
    
    
<!--  ================================================================================================================================== -->
<div id="formularioDiv" style="display:none ;height: 90%;">
		<div>
			
<!--  barra de men� para botones de la pantalla
 -->
				<span id="txtTitulo" style="float:left;margin-top: 20px;margin-left: 15px;color: #FFFFFF;float: left;font-family: Verdana;font-size: 11px;font-weight: bold;">movimientos de personal</span>
				<img style="padding: 2px;" class='imgTipoBoton' id='btnGuardarFormulario' src='assets/botones/imgGuardar.png' onclick='vista.btnGuardarFormulario_onClick();' title='Guardar' />
				<img style="padding: 2px;" class='imgTipoBoton' id='btnSalirFormulario' src='assets/botones/btnSalir.png' onClick="vista.btnSalirFormulario_onClick();" title='Salir'  />
			</div>
<!--
  barra de men�...fin
 -->
 
<!--barra principal -->
			<div id="cargador" class="cargadorFRM2"></div>
				<div class="pContenido" id="estadoEstructura" >
						<div class="contenidoNormalUS">
					 		<div class="explicacionFRM" >
								<div id="filtros " class="contenedorIEC">
								 <div>								 	
								   
								   <table>	
								  
								      <div class="card-panel white z-depth-4">         
								           <div class="row"> 
								      
								               <div class="col s4">  
								   	  	           <a>No. de ticket</a>
								   	  	            <input class="input" id="idFormularioInput" descripcion="agente" type="text"/>
								              </div> 
								              <div class="col s4"> 	
								                   <a>Fecha de solicitud</a>		
								   		        	<input id="fSolicitudFormularioInput" type="date" step="2" disabled/>
								   	          </div>
								   	          <div class="col s4">
								   	 		       <a>Hora de solicitud</a>
								   	            	<input type="text" id="hInicialFormularioInput" disabled/>
								   	         </div>	
								   	
								   
							  	            <div class="col s4">  
					                               <a>Via de Solicitud</a>
								     	              <select class="input" id="viaIdFormularioInput" type="text"/>
								                 </div>
								                 <div class="col s4">  
								   	        	    <a>Estatus</a>
								                       <select id="recesoIdFormularioInput" descripcion="RecesoLargo"/>
								                 </div> 
								                 <div class="col s4">      
								   	            	    <a>Importancia</a>
								                           <select id="importanciaIdFormularioInput" descripcion="RecesoLargo"/>
								                 </div>      
								   </tr>
								  
								  
								   		</table>
								   <!-- <table id="exito"> -->
					 <div class="row">
					      <div class="col s6">
								   <div class="card-panel white z-depth-4">         
								        <div class="row">
								            <div class="col s6">
								   	  	        <a>Usuario que solicita ticket</a>
                                                 <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsistente();" title='Asistente Usuarios'> 	
								            </div>	
                                             <tr>  
                                                <input class="input" id="ugeneroFormularioTiket" disabled/>
                                                <a>Nombre</a>
                                                <input class="input" id="agenteIdFormularioInput" descripcion="agenteId" disabled/>
                                                 <a>Telefono</a>
								       	        <input class="input" id="telefonoFormularioInput" descripcion="vi00000a" type="text"  disabled/>
								                 <a>Ext.</a>
								     	         <input class="input" id="extensionFormularioInput" descripcion="vi00000a" type="text" disabled/>
								     	      </tr>   
								              
								        	</div>
								       </div>
								    </div>    
					   </div>			    	
								    
				  </div>				    
								    
                   								   
						 <tr>
								    
								<div class="card-panel white z-depth-4">         
								     <div class="row">
								            <div class="col s4"> 
								   	  	         <a>Proyecto que pertenece</a>
								    	         <input class="input" id="proyectoFormularioInput" descripcion="agente" type="text"   disabled/> 
								    	     </div>  								    
								         </div>     
								  </div> 
							
					    </tr>
				         <tr>
							
								<div class="card-panel white z-depth-4">         
							    	     <div class="row">
							                <div clas="col s6">
							  	              <a>Area Solicitante</a>
								        	  <img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsis();" title='Asistente Usuarios' style="left: 3px"> 	
								     	      <input class="input" id="areaSoliFormularioInput" descripcion="vi00000a" type="text"  disabled/>
							                </div>
							
								     		<a>Usuario realizador</a>
									
											<select class="input" id="usuarioRealizadorFormularioInput" descripcion="vi00000a" type="text"  disabled/>
								</div>			
						</tr>
								    </table>
							
							
								     <tr>
							            	    <a>Asunto</a>
                                     	        <input class="input" id="asuntoFormularioInput" descripcion="RecesoLargo">
                              					<a>Copia de correo para</a>
										     	<input class="input" id="copiaCorreoFormularioInput" descripcion="vi00000a" type="text"/>
								                 
								                <a>Correo electronico</a>
								   	  	         <input class="input" id="correoFormularioInput" descripcion="vi00000a" type="text" style="width:240%; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>								    
								      
								    
								    
								        <td>
							        	      <a>Detalle del requerimiento</a>
                                             <textarea name="dscFormularioInput" rows="15" cols="110" class="input" id="dscFormularioInput" descripcion="RecesoLargo"/></textarea>
                                       </td>
								    </tr>
								   	</table>	     	
									</div>
									
								 </div>
								</div>				  	
							</div>
						</div>
				</div>
		</div>
</div>		
		<div class='ventana' id='PromptArea' style='display: none;'></div>
		
		<div class='ventana' id='PromptUsuario' style='display: none;'></div>
		<div class='ventana' id='_promptRelacionReporte' style='display: none;'></div>
		<div class='ventana' id='PromptCalendario' style='display: none; z-index:9001;'></div>  
		<div class='ventana' id='promptListaRelaciones' style='display: none;'></div>
		<div class='ventana' id='PromptPlantilla' style='display: none; z-index:9001;'></div>
		<div class='ventana' id='PromptCorreo' style='display: none;'></div>
		<div class='ventana' id='PromptSentencia' style='display:none; z-index:9001;'></div>
		<div class='ventana' id='PromptCriterioSeleccion' style='display:none; z-index:9001;'></div>    
 </div>
</div>
</form>
</body>
</html>