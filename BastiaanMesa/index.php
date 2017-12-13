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
        <div class="col s1 m6 l1">
			<label>F. Inicial</label>									
			<input  id='fInicialCriterioInput' type='date'></input>
	   </div>		
		
        <div class="col s1 m6 l1">				
						<label >F. Final</label>				
						<input  id='fFinalCriterioInput' type='date'></input>
		</div>				
        <div class="col s5 m6 l5">
						<label>Estado</label>									
						<input  id='estadoCriterioInput' type='text'></input>
	    </div>
        <div class="col s5 m6 l5">				
						<label>Usuarios Solicitante</label>									
						<input  id='usuarioSolCriterioInput' type='text'></input>
	    </div>			
	<div>


 <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
  

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
			<div id="menuPrincipal"  align="right" class="contieneCriteriosAribaBtn" style="background-color: #6b6b6b;    height: 56px; " > 
				<img class='logoBAS' style='float: left;' id='logoFRM' src='assets/pantalla/logoTipo.png'  />
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
								<div id="filtros " class="contenedorIEC" style="overflow: auto; position: relative; width: 100%; display: block;">
								 <div style="width: 80%; display: block; height: 100%;  padding-top: 10px; padding-left: 34px;">								 	
								   
								   <table WIDHT=150%; id="exito" HEIGHT=15%; CELLPADDING=0; cellspacing="10" style="padding-top: 12px; width: inherit; padding-left: 1%; position:relative;display:inline-block; border: #ff6600 1px solid;">										 							    
								    <tr>
								    <td> 
								  
								   	  	    <label style="position: relative;  left: 3px;">No. de ticket</label>
								   	  	    </td>
								   	  	    <td>
								     		<input class="input" id="idFormularioInput" descripcion="agente" type="text" maxlength="20"  style="width:25%; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>
								        	</td>
								    <td>						    
								    		<label style="position: relative; left: 3px; ">Fecha de solicitud</label>
								   		</td>
								   		<td>		
								   			<input id="fSolicitudFormularioInput" type="date" step="2" style="width:130px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;"disabled/>
								   		</td>
								   		
								   		<td>						    
								    		<label  style="position: relative;  left: 3px;">Hora de solicitud</label>
								   		</td>
								   		
								   		<td>		
								   		<input type="text" id="hInicialFormularioInput" style="width:130px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;" disabled/>
								   		</td>
								   		</tr>
								   		<tr>
								   		<td>
					                         <label style="position: relative; left: 3px;">Via de Solicitud</label>
								   	  	</td>
 								   	    <td>
								     	     <select class="input" id="viaIdFormularioInput" descripcion="vi00000a" type="text" maxlength="20"  style="width:100%; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" />
								        </td>
								   		<td> 
								   	  	    <label style="position: relative; left:54px;">Estatus</label>
								   	  	</td>
								        <td>
								       
								           <select class="input" id="recesoIdFormularioInput" descripcion="RecesoLargo" style="width:180px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;"/>
                                       
								     	</td>
								     	<td> 
								   	  	    <label style="width:500px; position: relative; left: 90%;">Importancia</label>
								   	  	</td>
								        <td>
								       
								           <select class="input" id="importanciaIdFormularioInput" descripcion="RecesoLargo" style="width:180px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 60px; box-shadow: 2px 2px 5px #999;"/>                                      
								     	</td>
								   		</tr>
								   		</table>
								   <table WIDHT=35%; id="exito" HEIGHT=20%; CELLPADDING=0; cellspacing="10" style="top: 12px; padding-left: 1%; position:relative;display:inline-block; border: #ff6600 1px solid;">
								   <tr>		
								   	    <td> 
								   	  	     <label style="position: relative; left: 3px;">Usuario que solicita ticket</label>
								   	    </td>
								   	    <td>						    
								    		 <input   id="ugeneroFormularioTiket" onblur="vista.onBlur();" style="width:330px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;" />
								   	    </td>
								   	    <td> 
								   	  	    <label style="position: relative; left: 3px; ">Correo electronico</label>
								   	  	</td>
								   		<td>
								     	 	     <input class="input" id="correoFormularioInput" descripcion="vi00000a" type="text" style="width:240%; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>								    
								       </td>
								   </tr>   
								    <tr>
								        <td> 
								   	  	    <label style="position: relative; left: 3px;">Proyecto que pertenece</label>
								   	  	</td>
								   	  	 <td>
								    	  <input class="input" id="proyectoFormularioInput" descripcion="agente" type="text"   style="width: 180px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>  								    
								        </td>
								        <td> 
								   	  	    <label style="position: relative; left: 3px;">Telefono</label>
								   	  	</td>
								   	  	<td>
								     	  <input class="input" id="telefonoFormularioInput" descripcion="vi00000a" type="text" style="width:150px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>
								        </td>
								   	  	 <td> 
								   	  	    <label style="position: relative; left: 3px;" >Ext.</label>
								   	  	</td>
								   	  	<td>
								     	     <input class="input" id="extensionFormularioInput" descripcion="vi00000a" type="text" style="width:170px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;"disabled/>
								        </td>
								    </tr>
								    <tr>
								       <td>
								           <label style="position: relative; left: 3px;">Area Solicitante</label>
								        	<img src='css/imagenes/asisFRM.png' onClick="vista.verDatosAsis();" title='Asistente Usuarios' style="left: 3px"> 	
								      </td>
                                       <td>
								     	     <input class="input" id="areaSoliFormularioInput" descripcion="vi00000a" type="text" style="width:150px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;" disabled/>
								        </td>
										<td> 
											<label style="position: relative; left: 3px;">Usuario realizador</label>
										</td>
										<td>
											<select class="input" id="usuarioRealizadorFormularioInput" descripcion="vi00000a" type="text" style="width:150px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;" disabled/>
										</td>
								    </tr>
								    </table>
								   <table WIDHT=100%; id="exito" HEIGHT=50%; CELLPADDING=0; cellspacing="10" style="top: 24px; padding-left: 1%; position:relative;display:inline-block; border: #ff6600 1px solid;">								   
								    <tr>
								      <td>
							        	      <label style="position: relative; left: 3px; ">Asunto</label>
                                        </td>
                                        <td>
                                     	        <input class="input" id="asuntoFormularioInput" descripcion="RecesoLargo" style="width:150px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;"/>
                                     	</td> 
                                     	</tr>
                                     	<tr>
                                        <td> 
											<label style="position: relative; left: 3px;">Copia de correo para</label>
										</td>  
										<td>
											<input class="input" id="copiaCorreoFormularioInput" descripcion="vi00000a" type="text" style="width:400px; font-family:Verdana; font-size:9px;text-align:left; color:#006699;position: relative; left: 3px; box-shadow: 2px 2px 5px #999;"/>
										</td>
										</tr>
										<tr>
								        <td>
							        	      <label style="position: relative; left: 3px; ">Detalle del requerimeinto</label>
                                        </td>
                                        <td>
                                             <textarea textarea name="dscFormularioInput" rows="15" cols="110" class="input" id="dscFormularioInput" descripcion="RecesoLargo" style="text-align:left; color:#006699;position: relative; left: 6px; box-shadow: 2px 2px 5px #999;"/></textarea>
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