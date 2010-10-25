window.onload=initPagina;

function initPagina(){
	try{
		document.getElementById("insertTexto").onkeydown = contarCaracteres;
		document.getElementById("insertTexto").onkeyup = contarCaracteres;
		document.getElementById("enviar").onclick = postear;
		campo = document.getElementById("insertTexto");
		contarCaracteres();
		obtenerPosts(0);
	}
	catch(e){
		alert(e);	
	}
}
function contarCaracteres(){
	try{
		returnIn = document.getElementById("caracteresRestantes");
		numCaracteres = 140 - campo.value.length;
		returnIn.innerHTML = numCaracteres;
		boton = document.getElementById("enviar");
		if(numCaracteres < 0 || numCaracteres == 140){
			boton.disabled = true;	
		}
		else{
			boton.disabled = false;
		}
	}
	catch(e){
		alert(e);	
	}
}
function postear(){
	request = crearReq();
	if(request == null){
		alert("No se pudo crear request");
	}else{
		if(campo.value.length==0 || campo.value.charAt(0) == ' '|| campo.value =="" || campo.value == null){
			alert("Ha ocurrido un error");
			return false;
		}
		var texto = campo.value;
		var insertarTexto = escape(texto);
		var usuario = document.getElementById("usuario");
		usuario = usuario.value;
		var insertarUsuario = escape(usuario);
		var url = "insertar.php";
		request.onreadystatechange = enviarPosts;
		request.open("POST",url,true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		params = "texto="+insertarTexto+"&usuario="+insertarUsuario;
		request.send(params);
	}
}
function enviarPosts(){
	if(request.readyState == 4){
		if(request.status == 200){
			limpiarCampo();
			contarCaracteres();
			document.getElementById("tablaPosts").innerHTML = request.responseText+document.getElementById("tablaPosts").innerHTML;
		}
	}
}
function limpiarCampo(){
	campo.value='';
}