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
		params = "usuario="+usuario+"&cantidad="+cantidad+"&as=1";
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