window.onload=initPagina;

function initPagina(){
	try{
		tipo = document.getElementById("tipo").value;
		obtenerAmigos();
	}
	catch(e){
		alert(e);	
	}
}
function obtenerAmigos(){
	if(tipo == "siguen" || tipo == "sigues"){
		requestObtener = crearReq();
		if(requestObtener == null){
			alert("No se pudo crear request");
		}else{
			var url = "obtenerAmigos.php";
			requestObtener.onreadystatechange = mostrarAmigos;
			requestObtener.open("POST",url,true);
			requestObtener.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			params = "tipo="+tipo;
			requestObtener.send(params);
		}
	}
}
function mostrarAmigos(){
	if(requestObtener.readyState == 4){
		if(requestObtener.status == 200){
			document.getElementById("tablaPosts").innerHTML = requestObtener.responseText;
		}
	}
}
function cambiar(username){
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		var url = "cambiarAmigos.php";
		request.onreadystatechange = aplicarCambios;
		request.open("POST",url,true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		params = "usuario="+username;
		request.send(params);
	}
}
function aplicarCambios(){
	if(request.readyState == 4){
		if(request.status == 200){
			obtenerAmigos();
		}
	}
}