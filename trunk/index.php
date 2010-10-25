<?php
session_start();
if($_SESSION != null){
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link href='style.css' rel='stylesheet' type='text/css'>
<script src='scripts/utils.js' type='text/javascript'></script>
<script src='scripts/perfil.js' type='text/javascript'></script>
<script src='scripts/obtenerPostsAmigos.js' type='text/javascript'></script>
<title>Untitled Document</title>
</head>
<table align='center' cellpadding='2'>
	<tr>
    	<td align='left'>
        	<h4>";
				
    if(!isset($_GET['usr'])){
        echo $_SESSION['usuario'];
    }
    else{
        echo $_GET['usr'];
    }
    echo"
        	</h4>
                        
        </td>
        <td>
        	<a href='/Twitter'>Home</a>
        </td>
        <td>
        	<a href='perfil.php'>Perfil</a>
        </td>
        <td>
        	<a href='buscador.php'>Buscar Amigos</a>
        </td>
        <td>
        	<a href='amigos.php'>Amigos</a>
        </td>
		<td>
        	<a href='perfilTodos.php'>Ver todos!</a>
        </td>
  		<td>
        	<a href='cerrarsesion.php'>Cerrar Sesión</a>
        </td>
    </tr>
    <tr>
    	<td align='left' colspan='6'>
        	<label>&iquest;Qu&eacute; andas haciendo?</label>
        </td>
        <td>
        	<label id='caracteresRestantes'></label>
        </td>
    </tr>
    <tr>
    	<td colspan='7'>
        	<textarea cols='70' rows='2' id='insertTexto'></textarea>
        </td>
	</tr>
    <tr>
    	<td colspan='7' align='right'>
        	<input type='hidden' value='".$_SESSION['usuario']."' id='usuario'/>
            <input type='button' id='enviar' value='Postear!'/>
        </td>
    </tr>
    <ul>
    <td colspan='7' width='550px'>
    	<table id='tablaPosts'>
    	</table>
    </td>
    </ul>
</table>
</body>
</html>";
}
else{
	if(isset($_POST['usuario']) && isset($_POST['pss'])){
		$username =  htmlspecialchars($_POST['usuario'], ENT_QUOTES);
		$pss = md5($_POST['pss']);
		require("coneccion.php");
		$query="SELECT * FROM usuarios WHERE usuario = '".$username."' and password = '".$pss."';";
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error".mysql_error());
		}
		if(mysql_num_rows($resultado) > 0){
			$resultado = mysql_fetch_array($resultado);
			$_SESSION['usuario'] = $resultado['usuario'];
			header("Location:index.php");
		}
		else{
			echo
			"<script type='text/javascript'>
				alert('El usuario y/o password incorrecto');
			</script>";
		}
		mysql_close($db);
	}
	else{
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link href='style.css' rel='stylesheet' type='text/css'>	
<title>Untitled Document</title>
</head>

<body>	
<form action='index.php' method='post'>
<table align='center'>
	<tr>
    	<td>
        	<label>Username:</label></td>
		<td>
        	<input type='text' name='usuario'/>
		</td>
    </tr>
   	<tr>
    	<td>
			<label>Password:</label></td>
        <td>
        	<input type='password' name='pss'/>
		</td>
    </tr>
    <tr align='center'>
        <td colspan='2'>
        	<input type='submit' value='Enviar'/>
		</td>
    </tr>
    <tr align='center'>
        <td colspan='2'>
        	Aún no estás registrado?... 
            <br />
           <a href='registro.php'>Registrate aquí!!</a>
		</td>
    </tr>
</table>
</form>        
</body>
</html>";
	}
}
?>