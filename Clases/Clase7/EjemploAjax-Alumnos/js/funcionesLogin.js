function validarLogin()
{
	var varUsuario=$("#correo").val();
	var varClave=$("#clave").val();
	var recordar=$("#recordarme").is(':checked');
		
	$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:({'usuario':varUsuario,'clave':varClave,'recordarme':recordar})
	}).then(done,fail)
	function done(retorno){
		if(retorno == "ingreso"){
			MostarBotones();
			MostarLogin();
			$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			$("#BotonLogin").addClass("btn btn-danger");				
			$("#usuario").val("usuario: "+retorno);
		}
	}
	function fail(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);
	}

	
	//	url:"php/validarUsuario.php",
	//	type:"post",
	


		
			// si esta logeado le habilito los botones 
			//if(????????){	
				//MostarBotones();
			//	MostarLogin();

			//	$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			//	$("#BotonLogin").addClass("btn btn-danger");				
			//	$("#usuario").val("usuario: "+retorno);
			//}else
			//{
			//	$("#informe").html("usuario o clave incorrecta");	
			//	$("#formLogin").addClass("animated bounceInLeft");
		//	}
	//error de ajax muestro lo siguiente
	//	$("#botonesABM").html(":(");
	//	$("#informe").html(retorno.responseText);	

	
}
function deslogear()
{	
	$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post",
	}).then(done,fail);
	function done(){
		MostarBotones();
		MostarLogin();
		$("#usuario").val("Sin usuario.");
		$("#BotonLogin").html("Login<br>-Sesión-");
		$("#BotonLogin").removeClass("btn-danger");
		$("#BotonLogin").addClass("btn-primary");
		
	}
	function fail(){

	}
	//	url:"php/deslogearUsuario.php",
	//	type:"post"		

}
function MostarBotones()
{	
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:({'queHacer':"MostarBotones"})
	}).then(done,fail)
	function done(retorno){
		$("#botonesABM").html(retorno);
	}
	function fail(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);
	}
	//	url:"nexo.php",
	//	type:"post",
	//	data:{queHacer:"MostarBotones"}

}
