class TicketsVista
{		
	constructor(ventana)
	{	
		this.ventana = ventana;
		this.presentador = new TicketsPresentador(this);
		this.manejadorEventos = new ManejadorEventos();
		this.grid = new GridReg("grid");	
	}
	onLoad()
	{			
		this.crearColumnasGrid();
		this.presentador.consultar();
	}
	
	crearColumnasGrid()
	{
		this.grid._columnas = [
			{longitud:130, 	titulo:"Actividad",   	alias:"actividad", alineacion:"I" }, 
			{longitud:150, 	titulo:"Usuario que solicita",   alias:"usuarioSol", alineacion:"I" }, 
			{longitud:150, 	titulo:"Fecha de solicitud",   alias:"fInicial", alineacion:"I" }, 
			{longitud:150, 	titulo:"Fecha de termino solicitada",   alias:"fFinal", alineacion:"I" },	
			{longitud:150, 	titulo:"Estado",   alias:"estado", alineacion:"I" },

		]
		
		this.grid._origen="vista";
		this.grid.manejadorEventos=this.manejadorEventos;
		this.grid._ajustarAltura = true;
		this.grid._colorRenglon1 = "#FFFFFF";	
		this.grid._colorRenglon2 = "#FFFFFF";
		this.grid._colorEncabezado1 = "#FF6600";
		this.grid._colorEncabezado2 = "#FF6600";
		this.grid._colorLetraEncabezado = "#ffffff";
		this.grid._colorLetraCuerpo = "#000000";
		this.grid._regExtra=20;
		this.grid.render();		
	}
	
	/*
	 * Eventos en botones
	*/
	
	btnAlta_onClick()
	{
		this.modo = "ALTA";
		this.limpiarFormulario();	
		this.mostrarFormulario();
	}
	
	btnBaja_onClick()
	{ 
		if(this.grid._selectedItem!=null)
		{
			var confirmacion = confirm("¿Esta seguro que desea eliminar el registro?")
		    if (confirmacion)
		    {
		    	this.presentador.eliminar();
		    }	
		}
		else
			this.mostrarMensaje("Selecciona un registro para eliminar.");
	}
	
	btnCambio_onClick()
	{
		if(this.grid._selectedItem!=null)
		{			
			this.modo = "CAMBIO";
			this.mostrarFormulario();		
			this.presentador.consultarPorLlaves();
		}
		else
			this.mostrarMensaje("Selecciona un registro para modificar.");
				
	}
	
	btnConsulta_onClick()
	{
		this.presentador.consultar();
	}	
	
	
	btnconsultaPrompt_onClick()
	{
		this.presentador.consultarPorPostal();
	}
	
	btnGuardarFormulario_onClick()
	{		
		 var campoObligatorioVacio = this.campoObligatorioVacio();
		 if(campoObligatorioVacio==null)
		 {
			if(this.modo=='ALTA')
				this.presentador.insertar();
				this.presentador.actualizar();
		 }		
		 else
		 {
			this.mostrarMensaje('Error','El campo "' + campoObligatorioVacio.attr("descripcion") + '" es obligatorio.');
		 }	
	}
	
	btnSalir_onClick()
	{
		var confirmacion = confirm("¿Esta seguro que desea salir?")
	    if (confirmacion)
	    	{
	    	//TODO: Cerrar ventana aqui
	    	}
	}
	btnSalirFormulario_onClick()
	{		
		this.salirFormulario();
	}	
	
	/*
	 * Valores de las llaves
	 */
	
	get llaves()
	{
		var llaves =
		{
			id:this.grid._selectedItem.id	
		}
		return llaves;
	}
	
	/*
	 * Valores de los criterios de selección
	 */
	
	get criteriosSeleccion()
	{
		 var criteriosSeleccion = 
		 {				    
			fInicial:$('#fInicialCriterioInput').val(),
			fFinal:$('#fFinalCriterioInput').val(),
			estado:$('#estadoCriterioInput').val(),
			usuarioSol:$('#usuarioSolCriterioInput').val()
		 }
		 return criteriosSeleccion;
	}		
	
	
	/*
	 * Asignar registros al grid
	 */
	
	set datos(valor)
	{
		this.grid._dataProvider = valor;	
		this.grid.render();
	}
	
	/*
	set datosPostales(valor)
	{
		
		this.promptPostales = valor;
		//this.datosPostales = valor;
		//this.render();
	}
	

	 * Mapeo de datos del formulario con el modelo
	 */
	
	set ticket(valor)
	{		
		$('#actividadFormularioInput').val(valor.actividad);
		$('#usuarioSolFormularioInput').val(valor.usuarioSol);
		$('#fInicialFormularioInput').val(valor.fInicial);
		$('#fFinalFormularioInput').val(valor.fFinal);
		$('#estadoFormularioInput').val(valor.estado);
	}
	
	get usuarioMS()
	{
		 var usuarioMS = 
		 {				    
			 actividad:$('#actividadFormularioInput').val(),
			 usuarioSol:$('#usuarioSolFormularioInput').val(),
			 fInicial:$('#fInicialFormularioInput').val(),
			 fFinal:$('#fFinalFormularioInput').val(),
			 estado:$('#estadoFormularioInput').val()
		 };
		 return usuarioMS;
	 }
	
	mostrarMensaje(titulo,mensaje)
	{
		alert(mensaje);	
	}
	
	mostrarFormulario()
	{
		$('#principalDiv').hide();
		$('#formularioDiv').show();
	}
	salirFormulario()
	{
		$('#principalDiv').show()	
		$('#formularioDiv').hide();
	}
	
	
	
	/*
	 *Validación de los datos obligatorios del formulario 
	 */
	
	campoObligatorioVacio()
	{
		if($('#primerNombreFormularioInput').val()=='')					
			return $('#primerNombreFormularioInput');
		
		if($('#apellidoPaternoFormularioInput').val()=='')					
			return $('#apellidoPaternoFormularioInput');
		
		return null;
	}	
	
	/*
	 * Limpiar formulario
	 */
	limpiarFormulario()
	{
		$('#actividadFormularioInput').val("");
		$('#usuarioSolFormularioInput').val("");
		$('#fInicialFormularioInput').val("");
		$('#fFinalFormularioInput').val("");
		$('#estadoFormularioInput').val("");
	}
}
var vista = new TicketsVista(this);

