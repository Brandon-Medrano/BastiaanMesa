class TiketsRepositorio 
{	
	constructor()
	{
		
	}
	insertar(contexto,functionRetorno, tiket)
	{		
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		
		var parametros;
		parametros = "accion=insertar";
		parametros += "&tiket=" + encodeURIComponent(JSON.stringify(tiket));	
		
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.insertarResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}
	
	insertarResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}
	

	consultar(contexto,functionRetorno, criteriosSeleccion)
	{		
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		
		var parametros;
		parametros = "accion=consultar";
		parametros += "&criteriosSeleccion=" + encodeURIComponent(JSON.stringify(criteriosSeleccion));
		
		
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.consultarResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}
	
	consultarResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}
	
	
	consultarPorReceso(contexto,functionRetorno, criteriosRecesos)
	{		
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		var parametros;
		parametros = "accion=consultarPorReceso";
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.consultarPorRecesoResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}
	consultarPorRecesoResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}	
	
	actualizar(contexto,functionRetorno, tiket)
	{		
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		
		var parametros;
		parametros = "accion=actualizar";
		parametros += "&tiket=" + encodeURIComponent(JSON.stringify(tiket));	
		
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.actualizarResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}
	
	actualizarResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}
	
	
	
	consultarPorLlaves(contexto,functionRetorno, llaves)
	{		
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		
		var parametros;
		parametros = "accion=consultarPorLlaves";
		parametros += "&llaves=" + encodeURIComponent(JSON.stringify(llaves));
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.consultarPorLlavesResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}
	
	consultarPorLlavesResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}
	
	
	eliminar(contexto,functionRetorno,llaves)
	{				
		this.contexto = contexto;
		this.functionRetorno = functionRetorno;
		
		var parametros;
		parametros = "accion=eliminar";
		parametros += "&llaves=" + encodeURIComponent(JSON.stringify(llaves));
		var contextHandler = new AjaxContextHandler();
		var host = window.location.origin + "/BastiaanMesa";	
		var ai = new Ajaxv2(host +"/php/repositorios/Tikets.php", this, this.eliminarResultado, "POST", parametros, contextHandler);		
		contextHandler.AddAjaxv2Object(ai); 		
		ai.GetPost(true);
	}

	eliminarResultado(resultado)
	{
		var datos = JSON.parse(resultado);
		this.functionRetorno.call(this.contexto,JSON.parse(resultado));
	}

}