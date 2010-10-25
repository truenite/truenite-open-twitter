<?php
session_start();
if(isset($_POST['tipo'])){
	if($_POST['tipo']=="siguen"){
		require("coneccion.php");
		$query="SELECT * FROM followings WHERE followin='".$_SESSION['usuario']."' ORDER BY usuario";
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		$respuesta = '';
		if(mysql_num_rows($resultado) > 0){
			while($row = mysql_fetch_array($resultado)){
				$username = $row['usuario'];
				$queryANIDADO="SELECT * FROM followings WHERE followin ='".$username."' and usuario='".$_SESSION['usuario']."' ORDER BY followin";
				$resultadoANIDADO=mysql_query($queryANIDADO);
				if(!$resultadoANIDADO){
					exit("Ha ocurrido un error ".mysql_error());
				}
				if(mysql_num_rows($resultadoANIDADO) > 0){
					$rowANIDADO = mysql_fetch_array($resultadoANIDADO);
					$respuesta.="<tr><td width='20%'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a></p></li></td><td><input type='button' id='cambiar' value='Dejar de seguir' onclick='return cambiar(\"".$username."\")'/></td></tr>";
				}else{
					$respuesta.="<tr><td width='20%'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a></p></li></td><td><input type='button' id='cambiar' value='Seguir' onclick='return cambiar(\"".$username."\")'/></td></tr>";	
				}
			}
			echo $respuesta;
		}
	}
	else{
		if($_POST['tipo']=="sigues"){
			require("coneccion.php");
			$query="SELECT * FROM followings WHERE usuario='".$_SESSION['usuario']."' ORDER BY followin";
			$resultado=mysql_query($query);
			if(!$resultado){
				exit("Ha ocurrido un error ".mysql_error());
			}
			$respuesta = '';
			if(mysql_num_rows($resultado) > 0){
				while($row = mysql_fetch_array($resultado)){
					$username = $row['followin'];
					$queryANIDADO="SELECT * FROM followings WHERE followin ='".$row['followin']."' and usuario='".$_SESSION['usuario']."' ORDER BY followin";
					$resultadoANIDADO=mysql_query($queryANIDADO);
					if(!$resultadoANIDADO){
						exit("Ha ocurrido un error ".mysql_error());
					}
					if(mysql_num_rows($resultadoANIDADO) > 0){
						$rowANIDADO = mysql_fetch_array($resultadoANIDADO);
						$respuesta.="<tr><td width='20%'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a></p></li></td><td><input type='button' id='cambiar' value='Dejar de seguir' onclick='return cambiar(\"".$username."\")'/></td></tr>";
					}else{
						$respuesta.="<tr><td width='20%'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a></p></li></td><td><input type='button' id='cambiar' value='Seguir' onclick='return cambiar(\"".$username."\")'/></td></tr>";	
					}
				}
				echo $respuesta;
			}
		}
	}
}
?>