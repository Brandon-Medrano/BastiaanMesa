class AreasPresentador
{
	 constructor(vista)
	 {
		this.vista = vista; 
	 }
	 
	 consultar()
	 {
		 var repositorio = new AreasRepositorio(this);		
		 repositorio.consultar(this,this.consultarResultado,this.vista.criteriosSeleccion);
	 }
	 
	 consultarResultado(resultado)
	 {
		if(resultado.mensajeError=="")
			this.vista.datos = resultado.valor;
		else
			this.vista.mostrarMensaje("Error",resultado.mensajeError);
	 }
	 
	
	 insertar()
	 {
		 var repositorio = new AreasRepositorio(this);			 
		 repositorio.insertar(this,this.insertarResultado,this.vista.area);	
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
		 var repositorio = new AreasRepositorio(this);		
		 repositorio.actualizar(this,this.actualizarResultado,this.vista.area);
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
		 var repositorio = new AreasRepositorio(this);		
		 repositorio.consultarPorLlaves(this,this.consultarPorLlavesResultado,this.vista.llaves);
	 }
	 
	 consultarPorLlavesResultado(resultado)
	 {		
		 if(resultado.mensajeError=="")
		 {
			 this.vista.area = resultado.valor;
		 }
		 else
			 this.vista.mostrarMensaje("Error","Ocurrió un error al consultar el registro. " + resultado.mensajeError);
	 }
	 
	 eliminar()
	 {
		 var repositorio = new AreasRepositorio(this);		
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