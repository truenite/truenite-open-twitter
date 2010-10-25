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
<title>Untitled Document</title>
</head>
<table align='center' cellpadding='2'>
	<tr>
    	<td align='left'>
        	<h4>
            	Busca a tus amigos!
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
    	<td colspan="7">
        	<form action="buscador.php" method="get">
                <input type="text" name="busqueda"/>
        </td>
    </tr>    
   	<tr>
    	<td colspan="7">
                <input type="submit" value="Buscar"/>
                <br/><br/>
            </form>
    	</td>
    </tr>    
	<ul>
    <td colspan="7" width="550px">
    	<table id="tablaPosts">
        <?php	
		if(isset($_GET['busqueda'])){
			require("coneccion.php");
			$query="SELECT * FROM usuarios WHERE usuario LIKE '%".$_GET['busqueda']."%' OR mail LIKE '%".$_GET['busqueda']."%' ORDER BY usuario";
			$resultado=mysql_query($query);
			if(!$resultado){
				exit("Ha ocurrido un error ".mysql_error());
			}
			if(mysql_num_rows($resultado) > 0){
				while($row = mysql_fetch_array($resultado)){
					$query="SELECT * FROM followings WHERE usuario='".$_SESSION['usuario']."' and followin = '".$row['usuario']."'";
					$resultadoANIDADO=mysql_query($query);
					$username=$row['usuario'];
					if(!$resultadoANIDADO){
						exit("Ha ocurrido un error ".mysql_error());
					}
					if(mysql_num_rows($resultadoANIDADO) > 0){
						echo "<tr><td colspan='3'><a href='perfil.php?usr=".$row['usuario']."'>".$row['usuario']."</a></td><td><input type='button' id='cambiar' value='Dejar de seguir' onclick='return cambiar(\"".$row['usuario']."\")'/></tr>";
					}
					else{
						echo "<tr><td><a href='perfil.php?usr=".$row['usuario']."'>".$row['usuario']."</a></td><td><input type='button' id='cambiar' value='Seguir' onclick='return cambiar(\"".$row['usuario']."\")'/></tr>";
					}
				}
				$username=$row['followin'];
			}
			else{
				echo "<p>No se encontraron resultados con tu b&uacute;squeda</p>";
			}
		}
	?>
    	</table>
    </td>
    </ul>
</table>
</body>
</html>