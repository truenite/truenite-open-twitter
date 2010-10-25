<?php
session_start();
if(isset($_POST['usuario'])){
	require("coneccion.php");
	$query="SELECT * FROM followings WHERE usuario='".$_SESSION['usuario']."' and followin = '".$_POST['usuario']."'";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	if(mysql_num_rows($resultado) > 0){
		$query = "DELETE FROM followings WHERE usuario='".$_SESSION['usuario']."' AND followin='".$_POST['usuario']."'";
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		echo "<input type='button' id='cambiar' value='Seguir' onclick='return cambiar(\"".$_POST['usuario']."\")'/>";
	}
	else{
		$query = "INSERT INTO followings VALUES('".$_SESSION['usuario']."','".$_POST['usuario']."')";
		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		echo "<input type='button' id='cambiar' value='Dejar de seguir' onclick='return cambiar(\"".$_POST['usuario']."\")'/>";
	}
}
?>