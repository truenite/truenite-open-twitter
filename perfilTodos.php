<?php
session_start();
if($_SESSION == null){
	header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link href='style.css' rel='stylesheet' type='text/css'>
<script src='scripts/utils.js' type='text/javascript'></script>
<script src='scripts/obtenerPostsTodos.js' type='text/javascript'></script>
<title>Untitled Document</title>
</head>
<table align='center' cellpadding='2'>
	<tr>
    	<td align='left'>
        	<h4>
				<?php 
					if(!isset($_GET['usr'])){
						echo $_SESSION['usuario'];
                    }
                    else{
                    	echo $_GET['usr'];
                    }
            	?>
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
    <ul>
    <td colspan="7" width="550px">
    	<table id="tablaPosts">
    	</table>
    </td>
    </ul>
</table>
</body>
</html>