<?php
session_start();

if(isset($_POST['usuario']) && isset($_POST['cantidad']) && !isset($_POST['as'])){
	$username =  htmlentities($_POST['usuario']);
	$fecha =date('Y-n-j G:i:s');
	$limite = 20*$_POST['cantidad']+20;
	require("coneccion.php");
	$query="SELECT * FROM blog_data WHERE usuario ='".$_POST['usuario']."' ORDER BY fecha";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	$total = mysql_num_rows($resultado);
	$query="SELECT * FROM blog_data WHERE usuario ='".$_POST['usuario']."' ORDER BY fecha DESC LIMIT ".$limite;
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	$respuesta = '';
	if(mysql_num_rows($resultado) > 0){
		while($row = mysql_fetch_array($resultado)){
			$username = $row['usuario'];
			$texto = $row['dato'];
			$fecha = $row['fecha'];
			$respuesta.="<tr><td width='550px'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a>  ".$texto."</p></li></td></tr>";
		}
		if($limite < $total){
			$siguientes = $_POST['cantidad']+1;
			$respuesta.="<tr><td width='550px' align='right'><input type='button' id='enviar' value='Ver siguientes 20' onclick='return obtenerPosts(".$siguientes.")'/></td></tr>";
		}
		echo $respuesta;
	}
	else{
		echo "<tr><td width='550px'><li><p>Haz un post nuevo!</p></li></td></tr>";
	}
}
if(isset($_POST['usuario']) && isset($_POST['cantidad']) && isset($_POST['as'])){
	$username =  htmlentities($_POST['usuario']);
	$limite = 20*$_POST['cantidad']+20;
	require("coneccion.php");
	$query="SELECT * FROM followings,blog_data WHERE 
			 
			 
	(followings.usuario = '".$_POST['usuario']."' and blog_data.usuario = followings.followin)
	
	or (blog_data.usuario = '".$_POST['usuario']."')
	
	
	GROUP BY dato ORDER BY fecha DESC";
	
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	$total=mysql_num_rows($resultado);
	$query="SELECT * FROM followings,blog_data WHERE 
			 
			 
	(followings.usuario = '".$_POST['usuario']."' and blog_data.usuario = followings.followin)
	
	or (blog_data.usuario = '".$_POST['usuario']."')
	
	
	GROUP BY dato ORDER BY fecha DESC LIMIT ".$limite;
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	$respuesta = '';
	if(mysql_num_rows($resultado) > 0){
		while($row = mysql_fetch_array($resultado)){
			$username = $row['usuario'];
			$texto = $row['dato'];
			$fecha = $row['fecha'];
			$respuesta.="<tr><td width='550px'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a>  ".$texto."</p></li></td></tr>";
		}
		if($limite < $total){
			$siguientes = $_POST['cantidad']+1;
			$respuesta.="<tr><td width='550px' align='right'><input type='button' id='enviar' value='Ver m&aacute;s' onclick='return obtenerPosts(".$siguientes.")'/></td></tr>";
		}
		echo $respuesta;
	}
	else{
		echo "<tr><td width='550px'><li><p>Haz un post nuevo!</p></li></td></tr>";
	}
}
if(!isset($_POST['usuario']) && isset($_POST['cantidad']) && isset($_POST['todos'])){
	if($_POST['todos'] = 1){
		$limite = 20*$_POST['cantidad']+20;
		require("coneccion.php");
		
		$query="SELECT * FROM blog_data ORDER BY fecha";
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		$total=mysql_num_rows($resultado);
		$query="SELECT * FROM blog_data ORDER BY fecha DESC LIMIT ".$limite;
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		$respuesta = '';
		if(mysql_num_rows($resultado) > 0){
			while($row = mysql_fetch_array($resultado)){
				$username = $row['usuario'];
				$texto = $row['dato'];
				$fecha = $row['fecha'];
				$respuesta.="<tr><td width='550px'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a>  ".$texto."</p></li></td></tr>";
			}
			if($limite < $total){
				$siguientes = $_POST['cantidad']+1;
				$respuesta.="<tr><td width='550px' align='right'><input type='button' id='enviar' value='Ver m&aacute;s' onclick='return obtenerPosts(".$siguientes.")'/></td></tr>";
			}
			echo $respuesta;
		}
		else{
			echo "<tr><td width='550px'><li><p>Haz un post nuevo!</p></li></td></tr>";
		}
	}
}
?>