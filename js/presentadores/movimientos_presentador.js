class MovimientosPresentador
{
	 constructor(vista)
	 {
		this.vista = vista; 
	 }
	 
	 consultar()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.consultar(this,this.consultarResultado,this.vista.criteriosSeleccion);
	 }

	 consultarResultado(resultado)
	 {
		if(resultado.mensajeError=="")
			this.vista.datos = resultado.valor;
		else
			this.vista.mostrarMensaje("Error",resultado.mensajeError);
	 }
	
	 /* usuarios */	 
	 consultarPorUsuario()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.consultarPorUsuario(this,this.consultarPorUsuarioResultado,this.vista.criteriosUsuarios);
	 }
	 consultarPorUsuarioResultado(resultado)
	 {
		if(resultado.mensajeError=="")
			this.vista.datosUsuarios = resultado.valor;
		else
			this.vista.mostrarMensaje("Error",resultado.mensajeError);
	 }
	/* */
	 
	 /* recesos*/ 
	 consultarPorReceso()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.consultarPorReceso(this,this.consultarPorRecesoResultado,this.vista.criteriosRecesos);
	 }
	 consultarPorRecesoResultado(resultado)
	 {
		if(resultado.mensajeError=="")
			this.vista.datosRecesos = resultado.valor;
		else
			this.vista.mostrarMensaje("Error",resultado.mensajeError);
	 }

	 
	 /* */
	 insertar()
	 {
		 var repositorio = new MovimientosRepositorio(this);			 
		 repositorio.insertar(this,this.insertarResultado,this.vista.receso);	
	 }
	 
	 insertarResultado(resultado)
	 {
		if(resultado.mensajeError=="")
		{	
			this.vista.mostrarMensaje("Aviso","La información se guardó correctamente. Id: " + resultado.valor);
			this.vista.salirFormulario();
			this.consultar();
		}
		else
			this.vista.mostrarMensaje("Error","Ocurrió un error al guardar el registro. " + resultado.mensajeError);			
			
	 }	
	 
	 actualizar()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.actualizar(this,this.actualizarResultado,this.vista.receso);
	 }
	 
	 actualizarResultado(resultado)
	 {
		 if(resultado.mensajeError=="")
		 {	
			this.vista.mostrarMensaje("Aviso","La información se actualizó correctamente.");
			this.vista.salirFormulario();
			this.consultar();
		 }
		 else
			this.vista.mostrarMensaje("Error","Ocurrió un error al actualizar el registro. " + resultado.mensajeError);			
	 }
	   
	 consultarPorLlaves()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.consultarPorLlaves(this,this.consultarPorLlavesResultado,this.vista.llaves);
	 }
	 
	 consultarPorLlavesResultado(resultado)
	 {		
		 if(resultado.mensajeError=="")
		 {
			 this.vista.receso = resultado.valor;
		 }
		 else
			 this.vista.mostrarMensaje("Error","Ocurrió un error al consultar el registro. " + resultado.mensajeError);
	 }
	 
	 eliminar()
	 {
		 var repositorio = new MovimientosRepositorio(this);		
		 repositorio.eliminar(this,this.eliminarResultado,this.vista.llaves);		
	 }
	 
	 eliminarResultado(resultado)
	 {
		if(resultado.mensajeError=="")
		{
			this.vista.mostrarMensaje("Aviso", "El registro se eliminó correctamente.");
			this.consultar();
		}
		else
			this.vista.mostrarMensaje("Error","Ocurrió un error al eliminar el registro. " + resultado.mensajeError);		
	 }
	 
}