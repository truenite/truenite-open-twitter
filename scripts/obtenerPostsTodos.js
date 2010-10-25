window.onload=initPagina;

function initPagina(){
	obtenerPosts(0);
}

function obtenerPosts(cantidad){
	requestObtener = crearReq();
	if(requestObtener == null){
		alert("No se pudo crear request");
	}else{
		var url = "obtenerPosts.php";
		requestObtener.onreadystatechange = mostrarPosts;
		requestObtener.open("POST",url,true);
		requestObtener.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		params = "cantidad="+cantidad+"&todos=1";
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