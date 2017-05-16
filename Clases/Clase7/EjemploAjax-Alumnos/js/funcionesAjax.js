
function MostrarError()
{
	$.ajax({
		url:"nexoNoExiste.php"
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){	
		console.info(retorno);
		
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("Error!");
	}
	//alert("error");
	//url:"nexoNoExiste.php",type:"post"
}
function MostrarSinParametros()
{
	//url:"nexoTexto.php"});
	$.ajax({url:"nexoTexto.php"}).then(funcionUno,funcionDos);
	function funcionUno(retorno){	
		$("#informe").html("Correcto");
		$("#principal").html(retorno);
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("Error!");
	}
	
}

function Mostrar(queMostrar)
{
	$.ajax({
		url:"nexo.php",
		data:{'queHacer':queMostrar},
		type:"post"
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){	
		$("#informe").html("Correcto");
		$("#principal").html(retorno);
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("Error!");
	}
	//alert(queMostrar);
	//url:"nexo.php",
	//type:"post",
	
}

function MostarLogin()
{
		//alert(queMostrar);
/*	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});*/
	$.ajax({
		url:"nexo.php",
		data:{'queHacer':"MostarLogin"},
		type:"post"
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){	
		$("#informe").html("Correcto");
		$("#principal").html(retorno);
	}
	function funcionDos(retorno){
		console.info(retorno);
		$("#informe").html(retorno.responseText);
		$("#principal").html("Error!");
	}
}