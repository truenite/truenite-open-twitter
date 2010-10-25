<?php
if(isset($_POST['usuario']) && isset($_POST['texto'])){
	$username =  htmlentities($_POST['usuario']);
	$texto = htmlentities($_POST['texto']);
	$fecha =date('Y-n-j G:i:s');
	require("coneccion.php");
	$query="INSERT INTO blog_data VALUES('".$username."','".$fecha."','".$texto."');";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	echo "<tr><td width='550px'><li><p><a href='perfil.php?usr=".$username."'>".$username."</a>  ".$texto."</p></li></td></tr>";
}
else echo $_POST['texto'];