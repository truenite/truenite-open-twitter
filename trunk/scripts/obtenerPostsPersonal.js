window.onload=initPagina;

function initPagina(){
	try{
		obtenerPosts(0);
	}
	catch(e){
		alert(e);	
	}
}
function obtenerPosts(cantidad){
	requestObtener = crearReq();
	if(requestObtener == null){
		alert("No se pudo crear request");
	}else{
		var usuario = document.getElementById("usuario").value;
		usuario = escape(usuario);
		var url = "obtenerPosts.php";
		requestObtener.onreadystatechange = mostrarPosts;
		requestObtener.open("POST",url,true);
		requestObtener.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		params = "usuario="+usuario+"&cantidad="+cantidad;
		requestObtener.send(params);
	}
}
function mostrarPosts(){
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
			document.getElementById("celdaCambiar").innerHTML = '';
			document.getElementById("celdaCambiar").innerHTML = request.responseText;
		}
	}
}